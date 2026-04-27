<style>
  html, body {
    height: 100%;
    margin: 0;
    padding: 0;
  }

  body {
    background: url('<?= base_url('bootstrap/images/hero_2.jpg'); ?>') no-repeat center center fixed;
    background-size: cover;
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .backdrop {
    backdrop-filter: blur(8px);
    background-color: rgba(255, 255, 255, 0.9);
    border-radius: 20px;
    padding: 3rem;
    width: 90%;
    max-width: 600px;
    text-align: center;
    box-shadow: 0 0 25px rgba(0, 0, 0, 0.25);
    animation: fadeIn 1s ease-in-out;
  }

  h2 {
    color: #28a745;
    font-weight: 700;
    margin-bottom: 1rem;
  }

  p {
    font-size: 1.1rem;
    color: #333;
  }

  .secret-code {
    font-size: 1.8rem;
    font-weight: 700;
    color: #007bff;
    background-color: rgba(0, 123, 255, 0.1);
    border: 2px dashed #007bff;
    padding: 0.75rem 1.5rem;
    border-radius: 15px;
    display: inline-block;
    margin: 1rem 0;
    letter-spacing: 2px;
  }

  @keyframes fadeIn {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
  }

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
  <h2><i class="bi bi-envelope-check-fill"></i> Merci pour votre message !</h2>

  <p>Votre demande a bien été enregistrée.</p>
  <p>Voici votre code secret pour suivre votre demande :</p>

  <div class="secret-code"><?php echo $code; ?></div>

  <p>Conservez bien ce code, il vous sera demandé pour consulter la réponse.</p>

  <a href="<?php echo site_url('/'); ?>" class="btn-home">
    <i class="bi bi-house-door-fill"></i> Retour à l’accueil
  </a>
</div>
