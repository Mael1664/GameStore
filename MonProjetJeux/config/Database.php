<?php
class Database {
    private const DB_USER = 'root'; 
    private const DB_PASS = ''; 

    private const DB_HOST = 'localhost';
    private const DB_NAME = 'catalogue_jeux_video';
    private static ?PDO $instance = null;

    public static function getInstance(): PDO {
        if (self::$instance === null) {
            try {
                self::$instance = new PDO(
                    'mysql:host='.self::DB_HOST.';dbname='.self::DB_NAME.';charset=utf8mb4', 
                    self::DB_USER, 
                    self::DB_PASS, 
                    [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]
                );
            } catch (PDOException $e) { die('Erreur BDD : ' . $e->getMessage()); }
        }
        return self::$instance;
    }
}

