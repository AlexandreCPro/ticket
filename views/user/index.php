<h1 class="pb-4">Gestion des utilisateurs</h1>

<div class="d-flex justify-content-end mb-3">
    <a href="/user/new" class="btn btn-primary">Créer un utilisateur</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Id</th>
            <th>Nom</th>
            <th>Profil</th>
            <th>Agence</th>
            <th>&nbsp;</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $u): ?>
            <tr>
                <td><?= $u['id'] ?></td>
                <td><?= htmlspecialchars($u['nom']) ?></td>
                <td><?= htmlspecialchars($u['nomprofil'] ?? '-') ?></td>
                <td><?= htmlspecialchars($u['nom_agence'] ?? '—') ?></td>
                <td class="d-flex gap-2">
                    <a class="btn btn-light btn-sm" href="/user/edit?id=<?= $u['id'] ?>">Modifier</a>
                    <?php if ((int)$u['id'] !== (int)Session::get('user')['id']): ?>
                        <form method="POST" action="/user/destroy?id=<?= $u['id'] ?>" onsubmit="return confirm('Supprimer cet utilisateur ?')">
                            <input type="hidden" name="_method" value="DELETE">
                            <button class="btn btn-danger btn-sm" type="submit">Supprimer</button>
                        </form>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
