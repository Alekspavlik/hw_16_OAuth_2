# OAuth2 via Dropbox

## Step 1. Clone the repository

## Step 2. Install dependencies and autoload using Docker

```
docker run --rm --interactive --tty --volume $(pwd):/app composer install
```

## Step 3. Building and running containers

```
docker-compose up -d
```

## Step 4. Create DB
```
# php artisan migrate:fresh --seed
```
