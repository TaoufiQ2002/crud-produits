# Étape 1 : image PHP avec extensions
FROM php:8.2-fpm

# Installer dépendances système
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    curl \
    git \
    vim

# Installer les extensions PHP
RUN docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd

# Installer Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Créer le dossier de travail
WORKDIR /var/www

# Copier tous les fichiers du projet
COPY . .

# Installer les dépendances Laravel
RUN composer install --no-dev --optimize-autoloader

# Donner les bons droits
RUN chmod -R 755 /var/www/storage

# Port exposé (ex: pour Railway)
EXPOSE 8000

# Lancer le serveur Laravel intégré (dev purpose)
CMD php artisan serve --host=0.0.0.0 --port=8000
