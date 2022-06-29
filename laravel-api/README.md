## Leave Dates Backend (Laravel) API

This Laravel project serves the Leave Dates backend APIs:

### Setup
- Use `composer install` command to install composer dependencies.
- This project uses MySQL database.
- Rename `.env.example` file to `.env`, and update the database name and credentials suitable to your local.
    ````
    DB_CONNECTION=mysql
    DB_HOST=mysql
    DB_PORT=3306
    DB_DATABASE=leave_dates
    DB_USERNAME=default
    DB_PASSWORD=secret
    ````
- Use `php artisan migrate` to run database migrations.
- Use `php artisan db:seed` to seed the website data.
