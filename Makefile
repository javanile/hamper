
.PHONY: test

init: editorconfig
	@echo "version=7.1.0" > .env

editorconfig:
	@curl -so .editorconfig https://editorconfig.javanile.org/lib/php

install-composer:
	@docker-compose run --rm vtiger curl -sS https://getcomposer.org/installer -o ./contrib/composer-installer.php
	@docker-compose run --rm vtiger php ./contrib/composer-installer.php -- --install-dir=./contrib --filename=composer

install: init
	@docker-compose run --rm vtiger php ./contrib/composer install

update:
	@docker-compose run --rm vtiger php ./contrib/composer update $(take)

require:
	@docker-compose run --rm vtiger php ./contrib/composer require $(take)

dump-autoload:
	@docker-compose run --rm vtiger php ./contrib/composer dump-autoload

update-readme: init
	@docker-compose run --rm vtiger php ./contrib/update-readme.php

up:
	@docker-compose up -d

test:
	@bash contrib/test-runner.sh

test-dev:
	@docker-compose run --rm vtiger ./vendor/bin/phpunit tests

tdd: up
	@docker-compose run --rm vtiger ./vendor/bin/phpunit --stop-on-failure --filter $(take)

release: update-readme
	@git add .
	@git commit -am "release"
	@git push
