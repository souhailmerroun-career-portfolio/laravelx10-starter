import { expect } from "@playwright/test";
import { faker } from '@faker-js/faker';

export const register = async (page) => {
    // Generate a unique email address using faker
    const uniqueEmail = faker.internet.email();

    // Navigate to the registration page
    await page.goto(`http://localhost:8000/register`);

    // Fill out the registration form
    await page.fill('input[name="name"]', 'John Doe');
    await page.fill('input[name="email"]', uniqueEmail);
    await page.fill('input[name="password"]', 'password');
    await page.fill('input[name="password_confirmation"]', 'password');

    // Click the Register button
    await page.click('button[type="submit"]');

    // Check the URL to ensure the user is redirected to the home page
    expect(page.url()).toBe(`http://localhost:8000/home`);

    // Check the page to ensure the user is logged in
    await expect(page.locator('text=You are logged in!')).toBeVisible();
};