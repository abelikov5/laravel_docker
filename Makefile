
setup:
	@make build
	@make up
	@make composer-update
	@make data
build:
	docker-compose build --no-cache --force-rm
stop:
	docker-compose stop
up:
	docker-compose up -d
composer-update:
	docker exec 1bit bash -c "composer update"
data:
	docker exec 1bit bash -c "cp .env.example .env"
	docker exec 1bit bash -c "php artisan migrate"
