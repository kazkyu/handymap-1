1) You have to install wampserver and follow the step in this website
     -https://sourceforge.net/projects/wampserver/files/WampServer%202/Wampserver%202.5/wampserver2.5-Apache-2.4.9-Mysql-5.6.17-php5.5.12-64b.exe/download
     -http://www.darwinbiler.com/how-to-install-laravel-on-wamp-for-beginners/



2) GitHub
     -Download github desktop
     -Add the project : -https://github.com/GreenCame/handymap
     -My wamp is there: C:\wamp
     -I put the project in "C:\wamp\frameworks\laravel\handymap" so if you change, change the path for next step.



3) Make Database
    -go to localhost/phpmyadmin/
        -create a New-Database "softwareproject" (the name is very Important) database in UTF-8 generaly
        -change a root password and put "root" password, in settings phpmyadmin
    -configuration
        -in the file C:\wamp\apps\phpmyadmin4.1.14\config.inc.php change that:

        $cfg['Servers'][$i]['user'] = 'root';
        $cfg['Servers'][$i]['password'] = 'root';

    -Open cmd in Admin
        -command: -cd C:\wamp\frameworks\laravel\handymap
        -php artisan make:migration



4) Hosts file
    -in C:\Windows\System32\drivers\etc change the hosts file
    -add in the end the line :

        127.0.0.1       laravel.dev



5) httpd.conf
    -add in the end of the file "C:\wamp\bin\apache\apache2.4.9\conf\httpd.conf"

        <VirtualHost laravel.dev:80>
          DocumentRoot C:\wamp\frameworks\laravel\handymap\public
          <Directory "C:\wamp\frameworks\laravel\handymap\public">
            Options Indexes FollowSymLinks
            AllowOverride All
            Order allow,deny
            Allow from all
          </Directory>
        </VirtualHost>

     -Remove the # in line:      "LoadModule rewrite_module modules/mod_rewrite.so"     (line 154 for me)



6) Alias (maybe optionnal if you use laravel.dev)
    -add the file "handymap.conf" in "C:\wamp\alias\" :

        Alias /handymap "C:/wamp/frameworks/laravel/handymap/public"
        <Directory "C:/wamp/frameworks/laravel/handymap/public">
        DirectoryIndex index.php
        Options Indexes FollowSymLinks MultiViews
        AllowOverride all
            Order allow,deny
            allow from all
            Require all granted
        </Directory>



7) Restart you computer (important)
    -Go to laravel.dev