dep:
	docker-compose run --rm php composer update --prefer-dist

run: 
	docker-compose up -d

