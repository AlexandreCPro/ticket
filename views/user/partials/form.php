<?php
if (isset($user)) {
    $action      = '/user/update?id=' . $user['id'];
    $method      = 'PATCH';
    $buttonLabel = 'Mettre à jour';
    $nomVal      = htmlspecialchars($user['nom']);
    $profilActuel = (int)$user['profil_id'];
    $agenceActuelle = (int)($user['agence_id'] ?? 0);
} else {
    $action      = '/user/store';
    $method      = 'POST';
    $buttonLabel = 'Créer';
    $nomVal      = '';
    $profilActuel = 0;
    $agenceActuelle = 0;
}

// ID du profil administrateur dans la BDD
$PROFIL_ADMIN_ID = 1;
?>

<?php if (!empty($erreur)): ?>
    <div class="alert alert-danger"><?= htmlspecialchars($erreur) ?></div>
<?php endif; ?>

<form action="<?= $action ?>" method="POST">
    <?php if ($method === 'PATCH'): ?>
        <input type="hidden" name="_method" value="PATCH">
    <?php endif; ?>

    <div class="mb-3">
        <label for="nom" class="form-label">Nom d'utilisateur</label>
        <input type="text" class="form-control" id="nom" name="nom"
               value="<?= $nomVal ?>" required>
    </div>

    <div class="mb-3">
        <label for="pwd" class="form-label">
            Mot de passe
            <?php if (isset($user)): ?>
                <small class="text-muted">(laisser vide pour ne pas changer)</small>
            <?php endif; ?>
        </label>
        <div class="input-group">
            <input type="password" class="form-control" id="pwd" name="pwd"
                   <?= !isset($user) ? 'required' : '' ?>>
            <button class="btn btn-outline-secondary" type="button" id="togglePwd" title="Afficher / masquer">
                👁
            </button>
        </div>
    </div>

    <div class="mb-3">
        <label for="profil_id" class="form-label">Profil</label>
        <select name="profil_id" id="profil_id" class="form-select" required>
            <option value="">-- Choisir un profil --</option>
            <?php foreach ($profils as $profil): ?>
                <option value="<?= $profil['id'] ?>"
                    <?= $profilActuel === (int)$profil['id'] ? 'selected' : '' ?>>
                    <?= htmlspecialchars($profil['nomprofil']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="mb-3" id="agence-block" style="display: none;">
        <label for="agence_id" class="form-label">Agence</label>
        <select name="agence_id" id="agence_id" class="form-select">
            <option value="">-- Choisir une agence --</option>
            <?php foreach ($agences as $agence): ?>
                <option value="<?= $agence['id'] ?>"
                    <?= $agenceActuelle === (int)$agence['id'] ? 'selected' : '' ?>>
                    <?= htmlspecialchars($agence['nom_agence']) ?>
                    (<?= $agence['code_postal'] ?>)
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="d-flex justify-content-end gap-2">
        <a href="/user" class="btn btn-secondary">Annuler</a>
        <button type="submit" class="btn btn-primary"><?= $buttonLabel ?></button>
    </div>
</form>

<script>
const PROFIL_ADMIN_ID = <?= $PROFIL_ADMIN_ID ?>;
const agenceBlock     = document.getElementById('agence-block');
const agenceSelect    = document.getElementById('agence_id');
const profilSelect    = document.getElementById('profil_id');

function toggleAgence() {
    const isAdmin = parseInt(profilSelect.value) === PROFIL_ADMIN_ID;
    agenceBlock.style.display = isAdmin ? 'none' : 'block';
    agenceSelect.required     = !isAdmin;
}

toggleAgence();

profilSelect.addEventListener('change', toggleAgence);
</script>

<script>
document.getElementById('togglePwd').addEventListener('click', function () {
    const input = document.getElementById('pwd');
    const isHidden = input.type === 'password';
    input.type = isHidden ? 'text' : 'password';
    this.textContent = isHidden ? '🔓' : '👁';
});
</script>
