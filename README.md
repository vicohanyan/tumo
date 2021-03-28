<p align="center">
    <h1 align="center">TUMO Test Work</h1>
    <br>
</p>

DEPENDENCIES
------------
### Web server 

```text
Php 7.4 +
PostgreSql 12 + 
```

INSTALLATION
------------
1. Cloning  from repository into your server 

2. Move to server working directory

3. Configure your server set index.php path "path/to/application/web/index.php"

4. create database 

5. Configure database settings in app/config/db.php 
    set username,password,host,database name and database type ()  

6. Configure mail settings in app/config/console.php  

7. Open application directory in terminal and run this command
```
$ php yii migrate
```

### Mail sender application 

1. Create CRON job or Daemon and run this command 
```html
$ php ABSOLUTE_PATH_TO_APP_DIRECTORY/yii cron/send-mail
```
Example
```
$ php /var/www/html/tumo/yii cron/send-mail
```

