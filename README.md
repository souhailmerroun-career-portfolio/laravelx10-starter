# Laravelx10 Starter

This starter kit is designed for new Laravel projects, providing a comprehensive setup that I frequently use. It simplifies the process of initializing a project by including essential tools and configurations.

## Features

-   **GitHub Codespaces Ready**: Seamlessly work in a cloud-based development environment.
-   **Laravel x10 Version**: Up-to-date with the latest Laravel x10 version.
-   **Laravel UI with Bootstrap 5 and Auth**: Pre-configured UI with Bootstrap 5 and authentication scaffolding.
-   **.env.example**: Includes necessary environment variables for quick setup.
-   **Mailtrap Integration**: Easily configurable for email testing (just change email & password in `.env`).
-   **Makefile Included**: Simplifies the execution of common tasks.
-   **Playwright & Laravel Tests Ready**: Pre-setup for end-to-end testing with Playwright and Laravel tests.
-   **CI Ready with GitHub Actions**: Streamline your CI/CD workflows.
-   **Heroku Deployment Ready**: Configurations in place for easy deployment to Heroku.
-   **Sentry Monitoring Ready**: Error tracking and monitoring (just update `.env`).
-   **Laravel Telescope for Monitoring**: Get insights into server and database performance.

## Key Metrics to Watch

-   **Code Coverage**: Assessed using PHPUnit.
-   **Code Quality**: Evaluated with PHPStan.
-   **Server & Database Performance**: Monitored using Laravel Telescope.
-   **Web Vitals**: Analyzed using Lighthouse.
-   **E2E Test Coverage**: Covered by Playwright.
-   **User Engagement & Retention**: Tracked using Mixpanel.

## Getting Started

To start using this Laravelx10 Starter kit, simply run the following commands:

1. update .env (set sentry, mailtrap, mixpanel)
2. make install
3. make start
4. make test
5. access /telescope for monitoring
6. run migration & seed
7. register & login (using form fillers)
