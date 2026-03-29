#!/bin/sh
set -e
export COMPOSER_ALLOW_SUPERUSER=1
cd /var/www

# 1 = pornește automat npm run dev (Vite); 0 = doar PHP-FPM + eventual npm run build
RUN_VITE_DEV="${RUN_VITE_DEV:-1}"

if [ ! -f .env ] && [ -f .env.example ]; then
  echo "[docker-entrypoint] Copiez .env din .env.example"
  cp .env.example .env
fi

if [ -f composer.json ] && [ ! -f vendor/autoload.php ]; then
  echo "[docker-entrypoint] composer install..."
  composer install --no-interaction --prefer-dist --optimize-autoloader
  chown -R www-data:www-data /var/www/vendor
fi

if [ -f artisan ] && [ -f vendor/autoload.php ] && [ -f .env ] && ! grep -q '^APP_KEY=base64:' .env 2>/dev/null; then
  php artisan key:generate --force
fi

if [ -f package.json ]; then
  if [ ! -d node_modules ] || [ -z "$(ls -A node_modules 2>/dev/null)" ]; then
    echo "[docker-entrypoint] npm ci / npm install..."
    if [ -f package-lock.json ]; then
      npm ci --no-audit --prefer-offline || npm install --no-audit
    else
      npm install --no-audit
    fi
    chown -R www-data:www-data /var/www/node_modules
  fi

  if [ "$RUN_VITE_DEV" != "0" ] && [ "$RUN_VITE_DEV" != "false" ]; then
    echo "[docker-entrypoint] npm run dev (în fundal, port 5173)..."
    rm -f public/hot 2>/dev/null || true
    npm run dev &
  else
    if [ ! -f public/build/manifest.json ]; then
      echo "[docker-entrypoint] npm run build (generează manifest Vite)..."
      npm run build
      chown -R www-data:www-data public/build 2>/dev/null || true
    fi
  fi
fi

if [ -d storage ]; then
  chmod -R ug+rwx storage bootstrap/cache 2>/dev/null || true
  chown -R www-data:www-data storage bootstrap/cache 2>/dev/null || true
fi

exec docker-php-entrypoint "$@"
