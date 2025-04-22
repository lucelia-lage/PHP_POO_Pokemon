<?php
abstract class Controller { // classe abstracte parce qu'elle sert de modèle pour d'autres classes : impose une structure! 
    
   abstract public function index(); // toutes les classes qui héritent de Controller doivent implémenter leur propre version de la méthode index().
}