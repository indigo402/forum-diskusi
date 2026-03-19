#!/bin/bash

php artisan config:clear
php artisan cache:clear
php artisan view:clear

echo "Waiting for MySQL..."
while ! nc -z $DB_HOST $DB_PORT 2>/dev/null; do
    sleep 2
    echo "Still waiting..."
done

echo "MySQL is ready!"
php artisan storage:link
php artisan migrate --force

# Build frontend assets
npm run build

php artisan serve --host=0.0.0.0 --port=$PORT