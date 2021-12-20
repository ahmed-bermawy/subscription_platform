<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

# Subscription Platform
Subscribe to  

### Install composer 
    composer install

### Create database 
create database with name `subscription_platform`

### Environment file
copy .env.example to .env file
and change these values

    DB_DATABASE
    DB_USERNAME
    DB_PASSWORD

### Run migration with seed
    php artisan migrate:fresh --seed

### Generate swagger documentation
    php artisan l5-swagger:generate

### Run the project 
    php artisan serve

### Swagger API documentation

http://127.0.0.1:8000/api/documentation

# Optional
### Send mail command  
    php artisan post:notify id
 
- id =>post id

