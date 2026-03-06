FROM php:8.2-fpm

# Instalăm dependențele de sistem necesare pentru Laravel
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip

# Curățăm cache-ul
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Instalăm extensiile PHP necesare
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Instalăm Composer (managerul de pachete Laravel)
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Setăm folderul de lucru
WORKDIR /var/www

USER www-data