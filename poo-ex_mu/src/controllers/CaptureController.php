<?php
class CaptureController extends Controller {
    public function index(){
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['capture'])) {
             $idPoke = $_POST['capture'];
             Pokemon::capturePoke($idPoke);
            }
         }
         header('Location: http://localhost:8000/');
    }
}