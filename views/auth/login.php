<h2>Connexion</h2>

<?php if (!empty($erreur)): ?>
  <div class="alert alert-danger"><?= htmlspecialchars($erreur) ?></div>
<?php endif; ?>

<form method="POST" action="/login" class="mt-4" style="max-width: 400px;">
  <div class="mb-3">
    <label for="nom" class="form-label">Nom d'utilisateur</label>
    <input type="text" class="form-control" id="nom" name="nom" required autofocus>
  </div>
  <div class="mb-3">
    <label for="pwd" class="form-label">Mot de passe</label>
    <input type="password" class="form-control" id="pwd" name="pwd" required>
  </div>
  <button type="submit" class="btn btn-primary">Se connecter</button>
</form>
