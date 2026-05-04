<?php
require_once __DIR__ . '/../config/Database.php';

class UtilisateurManager {
    private PDO $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    public function verifLogin($email, $password) {
        // 1. On cherche l'utilisateur par son email
        $sql = "SELECT * FROM UTILISATEUR WHERE email = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        // 2. Si l'utilisateur existe
        if ($user) {
            // NOTE : Dans un vrai projet pro, on utiliserait password_verify().
            // Pour ce projet scolaire avec nos données de test en clair, on compare directement.
            if ($password === $user['motDePasse']) {
                return $user; // Succès : on retourne les infos de l'user
            }
        }
        return false; // Echec
    }
}
?>