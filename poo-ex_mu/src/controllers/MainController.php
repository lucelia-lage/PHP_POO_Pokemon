<?php
class MainController extends Controller
{
    public function index()
    {
        $pokerandom = Pokemon::getRandomPoke();
        if ($pokerandom) {
            $poke = new Pokemon($pokerandom['id'], $pokerandom['name'] ??'', $pokerandom['isCaptured']);
        }
        $pokesCaptured = Pokemon::getCapturedPoke();
        $pokeArray = [];
        foreach ($pokesCaptured as $pokeCapt) {
            $instancePoke = new Pokemon($pokeCapt["id"], $pokeCapt["name"] ??'', $pokeCapt["isCaptured"]);
            array_push($pokeArray, $instancePoke);
        }
        require_once("../views/main.php");
    }
}
