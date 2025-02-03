# Olivia Zuo's Portfolio

You can find it at https://www.oliviazuo.com

# Running the server

## Locally
```
source .env
flask --app "src/router" --debug run
```

### Local docker development container
Run `docker compose --profile dev up -d`.
This will mount the following directories for development:
```
src/
| components
| html
\ views
```

### Local docker deployment packaged container
Run `docker compose --profile deployment up -d` inside the root folder.
This builds a container packing in the static files.
