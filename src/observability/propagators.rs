use std::convert::Infallible;
use axum::extract::Request;
use axum::http::{HeaderMap, HeaderName};
use axum::middleware::Next;
use axum::response::Response;
use opentelemetry::propagation::{Extractor, Injector};


pub async fn extract_context(mut req: Request, next: Next) -> Result<Response, Infallible> {
    let parent_context = opentelemetry::global::get_text_map_propagator(|propagator| {
        propagator.extract(&AxumHeaderExtractor(req.headers()))
    });

    req.extensions_mut().insert(parent_context);

    Ok(next.run(req).await)
}

pub struct AxumHeaderInjector<'a>(pub &'a mut HeaderMap);

impl<'a> Injector for AxumHeaderInjector<'a> {
    fn set(&mut self, key: &str, value: String) {
        if let Ok(header_name) = key.parse::<HeaderName>() {
            self.0.insert(header_name, value.parse().unwrap());
        }
    }
}

pub struct AxumHeaderExtractor<'a>(pub &'a HeaderMap);

impl<'a> Extractor for AxumHeaderExtractor<'a> {
    fn get(&self, key: &str) -> Option<&str> {
        self.0.get(key)
            .and_then(|value| value.to_str().ok())
    }

    fn keys(&self) -> Vec<&str> {
        self.0.keys()
            .map(|k| k.as_str())
            .collect()
    }
}