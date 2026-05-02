<?php
if (isset($categorie)) {
    $action      = '/categorie/update?id=' . $categorie['id'];
    $method      = 'PATCH';
    $buttonLabel = 'Mettre à jour';
    $nomVal      = htmlspecialchars($categorie['nom_categorie']);
    $descVal     = htmlspecialchars($categorie['description'] ?? '');
} else {
    $action      = '/categorie/store';
    $method      = 'POST';
    $buttonLabel = 'Créer';
    $nomVal      = '';
    $descVal     = '';
}
?>

<?php if (!empty($erreur)): ?>
    <div class="alert alert-danger"><?= htmlspecialchars($erreur) ?></div>
<?php endif; ?>

<form action="<?= $action ?>" method="POST">
    <?php if ($method === 'PATCH'): ?>
        <input type="hidden" name="_method" value="PATCH">
    <?php endif; ?>

    <div class="mb-3">
        <label for="nom_categorie" class="form-label">Nom de la catégorie</label>
        <input type="text" class="form-control" id="nom_categorie" name="nom_categorie"
               value="<?= $nomVal ?>" required>
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control" id="description" name="description"
                  rows="3" placeholder="Décrivez brièvement cette catégorie..."><?= $descVal ?></textarea>
    </div>

    <div class="d-flex justify-content-end gap-2">
        <a href="/categorie" class="btn btn-secondary">Annuler</a>
        <button type="submit" class="btn btn-primary"><?= $buttonLabel ?></button>
    </div>
</form>
