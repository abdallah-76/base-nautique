<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
  <div class="container">
    <a class="navbar-brand fw-bold text-uppercase" href="<?= base_url('/') ?>">Accueil</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link" href="<?= site_url('visiteur/creer') ?>"> Envoyer une demande</a></li>
       <li class="nav-item">  <a class="nav-link" href="<?= site_url('message/verifier') ?>">Suivre ma demande</a></li>
       <li class="nav-item"><a class="nav-link" href="<?= site_url('compte/connecter') ?>">se connecter</a></li>


      </ul>
    </div>
  </div>
</nav>

<!-- Marge pour éviter que le menu cache le contenu -->
<style>
  body {
    padding-top: 70px; /* décale le contenu sous la barre */
  }
</style>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
