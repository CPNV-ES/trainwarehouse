# Train warehouse

## Requirements

- Docker
- Docker-compose
- PHP (optional if you use the docker container)


## Tools

- Laravel
- [Laravel Sail](https://laravel.com/docs/8.x/sails)
- Docker-compose

## Setup dev environment

You need to have docker install you can follow  [this guide](https://docs.docker.com/engine/install/)

When it's done you need to copy the .env.example to .env and write the environment variable you want to use for DEV environment.

> Don't forget to write the environment variables for AWS!

The docker-compose will use .env file to setup container.

```
cp .env .env.example
```

Docker-compose will be use trough laravel sail

```
composer install
./vendor/bin/sail up
```

## Trigger database

You can trigger the commande to export and upload database to s3 by calling the route `/export`

## Custom commands

### Export database to SQL file

```
php artisan db:export
```

### Upload SQL file to Amazon S3

```
php artisan upload:s3 {filepath}
```

## Connect to Amazon EC2 instance

> Ask N. Glassey for the credentials.

```
ssh user@ip -i .ssh/keyfile
```
