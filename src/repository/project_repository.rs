use std::collections::HashMap;
use std::sync::{Arc, RwLock};
use std::time::Duration;
use firestore::{path, FirestoreDb, FirestoreQueryDirection, FirestoreResult};
use futures_core::stream::BoxStream;
use futures_util::TryStreamExt;
use serde::{Deserialize, Serialize};
use tokio::time;
use tracing::{error, info};

#[derive(Debug)]
pub struct ProjectRepository {
    db: FirestoreDb,
    cache: RwLock<Vec<Project>>
}

pub async fn refresh_cache(repo: Arc<ProjectRepository>) {
    let mut interval = time::interval(Duration::from_secs(300));

    loop {
        interval.tick().await;
        repo.fill_cache().await;
    }
}

impl ProjectRepository {
    pub fn new(db: FirestoreDb) -> Self {
        ProjectRepository {
            db,
            cache: RwLock::new(Vec::new())
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
        let projects = self.get_projects_from_firestore().await;
        match projects {
            Ok(projects) => {
                let mut cache = self.cache.write().unwrap();
                *cache = projects;
                info!("Project cache refreshed");
            }
            Err(_) => {
                error!("Could not refresh project cache");
            }
        }
    }



    pub async fn get_projects_from_firestore(&self) -> FirestoreResult<Vec<Project>> {
        let stream: BoxStream<FirestoreResult<Project>> = self.db.fluent().select()
            .from("projects")
            .filter(|q| {
                q.field("owner").eq("Olivia Zuo")
            })
            .order_by([(
                path!(Project::year),
                FirestoreQueryDirection::Descending,
            )])
            .obj()
            .stream_query_with_errors()
            .await?;
        let projects: Vec<Project> = stream.try_collect().await?;
        Ok(projects)
    }
}

#[derive(Serialize, Deserialize, Debug, Clone)]
pub struct Project {
    #[serde(rename = "projectName")]
    pub(crate) project_name: String,
    #[serde(rename = "projectId")]
    pub(crate) project_id: String,
    owner: String,
    pub(crate) year: u16,
    #[serde(rename = "type")]
    project_type: String,
    pub references: Option<HashMap<String, String>>,
    pub description: Option<String>,
    pub tags: Vec<String>,
}