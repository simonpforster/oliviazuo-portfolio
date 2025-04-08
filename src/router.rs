use std::sync::Arc;
use axum::extract::State;
use axum::response::{Html, IntoResponse, Redirect};
use axum::{middleware, Router};
use axum::routing::get;
use http::StatusCode;
use serde_json::json;
use tower_http::services::ServeDir;
use tracing::instrument;
use crate::AppState;
use crate::observability::propagators::extract_context;

pub(crate) fn router(pdf_portfolio: String, state: Arc<AppState>) -> Router {
    Router::new()
        .route("/", get(index_handler))
        .route("/personal", get(personal_handler))
        .route("/commercial", get(commercial_handler))
        .route("/portfolio.pdf", get(Redirect::permanent(&pdf_portfolio))) // to be turned into a proxy at a later date
        .nest_service("/static", ServeDir::new("static"))
        .with_state(state)
        .layer(middleware::from_fn(extract_context))
}

#[instrument]
async fn index_handler(State(state): State<Arc<AppState>>) -> impl IntoResponse {
    let data = json!({
        "image_resizer": state.image_resizer,
    });

    match state.hbs.render("index", &data) {
        Ok(html) => Html(html).into_response(),
        Err(err) => (
            StatusCode::INTERNAL_SERVER_ERROR,
            format!("Template error: {}", err),
        )
            .into_response(),
    }
}

#[instrument]
async fn personal_handler(State(state): State<Arc<AppState>>) -> impl IntoResponse {
    let data = json!({
        "image_resizer": state.image_resizer,
    });

    match state.hbs.render("personal", &data) {
        Ok(html) => Html(html).into_response(),
        Err(err) => (
            StatusCode::INTERNAL_SERVER_ERROR,
            format!("Template error: {}", err),
        )
            .into_response(),
    }
}

#[instrument]
async fn commercial_handler(State(state): State<Arc<AppState>>) -> impl IntoResponse {
    let data = json!({
        "image_resizer": state.image_resizer,
    });

    match state.hbs.render("commercial", &data) {
        Ok(html) => Html(html).into_response(),
        Err(err) => (
            StatusCode::INTERNAL_SERVER_ERROR,
            format!("Template error: {}", err),
        )
            .into_response(),
    }
}