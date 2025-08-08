docker exec -it mentorhub-php composer install
docker exec -it mentorhub-php php artisan migrate:fresh --seed

