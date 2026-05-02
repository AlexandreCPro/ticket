<div class="text-center py-5">

  <h1 class="display-5 fw-bold mb-2">Bienvenue sur AutoMoto Support</h1>
  <p class="lead text-muted mb-5">
    Le portail de tickets d'assistance des agences <strong>AutoMoto</strong>.
  </p>

  <div class="row justify-content-center g-4 mb-5">

    <div class="col-md-4">
      <div class="card border-0 shadow-sm h-100">
        <div class="card-body p-4">
          <div class="fs-1 mb-3">🖥️</div>
          <h5 class="card-title">Un problème technique ?</h5>
          <p class="card-text text-muted">
            Matériel en panne, logiciel défaillant, accès bloqué…
            Signalez-le en quelques clics.
          </p>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card border-0 shadow-sm h-100">
        <div class="card-body p-4">
          <div class="fs-1 mb-3">🔧</div>
          <h5 class="card-title">Besoin d'aide ?</h5>
          <p class="card-text text-muted">
            Nos techniciens prennent en charge votre demande
            et vous tiennent informé de son avancement.
          </p>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card border-0 shadow-sm h-100">
        <div class="card-body p-4">
          <div class="fs-1 mb-3">📍</div>
          <h5 class="card-title">Multisite</h5>
          <p class="card-text text-muted">
            Présent sur les agences de <strong>Brive-la-Gaillarde</strong> et
            <strong>Limoges</strong>. Chaque équipe gère ses propres tickets.
          </p>
        </div>
      </div>
    </div>

  </div>

  <?php if ($sessionUser): ?>
    <a href="/ticket" class="btn btn-primary btn-lg px-5">
      Mon espace tickets →
    </a>
  <?php else: ?>
    <a href="/login" class="btn btn-primary btn-lg px-5">
      Se connecter
    </a>
  <?php endif; ?>

</div>
