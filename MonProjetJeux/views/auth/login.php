<?php require __DIR__ . '/../header.php'; ?>

<div class="row justify-content-center mt-5">
    <div class="col-md-4">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h3 class="card-title mb-0">🔐 Connexion Admin</h3>
            </div>
            <div class="card-body">
                <?php if(isset($error)): ?>
                    <div class="alert alert-danger"><?= $error ?></div>
                <?php endif; ?>

                <form method="post" action="index.php?page=auth&action=check">
                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" required placeholder="admin@ecole.fr">
                    </div>
                    <div class="mb-3">
                        <label>Mot de passe</label>
                        <input type="password" name="password" class="form-control" required placeholder="admin123">
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Se connecter</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require __DIR__ . '/../footer.php'; ?>