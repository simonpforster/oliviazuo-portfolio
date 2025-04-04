mod components;
mod observability;

use axum::{extract::State, http::StatusCode, middleware, response::{Html, IntoResponse}, routing::get, Router};
use handlebars::Handlebars;
use serde_json::json;
use std::{env, net::SocketAddr, sync::Arc};
use axum::response::Redirect;
use tower_http::services::ServeDir;
use tracing::{info, instrument, warn};
use components::image::Image;
use components::gallery::Gallery;
use crate::observability::init_tracing;
use crate::observability::propagators::extract_context;

// App state that will be shared across all routes
#[derive(Debug)]
struct AppState {
    hbs: Handlebars<'static>,
    image_resizer: String,
}


#[tokio::main]
async fn main() {

    let service_name: String = env::var("K_SERVICE").unwrap_or("oliviazuo-portfolio".into());
    let gcp_project_id: String = env::var("GCP_PROJECT_ID").expect("env var GCP_PROJECT_ID not configured");

    // Initialize tracing for nice logging
    let _ = init_tracing(service_name, gcp_project_id).await;

    let image_resizer: String = env::var("IMAGE_RESIZER").expect("env var IMAGE_RESIZER not configured");
    let pdf_portfolio: String = env::var("PDF_PORTFOLIO").expect("env var PDF_PORTFOLIO not configured");
    let port: u16 = env::var("PORT").unwrap_or_else(|_| {
        warn!("env var PORT not configured, defaulting to 8080");
        "8080".into()
    }).parse::<u16>().expect("env var PORT must be a valid number");

    // Create and register templates
    let mut hbs = Handlebars::new();

    // Define image helper
    hbs.register_template_file("image-template", "templates/components/image.hbs")
        .expect("Failed to register image-template template");
    hbs.register_helper("image", Box::new(Image::new(image_resizer.clone())));

    // Define gallery helper
    hbs.register_template_file("gallery-template", "templates/components/gallery.hbs")
        .expect("Failed to register image-template template");
    hbs.register_helper("gallery", Box::new(Gallery::new()));

    // Define templates
    hbs.register_template_file("base", "templates/base.hbs")
        .expect("Failed to register index template");
    hbs.register_template_file("index", "templates/views/index.hbs")
        .expect("Failed to register index template");
    hbs.register_template_file("personal", "templates/views/personal.hbs")
        .expect("Failed to register index template");
    hbs.register_template_file("commercial", "templates/views/commercial.hbs")
        .expect("Failed to register index template");


    // Create shared application state
    let state = Arc::new(AppState { hbs, image_resizer });

    // Setup our application with routes
    let app = Router::new()
        .route("/", get(index_handler))
        .route("/personal", get(personal_handler))
        .route("/commercial", get(commercial_handler))
        .route("/portfolio.pdf", get(Redirect::permanent(&pdf_portfolio))) // to be turned into a proxy at a later date
        .nest_service("/static", ServeDir::new("static"))
        .with_state(state)
        .layer(middleware::from_fn(extract_context));

    // Run our application
    let addr = SocketAddr::from(([0, 0, 0, 0], port));
    info!("listening on {}", addr);
    // run our app with hyper, listening globally on port 3000
    let listener = tokio::net::TcpListener::bind(addr).await.unwrap();
    axum::serve(listener, app).await.unwrap();
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
