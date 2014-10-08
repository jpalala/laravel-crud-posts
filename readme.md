Simple Laravel-based posts CRUD system
======================================

Demonstrates the use of Resource Controllers in Laravel


Setup:
-----

You will need `composer` @ https://getcomposer.org/

*If starting from scratch do the following:*

`composer create-project laravel/laravel --prefer-dist <put-app-name-here>`

Then you can clone the repo into another directory and copy paste everything from that into your new laravel app.

`git clone https://github.com/jpalala/laravel-crud-posts.git && cp -Rf laravel-crud-posts/* <laravel-app-dir>/`

*Alternative, just clone down the repo and run composer install*

`git clone https:///github.com/jpalala/laravel-crud-posts.git`

`cd laravel-crud-posts`

`composer install` or `php composer.phar install` 


Database Setup
---------

On the terminal, run: 

	mysql -u [db_username] -p [db_password] [db_name] < create_posts.sql

Note: Put your database credentials inside the brackets

FAQ
--------

**Help, I'm using XAMPP, and `php artisan` and `php composer.phar` doesnt work**

If you're using XAMPP on a linux/mac it's quite trivial to use XAMPP's php

`/Applications/XAMPP/bin/php <artisan/composer.phar> some-artisan/composer-command`


If you're using Windows, on the `cmd` console

        C:/Program Files/XAMPP/php/php.exe <whatever-command-you-need-to-run> 
    
        //note: change the path according to the right path to your XAMPP installation's php.exe file`



