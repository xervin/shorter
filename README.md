# Shorter

Сократитель ссылок

### Запуск

git clone https://github.com/xervin/shorter.git

docker-compose build short

dicker-compose up

localhost

### Настройка окружения

Пример файла настроек переменных окружения есть в репозитории (.env.example). 

Для запуска приложения достаточно просто скопировать его содержимое в файл .env.

Кэширование настраивается переменной CACHE_DRIVER (доступны значения redis, memcached, file).

### UI

Интерфейс доступен по адресу http://localhost

Mailhog доступен по адресу http://localhost:8025

PhpMyAdmin доступен по адресу http://localhost:8001
