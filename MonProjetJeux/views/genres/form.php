<?php require './views/header.php'; ?>
<h2>Ajouter un Genre</h2>
<form method="post">
    <div class="mb-3">
        <label>Nom du genre</label>
        <input type="text" name="libelle" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Enregistrer</button>
</form>
<?php require './views/footer.php'; ?>