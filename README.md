# Simply Laravel Vue chat app

### Installation

- git clone git@github.com:itohin/simply_chat.git
- cd simply_chat
- cp .env.example .env
- fill DB_DATABASE, DB_USERNAME, DB_PASSWORD in .env
- composer install
- php artisan key:generate
- docker-compose up -d
- docker exec -it php_unicom php artisan migrate --seed
- open http://localhost:7777 in browser
