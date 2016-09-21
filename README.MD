# Intra Hub (laravel Version)

Cette version fonctionne avec le framework PHP Laravel et les frameworks CSS Bootstrap et JS Vue.js

Laravel fonctionne avec Composer et NPM, il faut donc faire un "npm install" et "composer update" une fois arrivé dans le dossier.
Il faut ensuite paramétrer le fichier .env avec les bons accès la BDD.

Guide d'installation :
1) Paramétrer un serveur Apache ou Nginx
2) "php artisan migrate" pour créer les tables dans la base
3) Accéder au site en local, se connecter dessus avec les pass de l'intra
4) "php artisan db:seed" va peupler les tables avec des projets et des articles