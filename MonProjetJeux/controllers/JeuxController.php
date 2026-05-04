<?php

require_once __DIR__ . '/../models/JeuManager.class.php';
require_once __DIR__ . '/../models/Jeu.class.php';

class JeuxController {
    private $manager; // Variable pour stocker le gestionnaire de données

    public function __construct() { 
        // Au démarrage du contrôleur, on prépare le Manager
        $this->manager = new JeuManager(); 
    }

    // --- AFFICHER LA LISTE ---
    public function listAction() {
        // 1. On demande les données au Modèle
        $jeux = $this->manager->getAll();
        
        // 2. On envoie les données à la Vue
        require __DIR__ . '/../views/jeux/liste.php';
    }

    // --- AJOUTER UN JEU ---
    public function addAction() {
        // Sécurité : Si l'utilisateur n'est PAS connecté, on le deco 
        if (!isset($_SESSION['user'])) {
            header('Location: index.php?page=auth&action=login');
            exit;
        }

        // Cas A : L'utilisateur a cliqué sur "Enregistrer" (Méthode POST)
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // On appelle le manager pour insérer en BDD
            $this->manager->add(
                $_POST['titre'], 
                $_POST['description'], 
                $_POST['dateSortie'], 
                $_POST['idEditeur'], 
                $_POST['idPegi']
            );
            // On redirige vers la liste
            header('Location: index.php?page=jeux&action=list');
            exit; // Toujours mettre exit après une redirection header()
        }

        // Cas B : L'utilisateur veut voir le formulaire (Méthode GET)
        // On a besoin des listes pour les menus déroulants (<select>)
        $editeurs = $this->manager->getEditeurs();
        $pegis = $this->manager->getPegis();

        // On affiche le formulaire
        require __DIR__ . '/../views/jeux/form.php';
    }

    // --- MODIFIER UN JEU ---
    public function editAction() {
        // Sécurité Admin
        if (!isset($_SESSION['user'])) { header('Location: index.php'); exit; }

        // On vérifie qu'on a bien un ID dans l'URL
        if (!isset($_GET['id'])) { header('Location: index.php'); exit; }
        $id = $_GET['id'];

        // Cas A : Sauvegarde des modifications (POST)
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // On crée un objet Jeu temporaire avec les nouvelles données
            $data = [
                'idJeu' => $id,
                'titre' => $_POST['titre'],
                'description' => $_POST['description'],
                'dateSortie' => $_POST['dateSortie'],
                'idEditeur' => $_POST['idEditeur'],
                'idPegi' => $_POST['idPegi']
            ];
            $jeu = new Jeu($data);
            
            // On demande au manager de faire l'UPDATE
            $this->manager->update($jeu);
            
            header('Location: index.php?page=jeux&action=list');
            exit;
        }

        // Cas B : Affichage du formulaire pré-rempli (GET)
        $jeu = $this->manager->getJeuById($id); // On récupère les infos actuelles
        $editeurs = $this->manager->getEditeurs(); // Pour les listes
        $pegis = $this->manager->getPegis();

        require __DIR__ . '/../views/jeux/edit.php';
    }

    // --- SUPPRIMER UN JEU ---
    public function deleteAction($id) {
        // Sécurité Admin
        if (isset($_SESSION['user']) && $id) {
            $this->manager->delete($id);
        }
        header('Location: index.php?page=jeux&action=list');
    }
}
?>