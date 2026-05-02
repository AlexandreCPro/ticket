<<<<<<< HEAD
<h1 class="pb-5">Les tickets</h1>

<div class="d-flex justify-content-end">
    <?php if ($profilId === 3): ?>
        <a href="/ticket/new" class="btn btn-primary">Créer un ticket</a>
    <?php endif; ?>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <?php if ($profilId !== 3): ?><th>Id</th><?php endif; ?>
            <th>Objet</th>
            <th>Catégorie</th>
            <th>Statut</th>
            <?php if ($profilId !== 3): ?><th>Technicien</th><?php endif; ?>
            <th>&nbsp;</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($retourSQL as $ticket): ?>
            <tr>
                <?php if ($profilId !== 3): ?><td><?= $ticket['id'] ?></td><?php endif; ?>
                <td><?= htmlspecialchars($ticket['objet']) ?></td>
                <td>
                    <?php if (!empty($ticket['nom_categorie'])): ?>
                        <span class="badge bg-info text-dark"><?= htmlspecialchars($ticket['nom_categorie']) ?></span>
                    <?php else: ?>
                        <span class="text-muted">—</span>
                    <?php endif; ?>
                </td>
                <td><?= htmlspecialchars($ticket['nom_statut']) ?></td>
                <?php if ($profilId !== 3): ?>
                    <td>
                        <?php if (!empty($ticket['tech_nom'])): ?>
                            <span class="badge bg-primary"><?= htmlspecialchars($ticket['tech_nom']) ?></span>
                        <?php else: ?>
                            <span class="text-muted">—</span>
                        <?php endif; ?>
                    </td>
                <?php endif; ?>
                <td>
                    <a class="btn btn-light btn-sm" href="/ticket/show?id=<?= $ticket['id'] ?>">Aller au ticket</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
=======
    <?php

$clef = 0;
?><h1 class="pb-5">Les tickets</h1>

    <div class="d-flex justify-content-end">
        <a href="/ticket/new" class="btn btn-primary">Créer un ticket</a>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Id</th>
                <th>Objet</th>
                <th>Contenu</th>
                <th>Statut</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($retourSQL as $ticket) { ?>
                <tr>
                    <td><?= $ticket['id']; ?></td>
                    <td><?= $ticket['objet']; ?></td>
                    <td><?= substr($ticket['contenu'], 0, 49); ?></td>
                    <td><?= $ticket['nom_statut']; ?></td>
                    <td>
                        <a class="btn btn-light btn-sm" href="/ticket/show?id=<?= $ticket['id'] ?>">Aller au ticket</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
>>>>>>> f0abff02462bb8d21725cbc000d603610d061a6d
