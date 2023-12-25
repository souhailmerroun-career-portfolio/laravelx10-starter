import { test, expect } from '@playwright/test';
import { execSync } from 'child_process';
import { login } from './actions/login';
import { register } from './actions/register';

test.describe('authentification', () => {

    test.beforeAll(async () => {
        try 
        {
            execSync('php artisan migrate:fresh --seed');

            console.log('Migrations and seeds run successfully');
        } 
        catch (error) 
        {
            console.error('Error while running migrations and seeds:', error.message);
        }
    });

    test('should register with valid credentials', async ({ page }) => {
        // Register
        await register(page);
    });

    test('should login with valid credentials', async ({ page }) => {
         // Login
         await login(page);
    });
});