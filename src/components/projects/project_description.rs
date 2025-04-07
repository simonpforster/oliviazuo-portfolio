use std::sync::Arc;
use crate::repository::project_repository::ProjectRepository;
use handlebars::{Context, Handlebars, Helper, HelperDef, HelperResult, Output, RenderContext};

pub(crate) struct ProjectDescription {
    project_repository: Arc<ProjectRepository>,
}

impl ProjectDescription {
    pub(crate) fn new(project_repository: Arc<ProjectRepository>) -> ProjectDescription {
        ProjectDescription { project_repository }
    }
}


impl HelperDef for ProjectDescription {
    fn call<'reg: 'rc, 'rc>(&self,
                            helper: &Helper,
                            _hbs: &Handlebars,
                            _: &Context,
                            _rc: &mut RenderContext,
                            out: &mut dyn Output) -> HelperResult {
        let project_name = helper.hash().get("project_name")
            .and_then(|v| v.value().as_str())
            .unwrap_or("");

        let description = self.project_repository.get_project(project_name).unwrap();

        out.write(&description.description)?;

        Ok(())
    }
}