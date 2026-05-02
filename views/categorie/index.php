<div class="d-flex justify-content-between align-items-center pb-4">
    <h1 class="mb-0">Catégories</h1>
    <?php if ($profilId === 1): ?>
        <a href="/categorie/new" class="btn btn-primary">Ajouter une catégorie</a>
    <?php endif; ?>
</div>

<?php if (empty($categories)): ?>
    <p class="text-muted">Aucune catégorie pour le moment.</p>
<?php else: ?>
    <div class="row g-3">
        <?php foreach ($categories as $cat): ?>
            <div class="col-md-6">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title"><?= htmlspecialchars($cat['nom_categorie']) ?></h5>
                        <p class="card-text text-muted">
                            <?= !empty($cat['description'])
                                ? htmlspecialchars($cat['description'])
                                : '<em>Pas de description.</em>' ?>
                        </p>
                    </div>
                    <?php if ($profilId === 1): ?>
                        <div class="card-footer d-flex gap-2 justify-content-end">
                            <a href="/categorie/edit?id=<?= $cat['id'] ?>" class="btn btn-warning btn-sm">Modifier</a>
                            <form method="POST" action="/categorie/destroy?id=<?= $cat['id'] ?>"
                                  onsubmit="return confirm('Supprimer cette catégorie ?')">
                                <input type="hidden" name="_method" value="DELETE">
                                <button class="btn btn-danger btn-sm" type="submit">Supprimer</button>
                            </form>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
