env = ./.env.example

ifneq ("$(wildcard ./.env)","")
    env = ./.env
endif

docker = docker-compose -f ./docker/docker-compose.yml -f ./docker/docker-compose.override.yml --env-file ${env}

include ${env}
export

# Запустить установку проекта
.PHONY: install
install:
	echo ${env}
	cp docker/example.docker-compose.override.yml docker/docker-compose.override.yml
	cp .env.example .env
	mkdir docker/nginx/certs
	${docker} up -d --build
	${docker} exec php-fpm sh -c "composer install"
	${docker} exec php-fpm sh -c "php artisan key:generate"
	${docker} exec php-fpm sh -c "php artisan storage:link"
	${docker} exec php-fpm sh -c "php artisan migrate:fresh --seed"

# Запустить Docker демона
.PHONY: run
run:
	${docker} up -d --build

# Остановить работу Docker'а
.PHONY: stop
stop:
	${docker} stop

# Зайти в bash php-fpm
.PHONY: php
php:
	${docker} exec php-fpm bash -l
