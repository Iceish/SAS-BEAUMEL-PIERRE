<p align="center"><a href="https://laravel.com/docs/8.x/"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

## Requirement
[Composer](https://getcomposer.org/download/)

PHP ^8.0

## Install project
### Clone project
```
git clone https://github.com/EnzoGzz/SAS-BEAUMEL-PIERRE.git
```

### Install packages
```
composer install
```

### Rename [.env.example](.env.example) in .env
### Modify .env
```dotenv
APP_NAME=SAS-BEAUMEL-PIERRE
DB_HOST=Your database ip
DB_DATABASE=Your database name
DB_USERNAME=Your database username
DB_PASSWORD=Your database password
SESSION_DRIVER=database
```

## [Migration database](https://laravel.com/docs/8.x/migrations)
```shell
php artisan migrate
```

## Launch
```shell
php artisan serv

#Options :
--host=your_host #Your server ip or domain name
--port=your_port #Your server port
```


