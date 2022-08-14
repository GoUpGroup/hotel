<p align="center">Go up Group</p>

# Hotel 

## Description 
Hotel Managment system  

## Team work
1. Fuad Al-amoudi
4. Mohammed Zobair 
5. Nasser Esmail Al-Ghaithi

## language
HTML
CSS
JavaScript
PHP 9

## FrameWork 
### back end
	Laravel 9
### front end
	Bootstrap 5
 
 


## Basic installation steps 
Before you start the installation process you need to have **installed composer**

1. Clone the project
2. Navigate to the project root directory using command line
3. Run `composer install`
4. Copy `.env.example` into `.env` file
5. Adjust `DB_*` parameters.<br> 
   If you want to use Mysql, make sure you have mysql server up and running. <br>
   If you want to use sqlite: 
   1. you can just delete all `DB_*` parameters except `DB_CONNECTION` and set its value to `sqlite`
   2. Then create file `database/database.sqlite`
6. Run `php artisan key:generate --ansi`
7. Run `php artisan migrate`
