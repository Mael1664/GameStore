<?php

require_once __DIR__ . '/../models/GenreManager.class.php';
require_once __DIR__ . '/../models/Genre.class.php';

class GenresController {
    private $manager;

    public function __construct() { 
        $this->manager = new GenreManager(); 
    }

    public function listAction() {
        $genres = $this->manager->getAll();
        require __DIR__ . '/../views/genres/liste.php';
    }

    public function addAction() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Création de l'objet Genre avec les données du formulaire
            $genre = new Genre($_POST);
            $this->manager->add($genre);
            
            // Redirection vers la liste
            header('Location: index.php?page=genres&action=list');
            exit;
        }
        // Affichage du formulaire si on n'est pas en POST
        require __DIR__ . '/../views/genres/form.php';
    }

    public function deleteAction($id) {
        if ($id) {
            $this->manager->delete($id);
        }
        header('Location: index.php?page=genres&action=list');
    }
}
?>