#Server Setup :

## Installer LAMP (linux/apache/mysql/php)
	https://www.digitalocean.com/community/tutorials/how-to-install-linux-apache-mysql-php-lamp-stack-on-debian-8
### installer Debian8

### installer Apache2 2.4.10
	# installer apache2
		> apt-get update
		> apt-get install apache2 apache2-doc
	# nessessaire pour zend (a faire après que zend soit installé)
		> a2enmod rewrite
		> emacs /etc/apache2/sites-avaliable/000-default.conf
            Le fichier doit ressembler à ca :
                <VirtualHost *:80>
                        # le nom du site
                        ServerName www.intra-hub.com
                        #le mail du site (affiché par ex en cas d'erreur 500)
                        ServerAdmin leplusbeau@intra-hub.com
                        # le path vers le folder /public de zend
                        DocumentRoot /var/www/intra-hub/intra-hub/public
                        # la page a ouvrir par défaut
                        DirectoryIndex  index.php

                        # remplace le .htaccess de zend, parce que c'est de la merde d'avoir un .htaccess (perf et secu)
                        RewriteEngine off

                        <Location />
                                RewriteEngine On
                                RewriteCond %{REQUEST_FILENAME} -s [OR]
                                RewriteCond %{REQUEST_FILENAME} -l [OR]
                                RewriteCond %{REQUEST_FILENAME} -d
                                RewriteRule ^.*$ - [NC,L]
                                RewriteRule ^.*$ /index.php [NC,L]
                        </Location>

                        <Directory /var/www/intra-hub/intra-hub/public>
                                   Require all granted
                        </Directory>
                        ErrorLog ${APACHE_LOG_DIR}/error.log
                        CustomLog ${APACHE_LOG_DIR}/access.log combined
                </VirtualHost>
        > service apache2 restart

			
### installer mysql
	> apt-get install mysql-server php5-mysql
    > mysql_secure_installation
    A ce moment, mysql pose plein de questions sur l'install, il faut lire, ya rien de compliqué
### installer php 5
	> apt-get install php5-common libapache2-mod-php5 php5-cli
    > service apache2 restart

## installer git 
    <A remplir>

Normalement, le serveur est set à ce moment.

## installer zend
    > curl -s https://getcomposer.org/installer | php --
    /var/www/lePathDuSite doit être vide pour la commande suivante.
    > php composer.phar create-project -sdev --repository-url="https://packages.zendframework.com" zendframework/skeleton-application /var/www/lePathDuSite
	
    Aller voir la section de apache pour set correctement le virtualHost
## installer angularJS
	> apt-get install npm nodejs
    > npm install angular


Voila, le serveur est a peu pres set

# WorkStation Setup :
A quoi ca sert ?
    a pouvoir bosser en local, sans avoir a push toute les 30secondes pour tester si les modifs marchent.
    Ca permet aussi de bosser a plusieurs sans que tout le monde casse le site en même temps.
    Alors oui c'est chiant parce qu'il y a plein de trucs à installer, mais ca donne accès à:
        - un shell sur windows correctement configuré
        - un systeme de vm bien foutu, configurable avec un fichier, et qui est utilisé par pas mal de boites pour faire du dev


## installer putty
    
    
## installer babun
    http://babun.github.io/

## intaller ConEmu (plusieurs onglets de shell: putty/babun/cmd etc.)
    http://www.fosshub.com/ConEmu.html
    # Pour pouvoir utiliser babun dans ConEmu :
        aller dans settings/startup/tasks
        cliquer sur '+'
        dans task parameters : /icon "%userprofile%\.babun\cygwin\bin\mintty.exe" /dir "%userprofile%"
        dans Command : %userprofile%\.babun\cygwin\bin\mintty.exe /bin/env CHERE_INVOKING=1 /bin/zsh.exe
        valider

## installer VirtualBox
    https://www.virtualbox.org/wiki/Downloads



## Installer Vagrant
    https://www.vagrantup.com/downloads.html

    se placer dans le repertoire de zend sur le dépot local, la ou se trouve le Vagrantfile
    lancer la machine vagrant : vagrant up
    si l'installation ne se fait pas entierement correctement : vagrant provision

    Arreter la machine vagrant : vagrant halt

    se connecter à la Vbox vagrant : vagrant ssh
    se root dans vagrant : sudo su
    se deconnecter : logout

