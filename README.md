## Scraper App

This app uses Laravel, Inertia and Vue, as well as MySQL for the database.
With this setup, running the application locally is fairly easy:

- install composer dependencies with `composer install`
- install npm dependencies with `npm install`
- configure your `.env` file (you can copy the contents of `.env.example` into your new `.env` file)
- generate a new application key with `php artisan key:generate`
- create your database tables with `php artisan migrate`
- build the front end with `npm run dev`
- start the Laravel development server with: `php artisan serve`

## How to use the app
At the moment the app uses a hardcoded array of links to crawl.
The crawl is triggered on visiting the app's homepage (the '/' endpoint).
The homepage displays the links to be crawled, and the results of the crawl are logged in `laravel.log`
