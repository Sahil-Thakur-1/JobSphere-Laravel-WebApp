#!/bin/sh

echo "Waiting for DB..."
sleep 10

echo "Clearing cache..."
php artisan config:clear
php artisan cache:clear

echo "Running migrations..."
php artisan migrate --force

echo "Starting server..."
php artisan serve --host=0.0.0.0 --port=10000
