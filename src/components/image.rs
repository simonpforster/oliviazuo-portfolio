use handlebars::{Context, Handlebars, Helper, HelperDef, HelperResult, Output, RenderContext};
use serde_json::json;

pub(crate) struct Image {
    image_resizer: String,
}

impl Image {
    pub(crate) fn new(image_resizer: String) -> Image {
        Image {
            image_resizer
        }
    }
}


impl HelperDef for Image {

    fn call<'reg: 'rc, 'rc>(&self,
                            helper: &Helper,
                            hbs: &Handlebars,
                            _: &Context,
                            _rc: &mut RenderContext,
                            out: &mut dyn Output) -> HelperResult {

        let path = helper.hash().get("path")
            .and_then(|v| v.value().as_str())
            .unwrap_or("");

        let fix = helper.hash().get("fix")
            .and_then(|v| v.value().as_str())
            .unwrap_or("width");

        let data = json!({
            "path": path,
            "fix": fix,
            "image_resizer": self.image_resizer,
        });

        let image_tag: String = hbs.render("image-template", &data)?;

        out.write(&image_tag)?;

        Ok(())
    }
}