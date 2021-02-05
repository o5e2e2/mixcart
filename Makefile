include .env

start:
	docker-compose up -d

stop:
	docker-compose down --remove-orphans

rebuild: clean
	docker-compose up --build -d

workers:
	docker exec $(PHP-CLI) php /app/workerpool.php

cli: start
	#bash почему-то в данной версии контейнера нет, можно найти готовый контейнер с башем
	docker exec -it $(PHP-CLI) sh

mysql: start
	docker exec -it $(MYSQL) bash

clean: stop
	docker-compose rm -f
	sudo rm -rf $(PWD)/mysql/data
	sudo rm -rf $(PWD)/nginx/log
