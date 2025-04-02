use handlebars::{Context, Handlebars, Helper, HelperDef, HelperResult, Output, RenderContext};
use serde_json::json;
use tracing::instrument;

pub(crate) struct Gallery;

impl Gallery {
    pub(crate) fn new() -> Gallery {
        Gallery
    }
}

impl HelperDef for Gallery {

    #[instrument]
    fn call<'reg: 'rc, 'rc>(&self,
                            helper: &Helper,
                            hbs: &Handlebars,
                            _: &Context,
                            rc: &mut RenderContext,
                            out: &mut dyn Output) -> HelperResult {

        let id = helper.hash().get("id")
            .and_then(|v| v.value().as_str())
            .unwrap_or("default-id");

        let fix = helper.hash().get("fix")
            .and_then(|v| v.value().as_str())
            .unwrap_or("width");

        let paths = helper.hash().get("paths").unwrap().value();

        let data = json!({
            "id": id,
            "fix": fix,
            "paths": paths,
        });

        let gallery_tag: String = hbs.render("gallery-template", &data)?;

        out.write(&gallery_tag)?;

        Ok(())
    }
}