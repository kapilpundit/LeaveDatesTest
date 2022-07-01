## Leave Dates Backend (Laravel) API

This Laravel (9) project serves the Website Subscription app's backend APIs:

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
- Configure Email service to send mails to the users, when a new post is published under a website.
    - You can use [Mailtrap](https://mailtrap.io/) for testing the outbound emails with the following example configurations.
    ```
    MAIL_MAILER=smtp
    MAIL_HOST=smtp.mailtrap.io
    MAIL_PORT=2525
    MAIL_USERNAME=********
    MAIL_PASSWORD=********
    MAIL_ENCRYPTION=tls
    MAIL_FROM_ADDRESS="hello@example.com"
    MAIL_FROM_NAME="${APP_NAME}"
    ```
 - Run `php artisan serve` to run this backend service.
 - Now the backend APIs are available at `http://localhost:8000`


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

### APIs
Following is the list of APIs used in this project.
 - **GET** `http://localhost:8000/api/websites`
    <br />
    Get list of all websites.
 - **GET** `http://localhost:8000/api/users`
    <br />
    Get list of all users.
 - **POST** `http://localhost:8000/api/posts/<website_id>/create`
    <br />
    Create a new post under a website.
    Parameters:
    - `website_id` - Auto increment primary key of the website record under which we are creating a new post.
 - **POST** `http://localhost:8000/api/user/<user_id>/website/<website_id>`
    Subscribe User To Website.
    Parameters:
    - `user_id` - Auto increment primary key of the user record which we are adding to a particular website's subscribers list.
    - `website_id` - Auto increment primary key of the website record to which we are subscribing a particular user.
    
