use axum::http::{HeaderMap, HeaderName};
use opentelemetry::propagation::{Extractor, Injector};

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