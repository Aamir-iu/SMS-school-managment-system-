# school-management-system(SMS)
Another School Management System build with laravel and PHP 7.


:loudspeaker:
**Notice:** This branch is under development all features are not complete yet! so don't use it in production.
if you need production use please wait for completion of the project or use version [v1.0]. Developed by Asset.

# Features
- Application
- Admission
- Attendance
- Exam
- Result
- Certificate
- Fees
- Accounting
- Library
- Hostel
- Employees
- Leave manage
- Reports
- Front-end website

# Installation and use

## Dependency
- PHP >= 7.1.3
- OpenSSL PHP Extension
- PDO PHP Extension
- Mbstring PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension
- Ctype PHP Extension
- JSON PHP Extension

- NodeJS, npm, webpack


```
$ git clone https://github.com/Aamir-iu/SMS-school-managment-system-.git -b v2.0-dev --single-branch
```
```
$ cd school-management-system
```
```
$ cp .env.example .env
```
**Change configuration according to your need in ".env" file and create Database**
```
$ composer install
```
```
$ php artisan migrate
```
```
$ php artisan db:seed
```
```
$ npm install
```
```
$ npm run production
```
or
```
$ npm run development
```
```
$ php artisan serve
```
Now visit and login: http://localhost:8000 \
username: admin\
password: demo123


