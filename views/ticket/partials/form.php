<?php
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
    </div>

    <div class="mb-3">
        <label for="contenu" class="form-label">Contenu :</label>
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