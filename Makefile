dc := docker-compose
php-cli := $(dc) exec php-cli
php-fpm := $(dc) exec php-fpm
node := $(dc) exec node
mysql := $(dc) exec mysql

init: up composer-install migrate seed
up:
	$(dc) up -d
down:
	$(dc) down
cli:
	$(php-cli) bash

fpm:
	$(php-fpm) bash

mysql:
	$(mysql) bash

npm-install:
	$(node) npm install

npm-build:
	$(node) npm run build

npm-dev:
	$(node) npm run dev

composer-install:
	$(php-fpm) composer install
migrate:
	$(php-fpm) php artisan migrate
seed:
	$(php-fpm) php artisan db:seed
