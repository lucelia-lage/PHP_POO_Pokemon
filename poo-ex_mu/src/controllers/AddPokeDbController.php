<?php
class AddPokeDbController extends Controller { // la classe AddPokeDbController est une classe qui hérite de la classe Controller -> elle peut utiliser toutes les méthodes/ propriétés
 public function index(){ // la méthode index() est la méthode par défaut qui sera appelée lorsque l'on accède à cette page
    try { // le bloc try est utilisé pour capturer les exceptions qui pourraient être levées pendant l'exécution du code
        $response = file_get_contents('https://pokeapi.co/api/v2/pokemon?limit=151'); // on utilise la fonction file_get_contents() pour récupérer le contenu de l'URL de l'API Pokemon -> on récupère les 151 premiers pokemons
        $data = json_decode($response, true); // on utilise la fonction json_decode() pour décoder la réponse JSON de l'API -> on transforme la chaîne JSON en tableau associatif PHP
        var_dump($data['results']); // on utilise la fonction var_dump() pour afficher le contenu du tableau associatif -> on peut voir les pokemons récupérés

        foreach($data["results"] as $poke ){ // on parcourt le tableau associatif des pokemons récupérés
            Pokemon::addPoke($poke['name'] ??''); // on utilise la méthode addPoke() de la classe Pokemon pour ajouter chaque pokemon à la base de données -> on passe le nom du pokemon en paramètre
        }
    } catch (\Throwable $th) { // le bloc catch est utilisé pour capturer les exceptions qui pourraient être levées pendant l'exécution du code
        echo $th->getMessage(); // afficher le message d'erreur de l'exception
    }
 }
}
?>