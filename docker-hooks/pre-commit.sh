#!/bin/sh
set -e

echo "Running Pint..."
docker compose exec -T admin vendor/bin/pint --config=pint.json --test

echo "Running PHPStan..."
docker compose exec -T admin vendor/bin/phpstan analyse --memory-limit=1G

echo "Pre-commit OK"
