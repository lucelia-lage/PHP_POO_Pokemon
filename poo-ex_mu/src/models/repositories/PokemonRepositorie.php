<?php
abstract class PokemonRepositorie extends Db { // classe abstraite sert uniquement à fournir des méthodes statiques à utiliser ailleurs
    private static function request($request){ // méthode interne et privée pour exécuter une requête SQL
        $result = self::getInstance()->query($request); // exécute la requête SQL et retourne le résultat
        return $result; 
    }
    public static function getPokes(){ // méthode statique pour récupérer tous les Pokémon de la base de données
        $sql = "SELECT * from pokemon"; // requête SQL pour sélectionner tous les Pokémon
        return self::request($sql)->fetchAll(PDO::FETCH_ASSOC); // exécute la requête et retourne tous les résultats sous forme de tableau associatif
    }
    public static function getRandomPoke(){ // méthode statique pour récupérer un Pokémon aléatoire de la base de données
        $sql = "SELECT * from pokemon WHERE isCaptured = 0 ORDER BY RAND()  LIMIT 1"; // requête SQL pour sélectionner un Pokémon aléatoire qui n'est pas capturé
        return self::request($sql)->fetch(); // exécute la requête et retourne un seul résultat sous forme de tableau associatif
    }
    public static function capturePoke($id){ // méthode statique pour capturer un Pokémon
        $sql = "UPDATE pokemon SET isCaptured = 1 WHERE id = '$id'"; // requête SQL pour mettre à jour le statut du Pokémon en le marquant comme capturé
        return self::request($sql); // exécute la requête
    }
    public static function getCapturedPoke(){ // méthode statique pour récupérer tous les Pokémon capturés
        $sql = "SELECT * FROM pokemon WHERE isCaptured = 1"; // requête SQL pour sélectionner tous les Pokémon capturés
        return self::request($sql)->fetchAll(PDO::FETCH_ASSOC); // exécute la requête et retourne tous les résultats sous forme de tableau associatif
    }
    public static function freePoke($id){ // méthode statique pour libérer un Pokémon
        $sql = "UPDATE pokemon SET isCaptured = 0 WHERE id = '$id'"; // requête SQL pour mettre à jour le statut du Pokémon en le marquant comme non capturé
        return self::request($sql); // exécute la requête
    }
    public static function addPoke($name){ // méthode statique pour ajouter un Pokémon à la base de données
        $sql = "INSERT into pokemon (name, isCaptured) VALUES('$name', 1)"; // requête SQL pour insérer un nouveau Pokémon avec le nom donné et le marquer comme capturé
        return self::request($sql); // exécute la requête
    }
    public static function getPokeById($id){ // méthode statique pour récupérer un Pokémon par son id
        $sql = "SELECT * FROM pokemon WHERE id = '$id'"; // requête SQL pour sélectionner le Pokémon avec l'id donné
        return self::request($sql)->fetch(PDO::FETCH_ASSOC); // exécute la requête et retourne le résultat sous forme de tableau associatif
    }
}