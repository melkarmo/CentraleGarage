# CentraleGarage

*Projet réalisé dans le cadre du cours **MOD 4.6 - Systèmes de bases de données** @[ECL](https://www.ec-lyon.fr/)*

CentraleGarage est une application web permettant la gestion et l'organisation d'un garage automobile.

L'application permet de réaliser les opérations CRUD (Create, Read, Update, Delete) sur les entités principales de l'organisation d'un garage : clients, employés, voitures, réparations ... 

*Environnement :*  
(**Back**) PHP (PDO), MySQL  
(**Front**) HTML/CSS, Bootstrap  
(**Tools**) XAMPP, phpMyAdmin, Visual Studio Code   

## Configuration (*localhost*)

La configuration de l'application en local est assez simple grâce à WAMP (ou XAMPP) :

1. Importer le schéma MySQL `sql/ecl_garage.sql` sur phpMyAdmin
2. Configurer `model/model.php` avec les identifiants de votre base de données
3. Démarrer le serveur applicatif, et se rendre sur http://localhost/CentraleGarage

## Captures d'écran

![screenshot1](https://raw.githubusercontent.com/melkarmo/CentraleGarage/master/public/screenshot1.PNG)

![screenshot2](https://raw.githubusercontent.com/melkarmo/CentraleGarage/master/public/screenshot2.PNG)

![screenshot3](https://raw.githubusercontent.com/melkarmo/CentraleGarage/master/public/screenshot3.PNG)
