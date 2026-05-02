<?php
$sessionUser    = Session::get('user');
$profilId       = (int)$sessionUser['profil_id'];
$idStatut       = (int)$ticket['idstatut'];
$STATUT_CLOS    = 3;
$STATUT_CLOTURE = 4;

$peutSupprimer = ($profilId === 1)
    || ($profilId === 2 && $idStatut === $STATUT_CLOTURE);

$peutCloturer = ($profilId === 3 && $idStatut === $STATUT_CLOS);

$peutEditer = ($profilId !== 3)
    || ($profilId === 3 && in_array($idStatut, [1, 2, $STATUT_CLOS]));
?>

<h1 class="pb-2"><?= htmlspecialchars($ticket['objet']) ?></h1>

<div class="d-flex align-items-center gap-3 mb-4">
    <span class="badge bg-secondary fs-6"><?= htmlspecialchars($ticket['nom_statut']) ?></span>

    <?php if (!empty($ticket['nom_categorie'])): ?>
        <span class="badge bg-info text-dark"><?= htmlspecialchars($ticket['nom_categorie']) ?></span>
    <?php endif; ?>

    <?php if ($profilId !== 3): ?>
        <?php if (!empty($ticket['tech_nom'])): ?>
            <span class="text-muted small">
                🔧 Pris en charge par <strong><?= htmlspecialchars($ticket['tech_nom']) ?></strong>
            </span>
        <?php else: ?>
            <span class="text-muted small">Aucun technicien assigné</span>
        <?php endif; ?>
    <?php endif; ?>
</div>

<p><?= nl2br(htmlspecialchars($ticket['contenu'])) ?></p>

<div class="btn-group mt-4 flex-wrap gap-1">
    <a href="/ticket" class="btn btn-secondary">← Retour</a>

    <?php if ($peutEditer): ?>
        <a href="/ticket/edit?id=<?= $ticket['id'] ?>" class="btn btn-warning">
            <?= $peutCloturer ? '✔ Clôturer' : 'Éditer' ?>
        </a>
    <?php endif; ?>

    <?php if ($peutSupprimer): ?>
        <form action="/ticket/destroy?id=<?= $ticket['id'] ?>" method="POST"
              onsubmit="return confirm('Supprimer ce ticket définitivement ?')">
            <input type="hidden" name="_method" value="DELETE">
            <button type="submit" class="btn btn-danger">Supprimer</button>
        </form>
    <?php endif; ?>

    <?php if ($profilId === 2 && $idStatut !== $STATUT_CLOTURE): ?>
        <span class="text-muted align-self-center ms-2 small">
            Suppression possible uniquement après clôture par l'utilisateur.
        </span>
    <?php endif; ?>
</div>
