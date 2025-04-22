<?php
//db et Router
require_once('../core/Router.php'); // système de routage
require_once("../src/models/Db.php"); // gère la connexion à la base de données
//les repositories : classe qui va gérer la base de données
require_once("../src/models/repositories/PokemonRepositorie.php");
//modeles : classe qui va gérer les données de l'application
require_once("../src/models/Pokemon.php");
//le controller abstract : classe abstraite qui va gérer les contrôleurs
require_once("../src/controllers/Controller.php");
//les autres controlleurs : classes qui vont gérer les différentes pages de l'application
require_once('../src/controllers/MainController.php');
require_once('../src/controllers/CaptureController.php');
require_once('../src/controllers/FreeController.php');
require_once('../src/controllers/AddPokeDbController.php');
require_once('../src/controllers/MoreAboutPokeController.php');

$router = new Router(); // instanciation de la classe Router
$router->start(); // démarrage du routeur -> il va analyser l'URL de la requête entrante et déterminer quel contrôleur et quelle méthode appeler en fonction de cette URL

// ce fichier est le point d'entrée de l'application
// il va instancier le routeur et lui dire de démarrer
// le routeur va analyser l'URL de la requête entrante et déterminer quel contrôleur et quelle méthode appeler en fonction de cette URL
// il va également inclure les fichiers nécessaires pour le bon fonctionnement de l'application



