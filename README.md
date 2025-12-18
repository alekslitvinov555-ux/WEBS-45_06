Розархівуй проєкт у каталог C:\laragon\www.

Наприклад, якщо твій сайт має назву my_site, то після розпакування структура виглядатиме так:

makefile
C:\laragon\www\my_site

 Налаштування конфігурації

У Laravel/Laragon-проєкті відкрий файл .env та переконайся, що параметри підключення до бази даних прописані коректно:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=my_site_db
DB_USERNAME=root
DB_PASSWORD=

Перевір, щоб назва бази (DB_DATABASE) повністю співпадала з тією, яку ти створив у phpMyAdmin.

Додаткові налаштування для Laravel

Виконай наступні команди:

php artisan key:generate
php artisan config:cache
php artisan migrate 
php artisan storage:link

Ці дії допоможуть коректно згенерувати ключ застосунку, оновити кеш конфігурацій, виконати міграції з початковим наповненням таблиць та створити символічне посилання для зберігання файлів.