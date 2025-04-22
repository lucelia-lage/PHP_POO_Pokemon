<?php
class MoreAboutPokeController extends Controller
{
    public function index()
    {
        $uri = $_SERVER["REQUEST_URI"];
        $id = explode("/", $uri)[2] ?? null;

        if ($id) {
            $pokeData = Pokemon::getPokeById($id);
            if ($pokeData) {
                $pokemon = new Pokemon($pokeData['id'], $pokeData['name'], $pokeData['isCaptured']);
                require_once("../views/pokemon.php");
                return;
            }
        }
        include_once("../views/error.php");
    }
}
?> 