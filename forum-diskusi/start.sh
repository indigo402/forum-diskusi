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
php artisan serve --host=0.0.0.0 --port=$PORT
```

---

## ✅ Set Build Command di Railway Dashboard

1. Buka service **forum-diskusi**
2. Tab **Settings** → **Build**
3. Isi **"Build Command"**:
```
composer install --no-dev --optimize-autoloader && npm install && npm run build