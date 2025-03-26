mod components;

use axum::{
    extract::{Path, State},
    http::StatusCode,
    response::{Html, IntoResponse},
    routing::{get, get_service},
    Router,
};
use handlebars::Handlebars;
use serde::{Deserialize, Serialize};
use serde_json::json;
use std::{collections::HashMap, env, net::SocketAddr, sync::Arc};
use axum::response::Redirect;
use tower_http::{
    services::ServeDir,
    trace::TraceLayer,
};
use components::image::Image;
use components::gallery::Gallery;

// App state that will be shared across all routes
struct AppState {
    hbs: Handlebars<'static>,
    image_resizer: String,
}


#[tokio::main]
async fn main() {
    // Initialize tracing for nice logging
    tracing_subscriber::fmt::init();

    let image_resizer: String = env::var("IMAGE_RESIZER").unwrap();
    let pdf_portfolio: String = env::var("PDF_PORTFOLIO").unwrap();
    let port: u16 = env::var("PORT").unwrap_or("8080".into()).parse::<u16>().unwrap();

    // Create and register templates
    let mut hbs = Handlebars::new();

    hbs.set_dev_mode(true);

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
        .layer(TraceLayer::new_for_http());

    // Run our application
    let addr = SocketAddr::from(([0, 0, 0, 0], port));
    tracing::info!("listening on {}", addr);
    // run our app with hyper, listening globally on port 3000
    let listener = tokio::net::TcpListener::bind(addr).await.unwrap();
    axum::serve(listener, app).await.unwrap();
}

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
