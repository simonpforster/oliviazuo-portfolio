use crate::repository::Project;
use crate::security::gcp_identity::IdentityProvider;
use std::sync::{Arc, RwLock};
use std::time::Duration;
use http::header::AUTHORIZATION;
use tokio::time;
use tracing::{error, info};

pub struct PortfolioManagerService {
    portfolio_manager_url: String,
    cache: RwLock<Vec<Project>>,
    gcp_provider: Arc<IdentityProvider>,
    reqwest_client: reqwest::Client,
}

pub async fn refresh_cache(service: Arc<PortfolioManagerService>) {
    let mut interval = time::interval(Duration::from_secs(300));

    loop {
        interval.tick().await;
        service.fill_cache().await;
    }
}

impl PortfolioManagerService {
    pub fn new(portfolio_manager_url: String, gcp_provider: Arc<IdentityProvider>) -> Self {
        PortfolioManagerService {
            portfolio_manager_url,
            cache: RwLock::new(Vec::new()),
            gcp_provider,
            reqwest_client: reqwest::Client::new(),
        }
    }

    pub fn get_project(&self, project_id: &str) -> Option<Project> {
        self.cache.read().unwrap().iter().find_map(|p| {
            if p.project_id == project_id {
                Some(p.clone())
            } else {
                None
            }
        })
    }

    pub fn get_projects(&self) -> Vec<Project> {
        self.cache.read().unwrap().to_vec()
    }

    pub async fn fill_cache(&self) {
        let projects = self.fetch_projects_from_portfolio_manager().await;
        match projects {
            Some(projects) => {
                let mut cache = self.cache.write().unwrap();
                *cache = projects;
                info!("Project cache refreshed");
            }
            None => {
                error!("Could not refresh project cache");
            }
        }
    }

    async fn fetch_projects_from_portfolio_manager(&self) -> Option<Vec<Project>> {
        let url = format!(
            "{}/v1/owners/{}/projects",
            &self.portfolio_manager_url, "Olivia%20Zuo"
        );

        let auth_header = format!("Bearer {}", &self.gcp_provider.id_token);
        
        self.reqwest_client
            .get(&url)
            .header(AUTHORIZATION, auth_header)
            .send()
            .await
            .unwrap()
            .json()
            .await
            .ok()
    }
}
