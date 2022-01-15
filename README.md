<p align="center"><a href="https://laravel.com/docs/8.x/"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt=""></a></p>

## Requirement
***
[Composer](https://getcomposer.org/download/)

### Install PHP ^8.0
  - #### Windows
    - #### WAMP
        Download [WAMP 3.2.6](https://www.wampserver.com/) or update with [PHP 8.0.14](https://sourceforge.net/projects/wampserver/files/WampServer%203/WampServer%203.0.0/Addons/Php/wampserver3_x64_addon_php8.0.14.exe/download)

  - #### Linux
    - #### Debian - Ubuntu and branch
      Add PHP repository
      ```shell
      sudo add-apt-repository ppa:ondrej/php
      sudo apt update
      ```
      Install PHP with extensions
      ```shell
      sudo apt install php8.0
      sudo apt install php8.1-{bcmath,xml,fpm,mysql,zip,intl,ldap,gd,cli,bz2,curl,mbstring,pgsql,opcache,soap,cgi}
      ```
      Change your PHP version
      ```shell
      sudo update-alternatives --config php
      ```

## Install project
***

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
***
```shell
php artisan migrate
```

## Launch
***
```shell
php artisan serv

#Options :
--host=your_host #Your server ip or domain name
--port=your_port #Your server port
```


