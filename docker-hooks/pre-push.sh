#!/bin/sh
set -e

echo "Running Pint..."
docker compose exec -T admin vendor/bin/pint --test

echo "Running PHPStan..."
docker compose exec -T admin vendor/bin/phpstan analyse --memory-limit=1G

echo "Running PHPUnit..."
docker compose exec -T admin vendor/bin/phpunit --testdox

echo "Push checks passed."
