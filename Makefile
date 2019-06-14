local:
	docker-compose  -f docker-compose.yml -f docker-compose.local.yml -p graphql up --build -d
down:
	docker-compose -p graphql down --remove-orphans
kill:
	docker-compose -p graphql kill --remove-orphans
php:
	docker-compose -p graphql exec --user=1000 php bash
php-root:
	docker-compose -p graphql exec php bash
mysql:
	docker-compose -p graphql exec php mysql -uroot -ppassword
node:
	docker-compose -p graphql exec --user=1000 nodejs bash
deploy:
	git pull
	docker-compose -p graphql exec -T php bash -c "./docker/deploy.sh"
environment:
	./install.sh
test:
	docker-compose -p graphql exec -T php bash -c "./docker/autotest.sh"


