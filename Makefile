include .env

DOCKER = docker compose -f docker-compose.yml
DOCKER_PHP-FPM = ${DOCKER} exec php-fpm

up:
	${DOCKER} up --build -d

down:
	${DOCKER} down

ps:
	${DOCKER} ps

bash:
	${DOCKER_PHP-FPM} bash