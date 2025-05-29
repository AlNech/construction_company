dc := docker-compose
php-cli := $(dc) exec php-cli
php-fpm := $(dc) exec php-fpm
node := $(dc) exec node
mysql := $(dc) exec mysql



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

