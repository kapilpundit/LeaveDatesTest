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


### Testing
 - A `.env.testing` file is added for executing tests.
 - Create `leave_dates_testing` database in MySQL.
 - Run migrations.
    ````
    php artisan migrate --env=testing
    ````
- Run `php artisan test` command to execute all tests. Or use the `--filter` parameter to limit to a particular test.
    ```
    php artisan test --filter=testWebsites
    ```
