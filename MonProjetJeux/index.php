<?php
session_start();
// Démarrage de la session (OBLIGATOIRE pour la connexion)


// Inclusion de la connexion BDD
require_once './config/Database.php';

// -------------------------------------------------------------------
// 2. ROUTEUR (Analyse de l'URL)
// -------------------------------------------------------------------

// Récupération des paramètres (ex: index.php?page=jeux&action=edit&id=1)
$page = $_GET['page'] ?? 'home';     // Page par défaut
$action = $_GET['action'] ?? 'list'; // Action par défaut
$id = $_GET['id'] ?? null;           // ID optionnel

// -------------------------------------------------------------------
// 3. CHARGEMENT DES CONTROLEURS
// -------------------------------------------------------------------

// On vérifie l'existence des fichiers avant de les inclure pour éviter les crashs
if (file_exists('./controllers/GenresController.php')) require_once './controllers/GenresController.php';
if (file_exists('./controllers/JeuxController.php'))   require_once './controllers/JeuxController.php';
if (file_exists('./controllers/AuthController.php'))   require_once './controllers/AuthController.php';


// -------------------------------------------------------------------
// 4. AIGUILLAGE (Switch)
// -------------------------------------------------------------------

switch ($page) {
    
    // --- MODULE : GESTION DES GENRES ---
    case 'genres':
        $controller = new GenresController();
        if ($action == 'list')     $controller->listAction();
        elseif ($action == 'add')  $controller->addAction();
        elseif ($action == 'delete') $controller->deleteAction($id);
        break;

    // --- MODULE : GESTION DES JEUX ---
    case 'jeux':
        $controller = new JeuxController();
        if ($action == 'list')      $controller->listAction();
        elseif ($action == 'add')   $controller->addAction();
        elseif ($action == 'delete')$controller->deleteAction($id);
        elseif ($action == 'edit')  $controller->editAction(); // Important pour la modif
        break;

    // --- MODULE : AUTHENTIFICATION (Connexion) ---
    case 'auth':
        $controller = new AuthController();
        if ($action == 'login')     $controller->loginAction();      // Affiche le formulaire
        elseif ($action == 'check') $controller->checkLoginAction(); // Vérifie le mot de passe
        elseif ($action == 'logout')$controller->logoutAction();     // Déconnecte
        break;

    // --- PAGE D'ACCUEIL ---
    case 'home':
    default:
        // On affiche l'accueil
        require './views/header.php';
        ?>
        <div class="p-5 mb-4 bg-light rounded-3 text-center shadow-sm">
            <div class="container-fluid py-5">
                <h1 class="display-5 fw-bold">Bienvenue sur GameStore </h1>
                <p class="col-md-8 fs-4 mx-auto">
                    Découvrez notre catalogue complet de jeux vidéo, classés par genre, 
                    éditeur et plateforme. Projet réalisé en architecture MVC Objet.
                </p>
                <div class="mt-4">
                    <a href="index.php?page=jeux&action=list" class="btn btn-primary btn-lg px-4 gap-3">Voir les Jeux</a>
                    <a href="index.php?page=genres&action=list" class="btn btn-outline-secondary btn-lg px-4">Gérer les Genres</a>
                </div>
            </div>
        </div>
        <?php
        require './views/footer.php';
        break;
}
?>