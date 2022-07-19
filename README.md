<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Bookmanager

This is an exmple project for save authors and books.You can save and get information with APIs.


## How to use

1.Run git clone
<br>
2.Run composer install
<br>
3.Run cp .env.example .env and modify database and mail setting
<br>
4.Run php artisan key:generate
<br>
5.Run php artisan migrate --seed
<br>
6.Run php artisan serve
<br>
7.Go to link localhost:8000
<br>
8.For login use default admin email: "admin@site.com" and password : "password"


## API Routes

Admin:

- Login : "http://127.0.0.1:8000/api/v1/login"
<br>
[method: POST]
<br>
[header: Content-Type: alpplication/json , Accept: application/json]
<br>
[body : email(email), password(string)]


- Logout : "http://127.0.0.1:8000/api/v1/logout"
<br>
[method: POST]
<br>
[header: Content-Type: alpplication/json , Accept: application/json, Authorization: Bearer [token]]



Authors:

- Get all informations : "http://127.0.0.1:8000/api/v1/authors"
<br>
[method: GET]
<br>
[header: Content-Type: alpplication/json , Accept: application/json, Authorization: Bearer [token]]


- Author Store : "http://127.0.0.1:8000/api/v1/authors"
<br>
[method: POST]
<br>
[header: Content-Type: alpplication/json , Accept: application/json, Authorization: Bearer [token]]
<br>
[body : first_name(string), last_name(string), email(email), password(string), password_confirmation(string), avatar(image file)]


- Author show : "http://127.0.0.1:8000/api/v1/authors/1"
<br>
[method: GET]
<br>
[header: Content-Type: alpplication/json , Accept: application/json, Authorization: Bearer [token]]


- Author Update : "http://127.0.0.1:8000/api/v1/authors/1?_method=PUT"
<br>
[method: POST]
<br>
[header: Content-Type: alpplication/json , Accept: application/json, Authorization: Bearer [token]]
<br>
[body : first_name(string), last_name(string), email(email), password(string), password_confirmation(string), avatar(image file)]


- Author Destroy : "http://127.0.0.1:8000/api/v1/authors/1?_method=DELETE"
<br>
[method: POST]
<br>
[header: Content-Type: alpplication/json , Accept: application/json, Authorization: Bearer [token]]




Books:

- Get all informations : "http://127.0.0.1:8000/api/v1/books"
<br>
[method: GET]
<br>
[header: Content-Type: alpplication/json , Accept: application/json, Authorization: Bearer [token]]


- Book Store : "http://127.0.0.1:8000/api/v1/books"
<br>
[method: POST]
<br>
[header: Content-Type: alpplication/json , Accept: application/json, Authorization: Bearer [token]]
<br>
[body : book_name(string), author_id(numeric), number_of_pages(numeric), publisher(string)]


- Book show : "http://127.0.0.1:8000/api/v1/books/1"
<br>
[method: GET]
<br>
[header: Content-Type: alpplication/json , Accept: application/json, Authorization: Bearer [token]]


- Book Update : "http://127.0.0.1:8000/api/v1/books/1?_method=PUT"
<br>
[method: POST]
<br>
[header: Content-Type: alpplication/json , Accept: application/json, Authorization: Bearer [token]]
<br>
[body : book_name(string), author_id(numeric), number_of_pages(numeric), publisher(string)]


- Book Destroy : "http://127.0.0.1:8000/api/v1/books/1?_method=DELETE"
<br>
[method: POST]
<br>
[header: Content-Type: alpplication/json , Accept: application/json, Authorization: Bearer [token]]
