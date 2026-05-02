<h1 class="pb-5"><?= $ticket['objet'] ?></h1>

<p><?= $ticket['contenu'] ?></p>

<div class="btn-group mt-4">
    <a href="/ticket" class="btn btn-secondary">Lister les tickets</a>
    <a href="/ticket/edit?id=<?= $ticket['id'] ?>" class="btn btn-warning">Éditer le ticket</a>
    <form action="/ticket/destroy?id=<?= $ticket['id'] ?>" method="POST" onsubmit="return confirm('Voulez-vous vraiement supprimer ce ticket ?')">
        <input type="hidden" name="_method" value="DELETE">
        <button type="submit" class="btn btn-danger">Supprimer le ticket</button>
    </form>
</div>