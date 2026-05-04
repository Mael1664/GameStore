<?php
// Fichier : models/JeuManager.class.php

require_once 'Jeu.class.php';
require_once __DIR__ . '/../config/Database.php';

class JeuManager {
    private PDO $db;

    public function __construct() { 
        // On récupère l'instance unique de la connexion BDD
        $this->db = Database::getInstance(); 
    }

    // --- LECTURE (READ) ---
    public function getAll() {
        // On fait une requête complexe avec des JOINTURES (JOIN)
        // Cela permet de récupérer le NOM de l'éditeur au lieu de juste son ID
        $sql = "SELECT j.*, e.nom as nomEditeur, d.nom as nomDeveloppeur, p.ageMinimum 
                FROM JEU j 
                LEFT JOIN EDITEUR e ON j.idEditeur = e.idEditeur
                LEFT JOIN DEVELOPPEUR d ON j.idDeveloppeur = d.idDeveloppeur
                LEFT JOIN PEGI p ON j.idPegi = p.idPegi
                ORDER BY j.idJeu DESC";
        
        $stmt = $this->db->query($sql); // On exécute la requête
        $results = [];
        
        // On transforme chaque ligne de résultat SQL en un OBJET Jeu
        foreach($stmt->fetchAll() as $row) {
            $results[] = new Jeu($row);
        }
        return $results; // On retourne un tableau d'objets
    }

    // --- AJOUT (CREATE) ---
    public function add($titre, $desc, $date, $idEdit, $idPegi) {
        // On utilise des requêtes PRÉPARÉES (?) pour la sécurité
        // Cela empêche les failles "Injections SQL"
        $sql = "INSERT INTO JEU (titre, description, dateSortie, idEditeur, idDeveloppeur, idPegi) 
                VALUES (?, ?, ?, ?, 1, ?)"; 
        $stmt = $this->db->prepare($sql);
        // On remplace les ? par les vraies valeurs
        return $stmt->execute([$titre, $desc, $date, $idEdit, $idPegi]);
    }

    // --- MISE A JOUR (UPDATE) ---
    public function update(Jeu $jeu) {
        $sql = "UPDATE JEU SET 
                titre = ?, 
                description = ?, 
                dateSortie = ?, 
                idEditeur = ?, 
                idPegi = ? 
                WHERE idJeu = ?";
        
        $stmt = $this->db->prepare($sql);
        
        // On utilise les Getters de l'objet Jeu pour remplir les valeurs
        return $stmt->execute([
            $jeu->getTitre(),
            $jeu->getDescription(),
            $jeu->getDateSortie(),
            $jeu->getIdEditeur(),
            $jeu->getIdPegi(),
            $jeu->getId() // L'ID sert pour la clause WHERE
        ]);
    }

    // --- SUPPRESSION (DELETE) ---
    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM JEU WHERE idJeu = ?");
        return $stmt->execute([$id]);
    }

    // --- UTILITAIRE : Récupérer un seul jeu par ID ---
    public function getJeuById($id) {
        $stmt = $this->db->prepare("SELECT * FROM JEU WHERE idJeu = ?");
        $stmt->execute([$id]);
        $data = $stmt->fetch();
        
        if ($data) {
            return new Jeu($data); // On retourne un objet
        }
        return null; // Si pas trouvé
    }

    // --- HELPER : Listes déroulantes ---
    public function getEditeurs() { return $this->db->query("SELECT * FROM EDITEUR")->fetchAll(); }
    public function getPegis() { return $this->db->query("SELECT * FROM PEGI")->fetchAll(); }
}
?>