<?php
class Pokemon extends PokemonRepositorie {
    private $id;
    private $name;
    private $isCaptured;

    public function __construct($id, $name, $isCaptured)
    {
        $this->setId($id);
        $this->setName($name);
        $this->setIsCaptured($isCaptured);
    }
    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;
    }
    public function getName(){
        return $this->name;
    }
    public function setName($name){
        $this->name = $name;
    }
    public function getIsCaptured(){
        return $this->isCaptured;
    }
    public function setIsCaptured($isCaptured){
        $this->isCaptured = $isCaptured;
    }
}