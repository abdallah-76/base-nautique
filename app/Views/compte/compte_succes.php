<style>
  /* 🌄 Arrière-plan pleine page avec ton image */
  html, body {
    height: 100%;
    margin: 0;
    padding: 0;
  }

  body {
    background: url('<?= base_url('bootstrap/images/kayak1.jpg'); ?>') no-repeat center center fixed;
    background-size: cover;
    display: flex;
    justify-content: center;
    align-items: center;
  }

  /* 🧊 Bloc principal effet “verre flou” */
  .backdrop {
    backdrop-filter: blur(8px);
    background-color: rgba(255, 255, 255, 0.9);
    border-radius: 20px;
    padding: 3rem;
    width: 90%;
    max-width: 600px;
    text-align: center;
    box-shadow: 0 0 30px rgba(0, 0, 0, 0.25);
    animation: fadeIn 1s ease-in-out;
  }

  /* 🎉 Titre de succès */
  h2 {
    color: #28a745;
    font-weight: 700;
    margin-bottom: 1rem;
  }

  /* ✨ Texte */
  p {
    color: #333;
    font-size: 1.1rem;
  }

  strong {
    color: #007bff;
    font-size: 1.2rem;
  }

  /* 💬 Bloc d’informations */
  .message-box {
    margin-top: 1.5rem;
    padding: 1rem;
    border-radius: 10px;
    background-color: rgba(40, 167, 69, 0.1);
    border: 1px solid rgba(40, 167, 69, 0.3);
    color: #155724;
  }

  /* 🎬 Animation */
  @keyframes fadeIn {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
  }

  /* 🖲️ Bouton retour */
  .btn-home {
    margin-top: 1.5rem;
    background: linear-gradient(45deg, #007bff, #00c6ff);
    border: none;
    color: white;
    border-radius: 50px;
    padding: 0.6rem 1.5rem;
    transition: 0.3s ease;
    text-decoration: none;
    display: inline-block;
  }

  .btn-home:hover {
    transform: scale(1.05);
    background: linear-gradient(45deg, #0056b3, #0099cc);
  }
</style>

<div class="backdrop">
  <h2><i class="bi bi-check-circle-fill"></i> Bravo !</h2>
  <p>Formulaire rempli, le compte suivant a été ajouté :</p>

  <div class="message-box">
    <strong><?= esc($le_compte) ?></strong><br>
    <?= esc($le_message) . esc($le_total) ?>
  </div>

  <a href="<?= site_url('/') ?>" class="btn-home mt-3">
    <i class="bi bi-house-door-fill"></i> Retour à l’accueil
  </a>
</div>
