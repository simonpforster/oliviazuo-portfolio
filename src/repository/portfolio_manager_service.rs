use std::sync::{Arc, RwLock};
use std::time::Duration;
use tokio::time;
use tracing::{error, info};
use crate::repository::Project;

pub struct PortfolioManagerService {
    portfolio_manager_url: String,
    cache: RwLock<Vec<Project>>,
}

pub async fn refresh_cache(service: Arc<PortfolioManagerService>) {
    let mut interval = time::interval(Duration::from_secs(300));

    loop {
        interval.tick().await;
        service.fill_cache().await;
    }
}

impl PortfolioManagerService {
    pub fn new(portfolio_manager_url: String) -> Self {
        PortfolioManagerService {
            portfolio_manager_url,
            cache: RwLock::new(Vec::new()),
        }
    }

    pub fn get_project(&self, project_id: &str) -> Option<Project> {
        self.cache.read().unwrap().iter().find_map(|p| {
            if p.project_id == project_id {
                Some(p.clone())
            } else { None }
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
        reqwest::get(&self.portfolio_manager_url)
            .await
            .unwrap()
            .json()
            .await.ok()
    }
}