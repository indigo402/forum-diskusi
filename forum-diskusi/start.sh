#!/bin/bash
php artisan config:clear
php artisan cache:clear
php artisan view:clear

# Wait for MySQL to be ready
echo "Waiting for MySQL..."
while ! php artisan db:show > /dev/null 2>&1; do
    sleep 2
    echo "Still waiting..."
done

php artisan storage:link
php artisan migrate --force
php artisan serve --host=0.0.0.0 --port=$PORT