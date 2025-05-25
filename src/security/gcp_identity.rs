use http::StatusCode;
use std::process::Command;
use std::sync::Arc;
use tracing::*;

#[derive(Debug)]
pub struct IdentityProvider {
    pub id_token: String,
}

impl IdentityProvider {
    #[instrument]
    pub async fn new(audience: &str) -> IdentityProvider {
        let reqwest_client = Arc::new(reqwest::Client::new());

        let url = format!(
            "http://metadata/computeMetadata/v1/instance/service-accounts/default/identity?audience={}", 
            audience
        );

        let initial_token = match reqwest_client
            .get(url)
            .header("Metadata-Flavor", "Google")
            .send()
            .await
        {
            Ok(response) if response.status() == StatusCode::OK => response.text().await.unwrap(),
            Ok(response) => {
                panic!(
                    "Error receiving the proper response from metadata server: {} {}",
                    response.status(),
                    response.text().await.unwrap()
                );
            }
            Err(e) => {
                warn!("falling back to env var, could not fetch id token: {}", e);
                match String::from_utf8(
                    Command::new("gcloud")
                        .arg("auth")
                        .arg("print-identity-token")
                        .output()
                        .unwrap()
                        .stdout,
                ) {
                    Ok(token) => token.trim().to_owned(),
                    Err(e) => {
                        panic!("could not fetch id token: {}", e);
                    }
                }
            }
        };
        IdentityProvider {
            id_token: initial_token,
        }
    }
}
