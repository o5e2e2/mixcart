include .env

up:
	docker-compose up -d

down:
	docker-compose down --remove-orphans

build:
	docker-compose up --build -d

rebuild: clean build

bash: up
	docker exec -it $(PHP-CLI) bash

clean: down
	docker-compose rm -f
	sudo rm -rf $(PWD)/mysql/data
	rm -rf $(PWD)/nginx/ssl
	sudo rm -rf $(PWD)/nginx/log
