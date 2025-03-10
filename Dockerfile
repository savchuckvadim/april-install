FROM php:8.3-fpm

# Устанавливаем зависимости
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    libzip-dev \
    unzip \
    git \
    libonig-dev \
    curl \
    libicu-dev \
    libcurl4-openssl-dev \
    pkg-config \
    libssl-dev \
    libsodium-dev \  
    && docker-php-ext-install \
        intl \
        pdo_mysql \
        mbstring \
        zip \
        exif \
        pcntl \
        bcmath \
        sodium \ 
    && pecl install redis \
    && docker-php-ext-enable redis


# Устанавливаем Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Указываем рабочую директорию
WORKDIR /var/www/html

# Копируем файлы проекта
COPY . /var/www/html/

# Устанавливаем зависимости Laravel
RUN composer install --no-dev --optimize-autoloader  # 🔹 Оптимизация и игнор dev-зависимостей

# Устанавливаем права
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Открываем порт
EXPOSE 9000

# Указываем стартовый процесс
COPY entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh

ENTRYPOINT ["/entrypoint.sh"]
