use std::sync::Arc;
use crate::repository::project_repository::ProjectRepository;
use handlebars::{Context, Handlebars, Helper, HelperDef, HelperResult, Output, RenderContext};
use serde_json::json;
use tracing_subscriber::fmt::format;

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
            "project_id": project.project_id,
            "project_name": project.project_name,
            "year": project.year,
            "tags": project.tags
        });

        out.write("<div class='grid-title'>")?;

        // essentials
        let rendered = hbs.render("details-template", &data_details)?;
        out.write(&rendered)?;

        // optional references
        let _ = project.references.map(|references| {
            let _ = out.write("<div class='reference-section'>");

            references.iter().for_each(|reference| {
                let _ = out.write(&format!("<div><a href='{}'>{}</a></div>", reference.1, reference.0));
            });

            let _ = out.write("</div>");
        });
        out.write("</div>")?;

        // optional description
        let _ = project.description.map(|description| {
            let _ = out.write(&format!("<div class='grid-description'>{}</div>", description));
        });

        Ok(())
    }
}