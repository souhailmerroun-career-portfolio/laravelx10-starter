.PHONY: install start test

install: deps playwright-install env-variables app-key db 

deps:
	@echo "Installing dependencies..."
	@composer install
	@npm install
	@npm run build

playwright-install:
	@echo "Installing Playwright..."
	@npx playwright install --with-deps chromium

env-variables:
	@echo "Setting up environment variables..."
	@cp .env.example .env

app-key:
	@echo "Generating application key..."
	@php artisan key:generate

db:
	@echo "Setting up database..."
	@touch database/database.sqlite
	@php artisan migrate:fresh --seed

start:
	@echo "Starting the server..."
	@php artisan serve

test: artisan-test playwright-test

artisan-test:
	@echo "Running Artisan tests..."
	@php artisan test
	# @php artisan test --filter=MyTest || exit 0

playwright-test:
	@echo "Running Playwright tests..."
	@npx playwright test --project=chromium
	# @npx playwright test tests-e2e-playwright/example.spec.ts --project=chromium || exit 0

playwright-test-ui:
	@echo "Running Playwright tests..."
	@npx playwright test --ui-host=0.0.0.0