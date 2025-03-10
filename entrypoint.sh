#!/bin/sh

echo "🚀 Ждём 10 секунд, пока запустится MySQL..."
sleep 10

echo "🔑 Генерируем ключ приложения..."
php artisan key:generate

echo "📂 Выполняем миграции..."
php artisan migrate --force

echo "🔥 Запускаем PHP-FPM..."
exec php-fpm
