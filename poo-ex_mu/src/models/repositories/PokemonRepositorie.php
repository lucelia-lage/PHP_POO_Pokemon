<?php

abstract class PokemonRepositorie extends Db {
    private static function request($request){
        $result = self::getInstance()->query($request);
        return $result;
    }
    public static function getPokes(){
        $sql = "SELECT * from pokemon";
        return self::request($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function getRandomPoke(){
        $sql = "SELECT * from pokemon WHERE isCaptured = 0 ORDER BY RAND()  LIMIT 1";
        return self::request($sql)->fetch();
    }
    public static function capturePoke($id){
        $sql = "UPDATE pokemon SET isCaptured = 1 WHERE id = '$id'";
        return self::request($sql);
    }
    public static function getCapturedPoke(){
        $sql = "SELECT * FROM pokemon WHERE isCaptured = 1";
        return self::request($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function freePoke($id){
        $sql = "UPDATE pokemon SET isCaptured = 0 WHERE id = '$id'";
        return self::request($sql);
    }
    public static function addPoke($name){
        $sql = "INSERT into pokemon (name, isCaptured) VALUES('$name', 1)";
        return self::request($sql);
    }
    public static function getPokeById($id){
        $sql = "SELECT * FROM pokemon WHERE id = '$id'";
        return self::request($sql)->fetch(PDO::FETCH_ASSOC);
    }
}