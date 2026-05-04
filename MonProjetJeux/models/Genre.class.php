<?php
// Fichier : /models/Genre.class.php

class Genre {
    // Propriétés privées (encapsulation)
    private ?int $idGenre;
    private string $libelle;

    /**
     * Constructeur : Initialise l'objet avec un tableau de données
     * (fonctionne avec les données venant de la BDD ou d'un formulaire $_POST)
     */
    public function __construct(array $data ){
        // L'opérateur ?? (null coalescing) évite les erreurs si la clé n'existe pas
        $this->idGenre = $data['idGenre'] ?? null;
        $this->libelle = $data['libelle'] ?? '';
}

    // --- GETTERS (Accesseurs) ---

    public function getIdGenre(): ?int {
        return $this->idGenre;
    }

    public function getLibelle(): string {
        return $this->libelle;
    }

    // --- SETTERS (Mutateurs) ---

    public function setIdGenre(int $id): void {
        $this->idGenre = $id;
    }

    public function setLibelle(string $libelle): void {
        $this->libelle = trim($libelle);
    }
}
?>