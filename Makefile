
.PHONY: test

init:
	echo "version=7.1.0" > .env
install-composer:
	docker-compose run --rm vtiger curl -sS https://getcomposer.org/installer -o ./scripts/composer-installer.php
	docker-compose run --rm vtiger php ./scripts/composer-installer.php -- --install-dir=./scripts --filename=composer
install: init
	docker-compose run --rm -u $$(id -u) vtiger php ./scripts/composer install
update:
	docker-compose run --rm vtiger php ./scripts/composer update $(take)
require:
	docker-compose run --rm vtiger php ./scripts/composer require $(take)
dump-autoload:
	docker-compose run --rm vtiger php ./scripts/composer dump-autoload
update-readme:
	docker-compose run --rm vtiger php ./scripts/update-readme.php
up:
	docker-compose up -d
test:
	bash scripts/test-runner.sh
test-dev:
	docker-compose run --rm vtiger ./vendor/bin/phpunit tests
tdd: up
	docker-compose run --rm vtiger ./vendor/bin/phpunit --stop-on-failure --filter $(take)
release: update-readme
	git add .
	git commit -am "release"
	git push
