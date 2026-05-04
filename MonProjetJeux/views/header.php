<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameStore | Catalogue MVC</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; }
        .card { transition: transform 0.2s; }
        .card:hover { transform: translateY(-5px); }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4 shadow">
  <div class="container">
    <a class="navbar-brand fw-bold" href="index.php">GameStore</a>
    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav me-auto">
            <li class="nav-item">
                <a class="nav-link" href="index.php?page=genres&action=list">Liste des Genres</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?page=jeux&action=list">Catalogue Jeux</a>
            </li>
        </ul>
        
        <ul class="navbar-nav ms-auto">
            <?php if (isset($_SESSION['user'])): ?>
                <li class="nav-item d-flex align-items-center">
                    <span class="nav-link text-warning fw-bold">
                        👤 <?= htmlspecialchars($_SESSION['user']['prenom']) ?>
                    </span>
                </li>
                <li class="nav-item ms-2">
                    <a class="btn btn-outline-danger btn-sm" href="index.php?page=auth&action=logout">
                        Se déconnecter
                    </a>
                </li>
            <?php else: ?>
                <li class="nav-item">
                    <a class="btn btn-outline-light btn-sm" href="index.php?page=auth&action=login">
                        🔐 Espace Admin
                    </a>
                </li>
            <?php endif; ?>
        </ul>
    </div>
  </div>
</nav>

<div class="container content-body">