use std::sync::Arc;
use crate::repository::project_repository::ProjectRepository;
use handlebars::{Context, Handlebars, Helper, HelperDef, HelperResult, Output, RenderContext};

pub(crate) struct ProjectTags {
    project_repository: Arc<ProjectRepository>,
}

impl ProjectTags {
    pub(crate) fn new(project_repository: Arc<ProjectRepository>) -> ProjectTags {
        ProjectTags { project_repository }
    }
}


impl HelperDef for ProjectTags {
    fn call<'reg: 'rc, 'rc>(&self,
                            helper: &Helper,
                            _hbs: &Handlebars,
                            _: &Context,
                            _rc: &mut RenderContext,
                            out: &mut dyn Output) -> HelperResult {
        let project_id: &str = helper.hash().get("project_id")
            .and_then(|v| v.value().as_str())
            .expect("No project id defined.");

        let description = self.project_repository.get_project(project_id).unwrap();

        let _ = &description.tags.iter().for_each(|d| {
            out.write(&format!("<div>{}</div>", d)).unwrap();
        });

        Ok(())
    }
}