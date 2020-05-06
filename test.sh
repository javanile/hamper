#!/usr/bin/env bash

versions=(
    7.1.0
)

for version in "${versions[@]}"; do
    echo "====[ vtiger ${version} ]===="
    export version=${version}
    docker-compose down -v
    docker-compose up -d
    if [[ -e .vtiger.lock ]]; then
        while [[ -f .vtiger.lock ]]; do echo -n "."; sleep 2; done; echo "."
    fi
    docker-compose exec vtiger ./vendor/bin/phpunit tests
done
