<?php
class Db { // classe abstraite qui gère la connexion à la base de données
    private static $instance; // instance de la classe PDO pour la connexion à la base de données

    protected static function getInstance(){ // méthode protégée pour obtenir l'instance de la connexion à la base de données
        if (self::$instance == null) { // si l'instance n'existe pas, on la crée
            try { // on essaie de se connecter à la base de données
                self::$instance = new PDO("mysql:host=localhost;dbname=poke","root",""); // on crée une nouvelle instance de PDO avec les paramètres de connexion
                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // on définit le mode d'erreur de PDO pour lancer une exception en cas d'erreur
            } catch (PDOException $e) { // si une exception est levée, on l'attrape
                die($e->getMessage()); // on affiche le message d'erreur
            }
        }
        return self::$instance; // on retourne l'instance de la connexion à la base de données
    }
    protected static function disconnect(){ // méthode protégée pour se déconnecter de la base de données
        self::$instance = null; // on met l'instance à null pour fermer la connexion
    }
}