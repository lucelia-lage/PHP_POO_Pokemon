<?php
class FreeController extends Controller { // la classe FreeController hérite de la classe Controller
    public function index(){ // méthode index() qui sera appelée par le routeur
        if ($_SERVER["REQUEST_METHOD"] == "POST") { // vérifier si c'est bien une requête POST
            if (isset($_POST['free'])) { // vérifier si le bouton 'free' a été cliqué
             $idPoke = $_POST['free']; // récupérer l'id du Pokémon à libérer
             Pokemon::freePoke($idPoke); // appeler la méthode freePoke de la classe Pokemon pour libérer le Pokémon
            }
         }
         header('Location: http://localhost:8000/'); // rediriger vers la page d'accueil après la libération
    }
}