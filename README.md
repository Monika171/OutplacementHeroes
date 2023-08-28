<p align="center"><img src="https://github.com/Monika171/OutplacementHeroes/blob/master/public/profile_pic/oph.jpeg" width="400"></p>

OutplacementHeros was a community of Recruiting Professionals, Consultants & Volunteers who collaborated to help laid off employees during COVID-19 global pandemic.

Demo Link: [https://better-jobs-9.000webhostapp.com/](https://better-jobs-9.000webhostapp.com/)

## Getting Started

<h3>Clone the repository.</h3>

### >> Prerequisites

-   PHP version 7.2.34
-   \*MySQL version 8.0.33
-   Composer version 2.3.8

\*This app uses MySQL. To use something different, open `config/Database.php` and change the default driver.

To use MySQL, install and setup a database and then add your database credentials(database, username and password) to the `.env.example` file.

### >> Installing Composer Dependencies

Install Laravel's dependencies using Composer:

```
composer install
```

-   In case there is error:

    -   Delete `composer.lock` file. (if exists)
    -   Delete `vendor` directory. (if exists)
    -   Clear Cache:  
        Run the following commands to clear various Laravel caches:

        ```
        php artisan config:clear
        php artisan cache:clear
        php artisan route:clear
        php artisan view:clear
        composer clear-cache
        ```

    -   Run `composer install` again.
    -   Check Composer Autoload:

        ```
        composer dump-autoload
        ```

### >> `.env` configuration file

```
cp .env.example .env
```

### >> Generating application key:

```
php artisan key:generate
```

### >> Configuring The Environment:

Open the `.env` file in a text editor and configure the database settings, application URL, email (or mailtrap values), admin account values, pusher values and any other necessary environment variables for example:

-   email values, eg:

        MAIL_MAILER=smtp
        MAIL_HOST=smtp.gmail.com
        MAIL_PORT=587
        MAIL_USERNAME=site_email@site.com
        MAIL_PASSWORD=YourEmailPassword
        MAIL_ENCRYPTION=tls
        MAIL_FROM_ADDRESS=site_email@site.com
        MAIL_FROM_NAME=OPH

-   pusher values, eg:

        PUSHER_APP_ID=YourPusherAppID
        PUSHER_APP_KEY=YourPusherAppKey
        PUSHER_APP_SECRET=YourPusherAppSecret

    OR login to https://pusher.com/ to create all new app and get the above values. Instructions to integrate pusher will be available there, but here is the outline to verify:

    1. Put pusher credentials in `.env` file.
    2. Also replace pusher app key in `home.blade.php` inside `<script>` eg:
        ```
        var pusher = new Pusher('YourPusherAppKey', {
        cluster: 'EnterClusterValue'
        });
        ```

-   admin values, eg:

        ADMIN_NAME="Some Admin Name"
        ADMIN_EMAIL=admin@site.com
        ADMIN_PASSWORD=AdminPassword

### >> Migrations

<b><u>Two Options</u></b>:

-   <u>Option 1:</u>  
    All database tables can be imported:  
    `OPH_sql_import1/ALL_PRESENT_TABLES_EXPORT/oph.sql`

-   <u>Option 2:</u>  
    Using artisan for Database Migrations:

    1. To create all the necessary tables and columns, run the following:
        ```
        php artisan migrate
        ```
    2. Import `'countries.sql'`, `'states.sql'`, `'cities.sql'`, `'courses.sql'`, `'designations.sql'`, `'industries.sql'`, `'skills.sql'`, `'specializations.sql'`, `'messages.sql'` values to the database.  
       (If required, delete the previously existing respective tables)
        - ALL these .sql files are directly available here inside `'OPH_sql_import1'`

### >> Seeding The Database

To add admin data, run:

```
php artisan db:seed --force
```

### >> Creating symlink

Create symlink from `public/storage` directory to `storage/app/public` directory which will make files stored in the `storage/app/public` directory accessible from the web by creating a virtual link in the public directory of this project.

```
php artisan storage:link
```

### >> Installing JavaScript Dependencies and building frontend assets

```
npm install && npm run dev
```

### >> Running The Development Server:

In the Terminal, navigate to the project directory if not already there.  
Start the Laravel development server:

```
php artisan serve
```

### >> Accessing The Laravel App:

-   Open a web browser.
-   Visit the URL displayed in the Terminal after starting the development server.  
    By default, it's usually `http://127.0.0.1:8000`.

## App Info

### Built With

-   [Laravel Framework 7.30.6](https://laravel.com/docs/7.x/releases)

### Version

1.0.0

### Meet the Team:

-   HIRING EMPLOYERS, JOBSEEKERS, ADMIN<br>
    ~[<a href="https://github.com/Monika171">Monika</a>]<br>
    <br>
-   VOLUNTEERS:<br>
    ~[<a href="https://github.com/Priti-Gowala">Priti</a>]<br>
    <br>
-   SEPARATING EMPLOYERS, CONSULTANTS:<br>
    ~[<a href="https://github.com/pavangv28">Pavan</a>]<br>
    <br>
-   HOME+LOGIN+REGISTRATION PAGE DESIGN:<br>
    ~[<a href="https://github.com/AkankshaBoora">Akanksha</a>]<br>
    <br>
-   DATA-COLLECTION(Industry, Designation, Skills, Education):<br>
    ~[by Pavan,Priti,<a href="https://github.com/Harshita248">Harshita</a>]<br>
    <br>
