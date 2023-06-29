<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## All development tools requirement

- Install Xampp oldest version
- Add path of folder php in Xampp to environment path (if Window).
- Install composer (recommend LTS version)
- Install nodejs

## Clone and setup project BK manga

    Command following

    - git clone git@github.com:NoNutNghia/BK_manga.git (Using SSH, location in folder htdocs if Windows)
    - cd to folder BK_manga

    After clone project, command following to setup BK manga

    - composer install --ignore-platform-reqs
    - npm run dev
    - cp .env.example .env
    - php artisan key:generate

    Run Xampp and turn on Apache and MySql
    
    Create database name `bk_manga` in mysql phpmyadmin interface

    Command follow to migrate database and seeding data

    - php artisan migrate --seed
    
    To link image in storage folder to display in the website, command
    
    - php artisan storage:link
    
    Cache again all config

    - php artisan config:clear
    - php artisan config:cache

    Finish setup run: php artisan serve
  
    
