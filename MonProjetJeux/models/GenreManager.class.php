<?php

require_once 'Genre.class.php';
require_once __DIR__ . '/../config/Database.php'; // Chemin absolu pour éviter les erreurs

class GenreManager {
    private PDO $db;

    public function __construct() { 
        $this->db = Database::getInstance(); 
    }

    public function getAll() {
        $stmt = $this->db->query("SELECT * FROM GENRE ORDER BY idGenre DESC");
        // Utilisation de FETCH_CLASS pour créer directement des objets Genre
        return $stmt->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Genre', [['idGenre'=>null]]);
    }

    public function add(Genre $g) {
        $stmt = $this->db->prepare("INSERT INTO GENRE (libelle) VALUES (?)");
        return $stmt->execute([$g->getLibelle()]);
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM GENRE WHERE idGenre = ?");
        return $stmt->execute([$id]);
    }
}
?>