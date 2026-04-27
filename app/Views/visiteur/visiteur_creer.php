<style>
  body {
    background: url('<?= base_url('bootstrap/images/hero_2.jpg.png'); ?>') no-repeat center center fixed;
    background-size: cover;
  }

  .backdrop {
    backdrop-filter: blur(8px);
    background-color: rgba(255, 255, 255, 0.85);
    border-radius: 20px;
    padding: 2rem;
    max-width: 600px;
    margin: 5rem auto;
    box-shadow: 0 0 25px rgba(0, 0, 0, 0.25);
  }

  label {
    font-weight: 600;
    margin-top: 0.5rem;
  }

  .btn-custom {
    background: linear-gradient(45deg, #007bff, #00c6ff);
    color: white;
    border: none;
    border-radius: 50px;
    transition: 0.3s;
  }

  .btn-custom:hover {
    transform: scale(1.05);
    background: linear-gradient(45deg, #0056b3, #0099cc);
  }

  .fade-in {
    animation: fadeIn 1s ease-in-out;
  }

  @keyframes fadeIn {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
  }
</style>

<div class="backdrop fade-in">
  <h2 class="text-center mb-4 text-primary"><?php echo $titre; ?></h2>

  <?= form_open('visiteur/creer') ?>
  <?= csrf_field() ?>

  <div class="form-group mb-3">
    <label for="email">Adresse e-mail :</label>
    <input type="email" name="email" class="form-control" placeholder="Entrez votre adresse e-mail"
           value="<?php echo set_value('email'); ?>">
    <small class="text-danger"><?php echo validation_show_error('email'); ?></small>
  </div>

  <div class="form-group mb-3">
    <label for="sujet">Sujet :</label>
    <input type="text" name="sujet" class="form-control" placeholder="Sujet de votre message"
           value="<?php echo set_value('sujet'); ?>">
    <small class="text-danger"><?php echo validation_show_error('sujet'); ?></small>
  </div>

  <div class="form-group mb-3">
    <label for="message">Votre message :</label>
    <textarea name="message" rows="5" class="form-control" placeholder="Tapez votre message ici..."><?php echo set_value('message'); ?></textarea>
    <small class="text-danger"><?php echo validation_show_error('message'); ?></small>
  </div>

  <div class="text-center">
    <button type="submit" class="btn btn-custom px-4 py-2 mt-2">Envoyer la demande</button>
  </div>

  </form>
</div>
