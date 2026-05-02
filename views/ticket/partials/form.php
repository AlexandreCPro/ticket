<?php
<<<<<<< HEAD
define('STATUT_NOUVEAU',  1);
define('STATUT_EN_COURS', 2);
define('STATUT_CLOS',     3);
define('STATUT_CLOTURE',  4);

if (isset($ticket)) {
    $action      = '/ticket/update?id=' . $ticket['id'];
    $method      = 'PATCH';
    $buttonLabel = 'Mettre à jour';
    $titre       = htmlspecialchars($ticket['objet']);
    $corps       = htmlspecialchars($ticket['contenu']);
    $idStatut    = (int)$ticket['idstatut'];
    $idCategActuelle = (int)($ticket['idcategorie'] ?? 0);
} else {
    $action      = '/ticket/store';
    $method      = 'POST';
    $buttonLabel = 'Créer le ticket';
    $titre       = '';
    $corps       = '';
    $idStatut    = 0;
    $idCategActuelle = 0;
}

$profilId       = (int)($profilId ?? 0);
$estAdmin       = $profilId === 1;
$estTechnicien  = $profilId === 2;
$estUtilisateur = $profilId === 3;
$readonlyChamps = $estTechnicien;
$categories     = $categories ?? [];
?>

<form action="<?= $action ?>" method="POST" class="form">
    <?= $method === 'PATCH' ? '<input name="_method" type="hidden" value="PATCH">' : '' ?>

    <div class="mb-3">
        <label for="objet" class="form-label">Objet :</label>
        <input name="objet" type="text" class="form-control" id="objet"
               value="<?= $titre ?>" <?= $readonlyChamps ? 'readonly' : '' ?> required>
=======
if (isset($ticket)) {
    // edit
    $action = '/ticket/update?id='.$ticket['id'];
    $method = 'PATCH';
    $buttonLabel = 'Mettre à jour';
    $titre = $ticket['objet'];
    $corps = $ticket['contenu'];
} else {
    // new
    $action = '/ticket/store';
    $method = 'POST';
    $buttonLabel = 'Ajouter';
    $titre = '';
    $corps = '';
}

?>
<form action="<?= $action ?>" method="POST" class="form">
    <?= $method == 'PATCH'
        ? '<input name="_method" type="hidden" value="PATCH">'
        : null; ?>
    <div class="mb-3">
        <label for="objet" class="form-label">Objet :</label>
        <input name="objet" type="text" class="form-control" id="objet" aria-describedby="objetHelp" value="<?= $titre ?>">
        <div id="objetHelp" class="form-text">Objet du ticket</div>
>>>>>>> f0abff02462bb8d21725cbc000d603610d061a6d
    </div>

    <div class="mb-3">
        <label for="contenu" class="form-label">Contenu :</label>
<<<<<<< HEAD
        <textarea name="contenu" class="form-control" id="contenu" rows="10"
                  <?= $readonlyChamps ? 'readonly' : '' ?>><?= $corps ?></textarea>
    </div>

    <?php if (($estUtilisateur || $estAdmin) && !empty($categories)): ?>
        <div class="mb-3">
            <label for="idcategorie" class="form-label">Catégorie :</label>
            <select name="idcategorie" id="idcategorie" class="form-select" <?= $readonlyChamps ? 'disabled' : '' ?>>
                <option value="">-- Choisir une catégorie --</option>
                <?php foreach ($categories as $cat): ?>
                    <option value="<?= $cat['id'] ?>"
                        <?= $idCategActuelle === (int)$cat['id'] ? 'selected' : '' ?>>
                        <?= htmlspecialchars($cat['nom_categorie']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <?php if (!empty($categories)): ?>
                <div class="form-text">
                    <a href="/categorie" target="_blank">Voir la description des catégories</a>
                </div>
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <?php if ($estAdmin || $estTechnicien): ?>
        <?php if (!empty($options)): ?>
            <div class="mb-3">
                <label for="statut" class="form-label">Statut :</label>
                <select name="idstatut" class="form-control" id="statut">
                    <?php foreach ($options as $option): ?>
                        <option value="<?= $option['id'] ?>"
                            <?= isset($ticket) && (int)$option['id'] === $idStatut ? 'selected' : '' ?>>
                            <?= htmlspecialchars($option['nom_statut']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <?php if ($estTechnicien): ?>
                    <div class="form-text text-muted">
                        Le statut "Cloturé" est réservé à l'utilisateur.
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>

    <?php elseif ($estUtilisateur && isset($ticket)): ?>
        <?php if ($idStatut === STATUT_CLOS): ?>
            <div class="alert alert-info">
                Le technicien a marqué ce ticket comme <strong>Clos</strong>.
                Cliquez sur "Clôturer définitivement" si votre problème est résolu.
            </div>
        <?php else: ?>
            <div class="mb-3">
                <label class="form-label">Statut :</label>
                <p class="form-control-plaintext fw-bold"><?= htmlspecialchars($ticket['nom_statut']) ?></p>
            </div>
        <?php endif; ?>
    <?php endif; ?>

    <div class="d-flex justify-content-end gap-2">
        <a href="/ticket" class="btn btn-secondary">Retour</a>
        <?php if ($estUtilisateur && isset($ticket) && $idStatut === STATUT_CLOS): ?>
            <button type="submit" class="btn btn-success">✔ Clôturer définitivement</button>
        <?php elseif (!($estUtilisateur && isset($ticket) && $idStatut === STATUT_CLOS)): ?>
            <button type="submit" class="btn btn-primary"><?= $buttonLabel ?></button>
        <?php endif; ?>
    </div>
</form>
=======
        <textarea name="contenu" class="form-control" id="contenu" aria-describedby="contenuHelp" rows="10"><?= $corps ?></textarea>
        <div id="contenuHelp" class="form-text">Contenu du ticket</div>
    </div>

    <div class="mb-3">
        <label for="statut" class="form-label">Statut :</label>
        <select name="idstatut" class="form-control" id="statut">
            <?php foreach ($options as $option) : ?>
                <option value="<?= $option['id'] ?>" <?= isset($ticket) && $option['id'] == $ticket['idstatut'] ? 'selected' : null ?>>
                    <?= $option['nom_statut'] ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="d-flex justify-content-end">
        <button type="submit" class="btn btn-primary"><?= $buttonLabel ?></button>
    </div>
</form>
>>>>>>> f0abff02462bb8d21725cbc000d603610d061a6d
