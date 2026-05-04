<?php
// Fichier : controllers/AuthController.php

require_once __DIR__ . '/../models/UtilisateurManager.class.php';

class AuthController {
    private $manager;

    public function __construct() {
        $this->manager = new UtilisateurManager();
    }

    // Afficher le formulaire de login
    public function loginAction() {
        require __DIR__ . '/../views/auth/login.php';
    }

    // Vérifier les identifiants soumis
    public function checkLoginAction() {
        // On vérifie si les champs sont remplis
        if (isset($_POST['email']) && isset($_POST['password'])) {
            // On appelle le manager pour vérifier en BDD
            $user = $this->manager->verifLogin($_POST['email'], $_POST['password']);

            if ($user) {
                // SUCCÈS : On stocke l'utilisateur dans la SESSION
                // C'est ce qui maintient l'utilisateur connecté de page en page
                $_SESSION['user'] = $user;
                
                // On redirige vers l'accueil
                header('Location: index.php?page=jeux&action=list');
                exit;
            } else {
                // ECHEC : On réaffiche le login avec une erreur
                $error = "Identifiants incorrects";
                require __DIR__ . '/../views/auth/login.php';
            }
        }
    }

    // Déconnexion
    public function logoutAction() {
        session_destroy(); // On détruit la session (efface $_SESSION['user'])
        header('Location: index.php?page=auth&action=login'); // Retour au login
        exit;
    }
}
?>