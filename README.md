Proses instalasi

1. git commit repository
2. composer install
3. .env.example di copy jadi .env
4. .env sesuaikan penamaany dengan database
   DB_DATABASE=e_commerce
   DB_USERNAME=root
   DB_PASSWORD=
5. php artisan key:generate
6. php artisan migrate untuk buat database
7. php artisan serve untuk mejalankan nya
