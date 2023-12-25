import { expect } from "@playwright/test";

export const login = async (page) => {
    // Navigate to the login page
    await page.goto(`http://localhost:8000/login`);

    // Fill out the login form
    await page.fill('input[name="email"]', 'test@example.com');
    await page.fill('input[name="password"]', 'password');

    // Click the Login button
    await page.click('button[type="submit"]');

    // Check the URL to ensure the user is redirected to the dashboard or home page
    expect(page.url()).toBe(`http://localhost:8000/home`);
};