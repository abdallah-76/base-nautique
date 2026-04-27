<div class="hero-slide owl-carousel site-blocks-cover">
  <div class="intro-section" style="background-image: url('<?= base_url('bootstrap/images/hero_2.jpg'); ?>');">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-7 ml-auto text-right" data-aos="fade-up">
          <h1>Explore, Discover The Ocean</h1>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat, in distinctio nostrum laborum sed quisquam voluptate facilis non.</p>
          <p><a href="#" class="btn btn-primary py-3 px-5">Read More</a></p>
        </div>
      </div>
    </div>
  </div>

  <div class="intro-section" style="background-image: url('<?= base_url('bootstrap/images/hero_2.jpg.png'); ?>');">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-7 mx-auto text-center" data-aos="fade-up">
          <h1>Enjoy The Ocean With Your Family</h1>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat, in distinctio nostrum laborum sed quisquam voluptate facilis non.</p>
          <p><a href="#" class="btn btn-primary py-3 px-5">Read More</a></p>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- END slider -->

<div class="site-section">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <img src="<?= base_url('bootstrap/images/hero_2.jpg'); ?>" alt="Image" class="img-fluid">
      </div>
      <div class="col-md-6">
        <span class="text-serif text-primary">À Propos de Notre Base Nautique : L'Aventure est à Vous !</span>
        <h3 class="heading-92913 text-black">Bienvenue à BlueWave : Votre Portail vers l'Évasion en Mer</h3>
        <p>Chez BlueWave, nous croyons que la mer est un terrain de jeu illimité. Notre mission est simple :</p>
        <p>vous offrir une évasion totale, des sensations fortes inoubliables et des moments de pure liberté face à l'horizon. Laissez le quotidien derrière vous, le large vous appelle.</p>
      </div>
    </div>
  </div>
</div>

<div class="py-5">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-lg-4">
        <div class="service-29283">
          <span class="wrap-icon-39293">
            <span class="flaticon-yacht"></span>
          </span>
          <h3>Une Flotte d'Activités pour Tous les Goûts !</h3>
          <p>Des vagues du Jet Ski au frisson du Flyfish, nous avons l'équipement qu'il vous faut...</p>
        </div>
      </div>

      <div class="col-md-6 col-lg-4">
        <div class="service-29283">
          <span class="wrap-icon-39293">
            <span class="flaticon-shield"></span>
          </span>
          <h3>Expertise Certifiée et Sécurité Maximale</h3>
          <p>Bien au-delà du simple loisir, la sécurité est notre priorité absolue...</p>
        </div>
      </div>

      <div class="col-md-6 col-lg-4">
        <div class="service-29283">
          <span class="wrap-icon-39293">
            <span class="flaticon-captain"></span>
          </span>
          <h3>Notre Équipe : Votre Guide vers l'Aventure</h3>
          <p>Nos "Capitaines" sont plus que de simples professionnels...</p>
        </div>
      </div>
    </div>
  </div>
<div class="container mt-5">
  <h2 class="text-center mb-4">Liste des actualités</h2>



  <?php if (! empty($actualites) && is_array($actualites)) : ?>
    <table class="table table-bordered table-hover">
      <thead class="table-primary">
        <tr>
          <th>Titre</th>
          <th>Contenu</th>
          <th>Date publication</th>
          <th>Auteur</th>

        </tr>
      </thead>
      <tbody>
        <?php foreach ($actualites as $act) : ?>
          <tr>
            <td><?php echo $act['act_titre']; ?></td>
            <td><?php echo $act['act_contenu']; ?></td>
            <td><?php echo $act['act_date_pub']; ?></td>
            <td><?php echo $act['cpt_pseudo']; ?></td>

          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  <?php else : ?>
    <div class="alert alert-warning text-center">
      Aucune actualité trouvée.
    </div>
  <?php endif; ?>
</div>




<!-- 🌊 SECTION - NOS SERVICES -->
<div class="site-section bg-light py-5">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="fw-bold text-primary mb-3">Nos Services</h2>
      <p class="text-muted">Découvrez nos activités nautiques — sensations, détente et plaisir garantis !</p>
    </div>

    <div class="row g-4">
      <!-- 💦 Jet Ski -->
      <div class="col-md-6 col-lg-4">
        <div class="card border-0 shadow-lg h-100 hover-shadow transition">
          <img src="<?= base_url('bootstrap/images/télécharger.jpeg'); ?>" class="card-img-top rounded-top" alt="Jet Ski">
          <div class="card-body text-center">
            <h5 class="card-title fw-bold text-primary">Jet Ski</h5>
            <p class="card-text text-muted small">Vivez la vitesse pure ! Prenez les commandes, fendez les vagues et sentez l'adrénaline monter.</p>
          </div>
          <div class="card-footer bg-white text-center border-0 pb-4">
            <span class="badge bg-warning text-dark fs-6 px-3 py-2 shadow-sm">60 €</span>
          </div>
        </div>
      </div>

      <!-- 🏴‍☠️ Balade Bateau Pirate -->
      <div class="col-md-6 col-lg-4">
        <div class="card border-0 shadow-lg h-100 hover-shadow transition">
          <img src="<?= base_url('bootstrap/images/hero_2.jpg.png'); ?>" class="card-img-top rounded-top" alt="Bateau Pirate">
          <div class="card-body text-center">
            <h5 class="card-title fw-bold text-primary">Balade Bateau Pirate</h5>
            <p class="card-text text-muted small">Embarquez pour une aventure thématique en mer ! Une expérience inoubliable pour toute la famille.</p>
          </div>
          <div class="card-footer bg-white text-center border-0 pb-4">
            <span class="badge bg-warning text-dark fs-6 px-3 py-2 shadow-sm">70 €</span>
          </div>
        </div>
      </div>

      <!-- 🪂 Parachute -->
      <div class="col-md-6 col-lg-4">
        <div class="card border-0 shadow-lg h-100 hover-shadow transition">
          <img src="<?= base_url('bootstrap/images/Parasailing.jpeg'); ?>" class="card-img-top rounded-top" alt="Parachute">
          <div class="card-body text-center">
            <h5 class="card-title fw-bold text-primary">Parachute Ascensionnel</h5>
            <p class="card-text text-muted small">Prenez de la hauteur et découvrez une vue époustouflante sur la côte et la mer.</p>
          </div>
          <div class="card-footer bg-white text-center border-0 pb-4">
            <span class="badge bg-warning text-dark fs-6 px-3 py-2 shadow-sm">50 €</span>
          </div>
        </div>
      </div>

      <!-- 🪁 FlyFish -->
      <div class="col-md-6 col-lg-4">
        <div class="card border-0 shadow-lg h-100 hover-shadow transition">
          <img src="<?= base_url('bootstrap/images/flyfish.jpeg'); ?>" class="card-img-top rounded-top" alt="FlyFish">
          <div class="card-body text-center">
            <h5 class="card-title fw-bold text-primary">FlyFish</h5>
            <p class="card-text text-muted small">Accrochez-vous et envolez-vous au-dessus de l’eau ! Sensations fortes garanties.</p>
          </div>
          <div class="card-footer bg-white text-center border-0 pb-4">
            <span class="badge bg-warning text-dark fs-6 px-3 py-2 shadow-sm">40 €</span>
          </div>
        </div>
      </div>

      <!-- 🛶 Kayak -->
      <div class="col-md-6 col-lg-4">
        <div class="card border-0 shadow-lg h-100 hover-shadow transition">
          <img src="<?= base_url('bootstrap/images/kayak1.jpg'); ?>" class="card-img-top rounded-top" alt="Kayak">
          <div class="card-body text-center">
            <h5 class="card-title fw-bold text-primary">Kayak</h5>
            <p class="card-text text-muted small">Glissez silencieusement sur l’eau et explorez les criques cachées à votre rythme.</p>
          </div>
          <div class="card-footer bg-white text-center border-0 pb-4">
            <span class="badge bg-warning text-dark fs-6 px-3 py-2 shadow-sm">30 €</span>
          </div>
        </div>
      </div>

      <!-- ⛵ Sortie Bateau -->
      <div class="col-md-6 col-lg-4">
        <div class="card border-0 shadow-lg h-100 hover-shadow transition">
          <img src="<?= base_url('bootstrap/images/hero_2.jpg'); ?>" class="card-img-top rounded-top" alt="Sortie Bateau">
          <div class="card-body text-center">
            <h5 class="card-title fw-bold text-primary">Sortie en Bateau</h5>
            <p class="card-text text-muted small">Profitez d’une croisière détente ou sportive sous le soleil et le grand large.</p>
          </div>
          <div class="card-footer bg-white text-center border-0 pb-4">
            <span class="badge bg-warning text-dark fs-6 px-3 py-2 shadow-sm">120 €</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Petits effets CSS -->
<style>
  .card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    border-radius: 15px;
  }
  .card:hover {
    transform: translateY(-8px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.15);
  }
  .card-img-top {
    height: 220px;
    object-fit: cover;
    border-top-left-radius: 15px;
    border-top-right-radius: 15px;
  }
</style>