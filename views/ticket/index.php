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
