Historia
========

Website crawler and archiver using CodeIgniter, wget, and cron jobs.

Requirements
------------

1. PHP 5.2.4 or newer  
2. Wget  1.13.4 or newer  

Configuration
------------

1. Set wget path for server environment in config/historia.php  
`$config['wget_path'] = "/usr/bin/wget";`  
2. Set archives folder permissions  
`chmod 777 archives`  
3. Configure the cron job  

Application
------------

**Website Layout & Assets**: [Twitter Bootstrap 2.0.4](http://twitter.github.com/bootstrap/)  
**Website Icons**: [Font Awesome 2.0](http://fortawesome.github.com/Font-Awesome/)  
**PHP Framework**: [CodeIgniter 2.1.2](https://github.com/EllisLab/CodeIgniter)  
**CI Libraries & Extensions**:  
* Authentication - [IonAuth 2](https://github.com/benedmunds/CodeIgniter-Ion-Auth)  
* HMVC - [HMVC Modular Extensions](https://bitbucket.org/wiredesignz/codeigniter-modular-extensions-hmvc/wiki/Home)  