<?php
class CaptureController extends Controller { // CaptureController hérite de la classe Controller
    public function index(){ // méthode idex qui sera appelée par le routeur
        if ($_SERVER["REQUEST_METHOD"] == "POST") { // vérifier si c'est bien une requête POST
            if (isset($_POST['capture'])) { // vérifier si le bouton 'capture' a été cliqué
             $idPoke = $_POST['capture']; // récupérer l'id du Pokémon à capturer
             Pokemon::capturePoke($idPoke); // appeler la méthode capturePoke de la classe Pokemon pour capturer le Pokémon
            }
         }
         header('Location: http://localhost:8000/'); // rediriger vers la page d'accueil après la capture
    }
}