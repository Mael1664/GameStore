<?php

class Jeu {
    // Propriétés privées (Encapsulation) : On ne peut pas les modifier directement de l'extérieur
    private ?int $idJeu;
    private string $titre;
    private ?string $description;
    private ?string $dateSortie;
    
    // Clés étrangères (IDs)
    private ?int $idEditeur;
    private ?int $idPegi;

    // Données d'affichage (Issues des jointures)
    private ?string $nomEditeur;
    private ?string $nomDeveloppeur;
    private ?int $agePegi;

    // Le Constructeur : Appelé automatiquement quand on fait "new Jeu()"
    // Il reçoit un tableau de données (souvent une ligne de la BDD)
    public function __construct(array $data) {
        // Hydratation : On remplit les propriétés avec les données
        // L'opérateur ?? signifie "si n'existe pas, mettre null"
        $this->idJeu = $data['idJeu'] ?? null;
        $this->titre = $data['titre'] ?? '';
        $this->description = $data['description'] ?? '';
        $this->dateSortie = $data['dateSortie'] ?? null;
        
        // On récupère les IDs (important pour les formulaires de modif)
        $this->idEditeur = $data['idEditeur'] ?? null;
        $this->idPegi = $data['idPegi'] ?? null;

        // On récupère les noms (important pour l'affichage liste)
        $this->nomEditeur = $data['nomEditeur'] ?? 'Inconnu';
        $this->nomDeveloppeur = $data['nomDeveloppeur'] ?? 'Inconnu';
        $this->agePegi = $data['ageMinimum'] ?? 0;
    }

    // --- GETTERS (Accesseurs) ---
    // Permettent de lire les valeurs privées depuis l'extérieur
    
    public function getId() { return $this->idJeu; }
    public function getTitre() { return $this->titre; }
    public function getDescription() { return $this->description; }
    public function getDateSortie() { return $this->dateSortie; }
    
    // Getters pour les IDs (utiles pour le contrôleur)
    public function getIdEditeur() { return $this->idEditeur; }
    public function getIdPegi() { return $this->idPegi; }

    // Getters pour l'affichage propre
    public function getNomEditeur() { return $this->nomEditeur; }
    public function getNomDeveloppeur() { return $this->nomDeveloppeur; }
    public function getAgePegi() { return $this->agePegi; }
}
?>