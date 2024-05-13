# BLC Toelf Backend service

Laravel Lumen is a stunningly fast PHP micro-framework for building web applications with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Lumen attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as routing, database abstraction, queueing, and caching.

## Framework Spesification

This service build with laravel lumen, check below:
1. laravel lumen framework v8.3.1
2. PHP version > 7.4
3. MySQL database version > 5.7
4. composer > v2


## Get started

pull this project and install depedencies with composer command 
````composer install````

generate JWT secret key with
````php artisan key:generate````


## Database Migration

1. create database in MySQL
2. migrate database follow this command
````php artisan migrate ````
    or update the database
````php artisan migrate:refresh ````

3. run seeder on this command
````php artisan db:seed ````


## Run Project

when finish setup the project you can run this command:
````php -S localhost:8000 -t public ````
