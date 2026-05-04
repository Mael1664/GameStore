<?php require './views/header.php'; ?>
<h2>Gestion des Genres</h2>
<a href="index.php?page=genres&action=add" class="btn btn-success mb-3">Ajouter un genre</a>
<table class="table table-striped">
    <thead><tr><th>ID</th><th>Nom</th><th>Actions</th></tr></thead>
    <tbody>
        <?php foreach($genres as $g): ?>
        <tr>
            <td><?= $g->getIdGenre() ?></td>
            <td><?= htmlspecialchars($g->getLibelle()) ?></td>
            <td>
                <a href="index.php?page=genres&action=delete&id=<?= $g->getIdGenre() ?>" 
                   class="btn btn-danger btn-sm" onclick="return confirm('Supprimer ?')">X</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php require './views/footer.php'; ?>