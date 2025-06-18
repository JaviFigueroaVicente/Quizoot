FROM php:8.1-cli

# Dependencias del sistema
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libpng-dev \
    curl \
    libzip-dev \
    zip \
    libonig-dev \
    libxml2-dev

# Extensiones PHP requeridas
RUN docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath zip

# Instalar Composer
RUN curl -sS https://getcomposer.org/installer  | php -- --install-dir=/usr/local/bin --filename=composer

# Directorio de trabajo
WORKDIR /app

# Argumento para recibir el token
ARG GITHUB_TOKEN

# Crear auth.json dinámico
RUN echo '{ \
    "github-oauth": { \
        "github.com": "'${GITHUB_TOKEN}'" \
    } \
}' > /root/.composer/auth.json

# Copiar solo las dependencias iniciales
COPY composer.json .
COPY composer.lock .

# Instalar dependencias
RUN composer install --ignore-platform-reqs --prefer-dist --no-dev

# Copiar resto del proyecto
COPY . .

# Limpiar caché
RUN composer clear-cache