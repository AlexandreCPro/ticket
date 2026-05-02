<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
<<<<<<< HEAD
  <title>Ticket AutoMoto</title>
=======
  <title>Ticket</title>
>>>>>>> f0abff02462bb8d21725cbc000d603610d061a6d
</head>

<body class="bg-body-tertiary">
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container-fluid">
<<<<<<< HEAD
      <a class="navbar-brand" href="/">AutoMoto</a>
=======
      <a class="navbar-brand" href="/">Ticket</a>
>>>>>>> f0abff02462bb8d21725cbc000d603610d061a6d

      <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarCollapse"
        aria-controls="navbarCollapse"
        aria-expanded="false"
        aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
<<<<<<< HEAD
          <?= menuOption(['/ticket'], 'Tickets') ?>
          <?= menuOption(['/categorie'], 'Catégories') ?>
          <?php if (Session::get('user') && (int)Session::get('user')['profil_id'] === 1): ?>
            <?= menuOption(['/user'], 'Utilisateurs') ?>
          <?php endif; ?>
=======
          <?= menuOption(['/ticket', '/', ''], 'Tickets') ?>
          <?= menuOption(['/categorie'], 'Catégories') ?>
>>>>>>> f0abff02462bb8d21725cbc000d603610d061a6d
        </ul>
        <ul class="navbar-nav ms-auto mb-2 mb-md-0">
          <?php if (Session::get('user')): ?>
            <li class="nav-item">
              <a class="nav-link" href="/logout">Se déconnecter</a>
            </li>
          <?php else: ?>
            <?= menuOption(['/login'], 'Se connecter') ?>
          <?php endif; ?>
        </ul>
      </div>
    </div>
  </nav>
  <main class="container mt-5 bg-white p-5 rounded">
<?= $_content ?>
  </main>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
