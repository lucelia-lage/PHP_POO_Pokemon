<?php
class AddPokeDbController extends Controller { 
 public function index(){
    try {
        $response = file_get_contents('https://pokeapi.co/api/v2/pokemon?limit=151');
        $data = json_decode($response, true);
        var_dump($data['results']);

        foreach($data["results"] as $poke ){
            Pokemon::addPoke($poke['name'] ??'');
        }
    } catch (\Throwable $th) {
        echo $th->getMessage();
    }
 }
}
?>