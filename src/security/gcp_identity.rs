use std::process::Command;
use std::sync::Arc;
use http::StatusCode;
use tracing::*;

#[derive(Debug)]
pub struct IdentityProvider {
    pub id_token: String,
}

impl IdentityProvider {

    #[instrument]
    pub async fn new() -> IdentityProvider {
        let reqwest_client = Arc::new(reqwest::Client::new());

        let initial_token = match reqwest_client
            .get("http://metadata/computeMetadata/v1/instance/service-accounts/default/identity?audience=https://portfolio-manager-test2-386756380530.europe-west1.run.app")
            .header("Metadata-Flavor", "Google")
            .send()
            .await
        {
            Ok(response) if response.status() == StatusCode::OK => response.text().await.unwrap(),
            Ok(response) => {
                panic!("Error receiving the proper response from metadata server: {} {}", response.status(), response.text().await.unwrap());
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
