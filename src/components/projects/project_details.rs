use handlebars::{Context, Handlebars, Helper, HelperDef, HelperResult, Output, RenderContext};
use serde_json::json;
use std::sync::Arc;
use crate::repository::portfolio_manager_service::PortfolioManagerService;

pub(crate) struct ProjectDetails {
    portfolio_manager_service: Arc<PortfolioManagerService>,
}

impl ProjectDetails {
    pub(crate) fn new(portfolio_manager_service: Arc<PortfolioManagerService>) -> ProjectDetails {
        ProjectDetails { portfolio_manager_service }
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

        let project = self.portfolio_manager_service.get_project(project_id).unwrap();


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