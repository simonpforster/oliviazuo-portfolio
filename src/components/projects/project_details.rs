use crate::repository::project_repository::ProjectRepository;
use handlebars::{Context, Handlebars, Helper, HelperDef, HelperResult, Output, RenderContext};
use serde_json::json;
use std::sync::Arc;

pub(crate) struct ProjectDetails {
    project_repository: Arc<ProjectRepository>,
}

impl ProjectDetails {
    pub(crate) fn new(project_repository: Arc<ProjectRepository>) -> ProjectDetails {
        ProjectDetails { project_repository }
    }
}


impl HelperDef for ProjectDetails {
    fn call<'reg: 'rc, 'rc>(&self,
                            helper: &Helper,
                            hbs: &Handlebars,
                            _: &Context,
                            _rc: &mut RenderContext,
                            out: &mut dyn Output) -> HelperResult {
        let project_id: &str = helper.hash().get("project_id")
            .and_then(|v| v.value().as_str())
            .expect("No project id defined.");

        let project = self.project_repository.get_project(project_id).unwrap();


        let data_details = json!({
            "projectName": project.project_name,
            "year": project.year,
            "tags": project.tags,
            "references": project.references,
            "description": project.description,
        });

        // essentials
        let rendered = hbs.render("details-template", &data_details)?;
        out.write(&rendered)?;


        Ok(())
    }
}