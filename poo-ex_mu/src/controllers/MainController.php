<?php
class MainController extends Controller // la classe MainController hérite de la classe Controller
{
    public function index() // méthode index qui sera appellé par le router
    {
        $pokerandom = Pokemon::getRandomPoke();// récupérer un Pokémon aléatoire
        if ($pokerandom) { // si un Pokémon aléatoire a été récupéré
            $poke = new Pokemon($pokerandom['id'], $pokerandom['name'] ??'', $pokerandom['isCaptured']);
        } // sinon, on ne fait rien
        $pokesCaptured = Pokemon::getCapturedPoke(); // récupérer tous les Pokémon capturés
        $pokeArray = []; // tableau pour stocker les instances de Pokémon capturés
        foreach ($pokesCaptured as $pokeCapt) { // parcourir le tableau des Pokémon capturés
            $instancePoke = new Pokemon($pokeCapt["id"], $pokeCapt["name"] ??'', $pokeCapt["isCaptured"]); // créer une nouvelle instance de Pokémon avec les données récupérées
            array_push($pokeArray, $instancePoke); // ajouter l'instance de Pokémon au tableau
        }
        require_once("../views/main.php"); // inclure la vue main.php pour afficher les Pokémon
    }
}

// les ??'' sont utilisés pour éviter les erreurs si la clé n'existe pas dans le tableau associatif. 
// Si la clé n'existe pas, une chaîne vide sera utilisée à la place.
// La méthode getRandomPoke() est utilisée pour récupérer un Pokémon aléatoire à partir de la base de données.
// La méthode getCapturedPoke() est utilisée pour récupérer tous les Pokémon capturés à partir de la base de données.