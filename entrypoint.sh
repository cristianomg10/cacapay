#!/bin/sh

echo "Instalando caches..."

php artisan config:cache
php artisan route:cache
php artisan view:cache

echo "Executando migrations..."

php artisan migrate --force

echo "Iniciando aplicação..."

php artisan serve --host=0.0.0.0 --port=10000