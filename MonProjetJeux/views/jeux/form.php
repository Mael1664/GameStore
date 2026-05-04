<?php require __DIR__ . '/../header.php'; ?>

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h3 class="mb-0">➕ Ajouter un nouveau jeu</h3>
            </div>
            <div class="card-body">
                
                <form method="post" action="index.php?page=jeux&action=add">
                    
                    <div class="mb-3">
                        <label class="form-label">Titre du jeu *</label>
                        <input type="text" name="titre" class="form-control" required placeholder="Ex: Super Mario Odyssey">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-control" rows="3" placeholder="Résumé du jeu..."></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Date de sortie</label>
                        <input type="date" name="dateSortie" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Editeur *</label>
                        <select name="idEditeur" class="form-select" required>
                            <option value="">-- Choisir un éditeur --</option>
                            <?php foreach($editeurs as $e): ?>
                                <option value="<?= $e['idEditeur'] ?>"><?= htmlspecialchars($e['nom']) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Classification PEGI *</label>
                        <select name="idPegi" class="form-select" required>
                            <option value="">-- Choisir un âge --</option>
                            <?php foreach($pegis as $p): ?>
                                <option value="<?= $p['idPegi'] ?>">PEGI <?= $p['ageMinimum'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-success btn-lg">Enregistrer le jeu</button>
                        <a href="index.php?page=jeux&action=list" class="btn btn-secondary">Annuler</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require __DIR__ . '/../footer.php'; ?>