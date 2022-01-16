# Base Laravel 8 + InertiaJS + Jetstream + Vue 2 + Vuetify 2.5.3 + Vuex

[![contributions welcome](https://img.shields.io/badge/contributions-welcome-brightgreen.svg?style=flat)](https://github.com/tamerkaralurt/base-laravel8-inertia-vue2-vuetify-project)

## What To Do Next?
After clone or download this repository, next step is install all dependency required by laravel 8.

```terminal
## install composer-dependency
$ composer install
## install npm package
$ npm install or yarn install
## build dev 
$ npm run dev or yarn dev
```

Before we start web server, we create configure `.env` file and generate Laravel app key. Later we use migrate command.

```terminal
## create copy of .env
$ cp .env.example .env
## create laravel key
$ php artisan key:generate
## laravel migrate /w UserSeeder
$ php artisan migrate --seed
```


