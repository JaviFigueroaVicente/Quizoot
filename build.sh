#!/bin/bash

# Salir si un comando falla
set -e

echo ">>> Creando el archivo .env de producción"
# Crea un archivo .env a partir de las variables de entorno de Vercel
# IMPORTANTE: Añade aquí TODAS las variables que tu app necesita
printf "APP_ENV=production\n" > .env
printf "APP_DEBUG=false\n" >> .env
printf "APP_URL=${APP_URL}\n" >> .env
printf "APP_KEY=${APP_KEY}\n" >> .env

printf "DB_CONNECTION=pgsql\n" >> .env
printf "DB_HOST=${DB_HOST}\n" >> .env
printf "DB_PORT=${DB_PORT}\n" >> .env
printf "DB_DATABASE=${DB_DATABASE}\n" >> .env
printf "DB_USERNAME=${DB_USERNAME}\n" >> .env
printf "DB_PASSWORD=${DB_PASSWORD}\n" >> .env

printf "SANCTUM_STATEFUL_DOMAINS=${SANCTUM_STATEFUL_DOMAINS}\n" >> .env
printf "SESSION_DOMAIN=${SESSION_DOMAIN}\n" >> .env

printf "VITE_API_URL=${VITE_API_URL}\n" >> .env

echo ">>> Instalando dependencias de PHP..."
composer install --no-dev --no-interaction --no-progress

echo ">>> Creando caché de configuración..."
php artisan config:cache

echo ">>> Creando caché de rutas..."
php artisan route:cache

echo ">>> Creando caché de vistas..."
php artisan view:cache

echo ">>> Instalando dependencias de Node..."
npm install

echo ">>> Construyendo el frontend..."
npm run build

echo ">>> Ejecutando migraciones..."
php artisan migrate --force

echo ">>> El script de construcción ha finalizado."