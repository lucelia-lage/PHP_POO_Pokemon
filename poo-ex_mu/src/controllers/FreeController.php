<?php
class FreeController extends Controller {
    public function index(){ 
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['free'])) {
             $idPoke = $_POST['free'];
             Pokemon::freePoke($idPoke);
            }
         }
         header('Location: http://localhost:8000/');
    }
}