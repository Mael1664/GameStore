<?php require __DIR__ . '/../header.php'; ?>

<h2>✏️ Modifier le jeu : <?= htmlspecialchars($jeu->getTitre()) ?></h2>

<form method="post" action="index.php?page=jeux&action=edit&id=<?= $jeu->getId() ?>">
    
    <div class="mb-3">
        <label>Titre du jeu</label>
        <input type="text" name="titre" class="form-control" required 
               value="<?= htmlspecialchars($jeu->getTitre()) ?>">
    </div>

    <div class="mb-3">
        <label>Description</label>
        <textarea name="description" class="form-control" rows="4"><?= htmlspecialchars($jeu->getDescription()) ?></textarea>
    </div>

    <div class="mb-3">
        <label>Date de sortie</label>
        <input type="date" name="dateSortie" class="form-control" 
               value="<?= $jeu->getDateSortie() ?>">
    </div>
    
    <div class="mb-3">
        <label>Editeur</label>
        <select name="idEditeur" class="form-select">
            <?php foreach($editeurs as $e): ?>
                <option value="<?= $e['idEditeur'] ?>" 
                    <?= ($e['idEditeur'] == $jeu->getIdEditeur()) ? 'selected' : '' ?>>
                    <?= htmlspecialchars($e['nom']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="mb-3">
        <label>Classification PEGI</label>
        <select name="idPegi" class="form-select">
            <?php foreach($pegis as $p): ?>
                <option value="<?= $p['idPegi'] ?>"
                    <?= ($p['idPegi'] == $jeu->getIdPegi()) ? 'selected' : '' ?>>
                    PEGI <?= $p['ageMinimum'] ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <button type="submit" class="btn btn-warning">💾 Enregistrer les modifications</button>
    <a href="index.php?page=jeux&action=list" class="btn btn-secondary">Annuler</a>
</form>

<?php require __DIR__ . '/../footer.php'; ?>