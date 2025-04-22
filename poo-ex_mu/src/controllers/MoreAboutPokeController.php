<?php
class MoreAboutPokeController extends Controller // MoreAboutPokeController hérite de la classe Controller
{
    public function index() // méthode index qui sera appellée par le routeur 
    {
        $uri = $_SERVER["REQUEST_URI"]; // récupérer l'URI de la requête
        $id = explode("/", $uri)[2] ?? null; // extraire l'id du Pokémon de l'URI 

        if ($id) { // vérifier si l'id est présent
            $pokeData = Pokemon::getPokeById($id); // appeler la méthode getPokeById de la classe Pokemon pour récupérer les données du Pokémon par son id
            if ($pokeData) { // vérifier si les données du Pokémon ont été récupérées
                $pokemon = new Pokemon($pokeData['id'], $pokeData['name'], $pokeData['isCaptured']); // créer une nouvelle instance de Pokémon avec les données récupérées
                require_once("../views/pokemon.php"); // inclure la vue pokemon.php pour afficher les détails du Pokémon
                return;
            }
        }
        include_once("../views/error.php"); // inclure la vue error.php si l'id n'est pas valide ou si le Pokémon n'a pas été trouvé
    }
}
// explication détaillée sur $uri = $_SERVER["REQUEST_URI"];
// $id = explode("/", $uri)[2] ?? null; : on récup l'url actuelle / on la découpe avec explode("/", $uri). ça nous donne un tableau comme ça: 
//[
   // 0 => '',
   // 1 => 'moreaboutpoke',
   // 2 => '25'
 // ]
// on récupère l’élément à l’index 2 : l’id du Pokémon qu’on veut voir.
// si l’id n’existe pas, on met null.
?> 