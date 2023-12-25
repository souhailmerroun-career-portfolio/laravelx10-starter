import { test, expect } from '@playwright/test';
import { execSync } from 'child_process';
import { login } from './actions/login';

test.describe('Login test', () => {

    test.beforeAll(async () => {
        try {
            // Run the migration and seeding command
            execSync('php artisan migrate:fresh --seed');
            console.log('Migrations and seeds run successfully');
        } catch (error) {
            console.error('Error while running migrations and seeds:', error.message);
        }
    });

    test('should login with valid credentials', async ({ page }) => {
         // Login
         await login(page);
    });
});