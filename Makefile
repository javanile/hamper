
update:
	docker run --rm -v $${PWD}:/app -u $$(id -u) composer update $(take)
require:
	docker run --rm -v $${PWD}:/app -u $$(id -u) composer require $(take)
dump-autoload:
	docker run --rm -v $${PWD}:/app -u $$(id -u) composer dump-autoload
update-readme:
	docker run --rm -v $${PWD}:/app -u $$(id -u) php -f /app/update-readme.php
