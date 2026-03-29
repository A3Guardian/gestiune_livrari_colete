FROM php:8.2-fpm

# Instalăm dependențele de sistem necesare
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libicu-dev \
    zip \
    unzip \
    gnupg

# --- START INSTALARE NODEJS ---
# Adăugăm sursele oficiale pentru Node.js 20
RUN mkdir -p /etc/apt/keyrings \
    && curl -fsSL https://deb.nodesource.com/gpgkey/nodesource-repo.gpg.key | gpg --dearmor -o /etc/apt/keyrings/nodesource.gpg \
    && echo "deb [signed-by=/etc/apt/keyrings/nodesource.gpg] https://deb.nodesource.com/node_20.x nodistro main" | tee /etc/apt/sources.list.d/nodesource.list \
    && apt-get update && apt-get install -y nodejs
# --- END INSTALARE NODEJS ---

RUN apt-get clean && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-configure intl
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd intl

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

COPY docker-entrypoint.sh /usr/local/bin/docker-entrypoint-app.sh
RUN chmod +x /usr/local/bin/docker-entrypoint-app.sh

WORKDIR /var/www

RUN chown -R www-data:www-data /var/www

ENTRYPOINT ["/usr/local/bin/docker-entrypoint-app.sh"]
CMD ["php-fpm", "-F"]