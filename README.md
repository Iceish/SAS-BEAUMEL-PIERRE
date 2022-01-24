<p align="center"><a href="https://laravel.com/docs/8.x/"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt=""></a></p>

##Tech used

<a href="https://www.php.net" target="_blank"> <img src="https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="mysql"/> </a> 
<a href="https://www.mysql.com/" target="_blank"> <img src="https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" alt="mysql"/> </a> 
<a href="https://mariadb.org/" target="_blank"> <img src="https://img.shields.io/badge/MariaDB-003545?style=for-the-badge&logo=mariadb&logoColor=white" alt="mysql"/> </a> 
<br>
<a href="https://www.w3.org/html/" target="_blank"> <img src="https://img.shields.io/badge/HTML5-E34F26?style=for-the-badge&logo=html5&logoColor=white" alt="mysql"/> </a> 
<a href="https://sass-lang.com/" target="_blank"> <img src="https://img.shields.io/badge/Sass-CC6699?style=for-the-badge&logo=sass&logoColor=white" alt="mysql"/> </a> 
<a href="https://www.w3schools.com/css/" target="_blank"> <img src="https://img.shields.io/badge/CSS3-1572B6?style=for-the-badge&logo=css3&logoColor=white" alt="mysql"/> </a> 
<a href="https://developer.mozilla.org/en-US/docs/Web/JavaScript" target="_blank"> <img src="https://img.shields.io/badge/JavaScript-323330?style=for-the-badge&logo=javascript&logoColor=F7DF1E"/> </a> 
<br>
<a href="https://laravel.com/" target="_blank"> <img src="https://img.shields.io/badge/Apache-D22128?style=for-the-badge&logo=Apache&logoColor=white" alt="mysql"/> </a> 

## Requirement
***
- [composer](https://getcomposer.org/download/)
- [npm](https://www.npmjs.com/)
- [php 8.0](https://www.php.net/archive/2021.php#2021-12-16-2)
- [a brain](https://www.lifehack.org/859314/think-smart)
<details>
  <summary>Help</summary>

## How to install PHP _(rookie section)_
- #### Windows
    - ##### WAMP
      Download [WAMP 3.2.6](https://www.wampserver.com/) or update with [PHP 8.0.14](https://sourceforge.net/projects/wampserver/files/WampServer%203/WampServer%203.0.0/Addons/Php/wampserver3_x64_addon_php8.0.14.exe/download)

    - #### Linux
        - ##### Debian - Ubuntu and branch
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
</details>

  

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

### Rename [.env.example](.env) in .env
### Modify .env
```dotenv
APP_NAME=SAS-BEAUMEL-PIERRE
DB_HOST=Your database ip
DB_DATABASE=Your database name
DB_USERNAME=Your database username
DB_PASSWORD=Your database password
SESSION_DRIVER=database
```

## Migration database
[Laravel 8.x documentation.](https://laravel.com/docs/8.x/migrations)
***
```shell
php artisan migrate
```

### Launch
***
```shell
php artisan serv

#Options :
--host=your_host #Your server ip or domain name
--port=your_port #Your server port
```

## Optional features

### Configure [filewatcher](https://www.jetbrains.com/help/phpstorm/using-file-watchers.html) for sass
1. Open File > Settings > File Watchers
2. Add a new one with following parameters :
   - **name** : scss
   - **file** type : scss
   - **scope** : project files
   - **program** : npm
   - **arguments** : run dev
   - **output path** : $ProjectFileDir$/public/css/$FileNameWithoutExtension$.css:$ProjectFileDir$/public/css/$FileNameWithoutExtension$.css.map
   - **Disable** "Auto save edited files to trigger the watcher" checkbox.
3. Apply and voilà.

### Plugins _(phpstorm)_
1. Open File > Settings > Plugins > Marketplace
2. Add **Laravel**
