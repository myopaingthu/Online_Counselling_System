## Name
Online Counselling System

## Setup Guide for Laravel without docker
```
git clone https://github.com/myopaingthu/Online_Counselling_System.git
cd into cloned project folder
cd src
run composer install
copy of .env.example and rename it to .env
change DB section with your local MySQL database setting
create new database in your local MySQL
run php artisan migrate:fresh --seed
run php artisan key:generate
run php artisan serve
can be accessed at http://localhost:8000/
```

## Setup Guide for Laravel with docker
```
cd into cloned project folder
run docker-compose build
run docker-compose up -d
run docker exec -it app sh
run composer install
copy of .env.example and rename it to .env
change DB like this
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=library_db
DB_USERNAME=MYSQL_ROOT_PASSWORD
DB_PASSWORD=root
run php artisan migrate:fresh --seed
run php artisan key:generate
can be accessed at http://localhost:8000/
```

## Login credentials for admin
```
email => admin@gmail.com
password => password
```

## Versions I have used
- PHP => ^7.3|^8.0
- Laravel framework => ^8.75
- MySQL => 8.0

## Setup to send mail
```
replace mail section in env with your sender mail
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=yourmail@gmail.com
MAIL_PASSWORD=your app password generated from mail
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=yourmail@gmail.com
MAIL_FROM_NAME="${APP_NAME}"
```

## How to get app password from gmail
[App Password](https://www.getmailbird.com/gmail-app-password/)
