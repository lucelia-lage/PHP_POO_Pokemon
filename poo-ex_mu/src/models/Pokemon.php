<?php
class Pokemon extends PokemonRepositorie { // la classe Pokemon hérite de la classe PokemonRepositorie
    private $id; 
    private $name;
    private $isCaptured;

    public function __construct($id, $name, $isCaptured) // constructeur de la classe Pokemon qui initialise les propriétés id, name et isCaptured
    {
        $this->setId($id);
        $this->setName($name);
        $this->setIsCaptured($isCaptured);
    }
    public function getId(){ // récupérer l'id du Pokémon
        return $this->id;
    }
    public function setId($id){ // définir l'id du Pokémon
        $this->id = $id;
    }
    public function getName(){ // récupérer le nom du Pokémon
        return $this->name;
    }
    public function setName($name){ // définir le nom du Pokémon
        $this->name = $name;
    }
    public function getIsCaptured(){ // vérifier si le Pokémon est capturé
        return $this->isCaptured;
    }
    public function setIsCaptured($isCaptured){ // définir si le Pokémon est capturé
        $this->isCaptured = $isCaptured;
    }
}