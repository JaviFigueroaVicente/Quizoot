# Usamos PHP 8.1 como base (compatible con Laravel 10)
FROM php:8.1-cli

# Instalamos dependencias básicas
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    curl \
    libzip-dev \
    zip \
    libonig-dev \
    libxml2-dev

# Instalamos extensiones PHP necesarias para Laravel
RUN docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath zip

# Instalamos Composer
RUN curl -sS https://getcomposer.org/installer  | php -- --install-dir=/usr/local/bin --filename=composer

# Directorio de trabajo dentro del contenedor
WORKDIR /app

# Copiamos solo composer.json y composer.lock para aprovechar el cache
COPY composer.json .
COPY composer.lock .

# Instalamos dependencias de PHP
RUN composer install --ignore-platform-reqs --prefer-dist --no-dev

# Copiamos el resto del proyecto
COPY . .

# Opcional: Limpiamos la caché de Composer
RUN composer clear-cache

# Comando para ejecutar el servidor (esto dependerá de cómo quieras correr Laravel)
CMD ["php", "-S", "0.0.0.0:8000"]