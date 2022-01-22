#!/bin/bash
set -e

echo "Deployment started ..."

# Enter maintenance mode or return true
# if already is in maintenance mode
(php artisan down) || true

# Pull the latest version of the app
git pull origin develop

# Create folder for sql dump
mkdir -p storage/database/backup/

# Install composer dependencies
composer install --no-interaction --prefer-dist --optimize-autoloader

php artisan route:clear
php artisan cache:clear
php artisan config:cache
php artisan view:clear

# Clear the old cache
php artisan clear-compiled

# Recreate cache
php artisan optimize

# Install packages
yarn

# Compile npm assets
yarn prod

# Run database migrations
php artisan migrate --force

# Exit maintenance mode
php artisan up

echo "Deployment finished!"
