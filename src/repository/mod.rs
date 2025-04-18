use std::collections::HashMap;
use serde::{Deserialize, Serialize};

pub mod portfolio_manager_service;


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
    pub(crate) references: Option<HashMap<String, String>>,
    pub(crate) description: Option<String>,
    pub(crate) tags: Vec<String>,
}