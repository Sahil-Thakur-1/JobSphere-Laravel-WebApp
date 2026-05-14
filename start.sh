# #!/bin/sh

# echo "Waiting for DB..."
# sleep 10

# echo "Clearing cache..."
# php artisan config:clear
# php artisan cache:clear

# echo "Running migrations..."
# php artisan migrate --force

# echo "Starting server..."
# php artisan serve --host=0.0.0.0 --port=10000
#!/bin/sh

echo "Waiting for services..."
sleep 5

echo "Clearing old cache..."
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear

echo "Caching config..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

echo "Starting Laravel server..."
php artisan serve --host=0.0.0.0 --port=10000
