<?php require __DIR__ . '/../header.php'; ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Catalogue des Jeux</h2>
    
    <?php if (isset($_SESSION['user'])): ?>
        <a href="index.php?page=jeux&action=add" class="btn btn-primary">➕ Nouveau Jeu</a>
    <?php endif; ?>
</div>

<div class="row">
    <?php if (empty($jeux)): ?>
        <div class="col-12">
            <div class="alert alert-info">Aucun jeu dans le catalogue pour le moment.</div>
        </div>
    <?php else: ?>
        
        <?php foreach($jeux as $j): ?>
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm">
                <img src="https://placehold.co/600x300?text=<?= urlencode($j->getTitre()) ?>" class="card-img-top" alt="Cover">
                
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <h5 class="card-title mb-0"><?= htmlspecialchars($j->getTitre()) ?></h5>
                        <span class="badge bg-warning text-dark">PEGI <?= $j->getAgePegi() ?></span>
                    </div>
                    
                    <div class="mb-2 text-muted small">
                        📅 Sortie : <?= $j->getDateSortie() ?><br>
                        🏢 Editeur : <strong><?= htmlspecialchars($j->getNomEditeur()) ?></strong><br>
                        💻 Dev : <?= htmlspecialchars($j->getNomDeveloppeur()) ?>
                    </div>
                    
                    <p class="card-text"><?= substr(htmlspecialchars($j->getDescription()), 0, 100) ?>...</p>
                </div>
                
                <div class="card-footer bg-white border-top-0 d-flex justify-content-between align-items-center">
                    <a href="#" class="btn btn-outline-info btn-sm">👁️ Voir détails</a>
                    
                    <?php if (isset($_SESSION['user'])): ?>
                        <div class="btn-group">
                            <a href="index.php?page=jeux&action=edit&id=<?= $j->getId() ?>" 
                               class="btn btn-outline-warning btn-sm" title="Modifier">
                               ✏️
                            </a>
                            <a href="index.php?page=jeux&action=delete&id=<?= $j->getId() ?>" 
                               class="btn btn-outline-danger btn-sm" 
                               onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce jeu ?')" title="Supprimer">
                               🗑️
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php endforeach; ?>

    <?php endif; ?>
</div>

<?php require __DIR__ . '/../footer.php'; ?>