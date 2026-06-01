# Laravel Blog App

A beginner Laravel app built while learning PHP and Laravel for the first time.

## Features
- User registration, login, and logout
- Create, edit, and delete blog posts
- Posts are tied to the authenticated user
- Basic input validation and password hashing

## Built With
- PHP
- Laravel
- MySQL

## How to Run Locally
1. Clone the repo
2. Run `composer install`
3. Copy `.env.example` to `.env` and configure your database
4. Run `php artisan key:generate`
5. Run `php artisan migrate`
6. Run `php artisan serve`
