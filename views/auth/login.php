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
<<<<<<< HEAD
    <div class="input-group">
      <input type="password" class="form-control" id="pwd" name="pwd" required>
      <button class="btn btn-outline-secondary" type="button" id="togglePwd" title="Afficher / masquer">
        👁
      </button>
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Se connecter</button>
</form>

<script>
document.getElementById('togglePwd').addEventListener('click', function () {
    const input = document.getElementById('pwd');
    const isHidden = input.type === 'password';
    input.type = isHidden ? 'text' : 'password';
    this.textContent = isHidden ? '🔓' : '👁';
});
</script>
=======
    <input type="password" class="form-control" id="pwd" name="pwd" required>
  </div>
  <button type="submit" class="btn btn-primary">Se connecter</button>
</form>
>>>>>>> f0abff02462bb8d21725cbc000d603610d061a6d
