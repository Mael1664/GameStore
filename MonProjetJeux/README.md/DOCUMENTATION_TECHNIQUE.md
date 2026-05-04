# GameStore - Documentation Technique

## 1. Présentation du Projet
GameStore est une application web de type **CRUD** (Create, Read, Update, Delete) permettant la gestion d'une base de données de jeux vidéo.
Le projet respecte strictement le pattern architectural **MVC (Modèle - Vue - Contrôleur)** et la Programmation Orientée Objet (POO).

* **Langage :** PHP 8
* **Base de données :** MySQL / MariaDB
* **Front-end :** HTML5, Bootstrap 5
* **Serveur :** Apache (XAMPP/WAMP/Laragon)

## 2. Installation et Déploiement

### Prérequis
* Un serveur local type XAMPP ou WAMP.
* PHP 7.4 ou supérieur.

### Configuration de la Base de Données
1. Ouvrez **phpMyAdmin**.
2. Créez une base de données nommée `gamestore` (ou importez le fichier SQL fourni).
3. Importez le script SQL `install_db.sql` (contenant les tables JEU, EDITEUR, GENRE, UTILISATEUR...).
4. **Configuration :** Vérifiez le fichier `config/Database.php`.
   * Par défaut : Host `localhost`, User `root`, Password `(vide)`.

### Structure des dossiers
Le projet suit une arborescence MVC standard :
* `/config` : Contient `Database.php` (Singleton de connexion PDO).
* `/controllers` : Logique de l'application (ex: `JeuxController.php`).
* `/models` :
    * *Entities* : `Jeu.class.php` (Objets simples).
    * *Managers* : `JeuManager.class.php` (Requêtes SQL).
* `/views` : Fichiers d'affichage HTML (organisés par dossiers `jeux`, `genres`, `auth`).
* `index.php` : **Routeur principal**. Point d'entrée unique de l'application.

## 3. Fonctionnement Technique

### Le Routeur (`index.php`)
L'application n'utilise qu'un seul point d'entrée. Les URLs sont structurées ainsi :
`index.php?page={Controlleur}&action={Methode}&id={Param}`

Exemple : `index.php?page=jeux&action=edit&id=4`
1. Le switch charge `JeuxController`.
2. Il exécute la méthode `editAction()`.
3. Il utilise l'ID `4` pour hydrater l'objet.

### La Sécurité (Auth)
* L'authentification est gérée par `AuthController.php`.
* Les mots de passe sont vérifiés via `UtilisateurManager`.
* Les sessions PHP (`session_start()`) sont utilisées pour persister la connexion.
* Les vues (`views/header.php`, `liste.php`) vérifient `isset($_SESSION['user'])` pour afficher ou masquer les boutons d'administration.

## 4. Évolutions possibles
* Ajout d'un système d'upload pour les images des jeux.
* Hachage des mots de passe avec `password_hash()` (actuellement en clair pour le prototype).

---
**Auteur :** Moreau Mael
**Date :** Décembre 2025
**Projet :** BTS SIO / Titre Pro - Développement Web


raccourci CTRL + SHIFT + V.