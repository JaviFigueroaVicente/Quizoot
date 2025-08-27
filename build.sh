#!/bin/bash

# Instala dependencias de Node.js y construye el frontend
echo ">>> Installing Node.js dependencies..."
npm install

echo ">>> Building frontend assets..."
npm run build

# Instala dependencias de PHP
echo ">>> Installing PHP dependencies..."
composer install --no-dev --no-interaction --no-progress

# Ejecuta los comandos de Artisan
echo ">>> Caching configuration..."
php artisan config:cache

echo ">>> Running database migrations..."
php artisan migrate --force

echo ">>> Build finished!"