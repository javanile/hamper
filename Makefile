
update:
	docker run --rm -v $${PWD}:/app -u $$(id -u) composer update $(take)
require:
	docker run --rm -v $${PWD}:/app -u $$(id -u) composer require $(take)
dump-autoload:
	docker run --rm -v $${PWD}:/app -u $$(id -u) composer dump-autoload
update-readme:
	docker run --rm -v $${PWD}:/app -u $$(id -u) php -f /app/scripts/update-readme.php
test:
	./scripts/test-runner.sh
release: update-readme
	git add .
	git commit -am "release"
	git push
