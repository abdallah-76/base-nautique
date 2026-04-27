<style>
  /* 🌄 Arrière-plan plein écran avec ton image locale */
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

  /* 🧊 Bloc principal effet verre flou */
  .backdrop {
    backdrop-filter: blur(8px);
    background-color: rgba(255, 255, 255, 0.85);
    border-radius: 20px;
    padding: 2.5rem;
    width: 90%;
    max-width: 500px;
    box-shadow: 0 0 25px rgba(0, 0, 0, 0.25);
  }

  h2 {
    text-align: center;
    color: #007bff;
    margin-bottom: 1.5rem;
  }

  label {
    font-weight: 600;
    margin-top: 0.8rem;
  }

  /* 🔒 Style des champs */
  input[type="input"],
  input[type="password"] {
    width: 100%;
    padding: 0.75rem;
    border-radius: 10px;
    border: 1px solid #ccc;
    margin-top: 0.3rem;
    margin-bottom: 0.5rem;
    transition: 0.3s ease;
  }

  input[type="input"]:focus,
  input[type="password"]:focus {
    border-color: #007bff;
    outline: none;
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.4);
  }

  /* 🎨 Bouton stylé */
  .btn-custom {
    background: linear-gradient(45deg, #007bff, #00c6ff);
    color: white;
    border: none;
    border-radius: 50px;
    width: 100%;
    padding: 0.75rem;
    margin-top: 1rem;
    transition: 0.3s ease;
  }

  .btn-custom:hover {
    transform: scale(1.05);
    background: linear-gradient(45deg, #0056b3, #00a8e0);
  }

  /* ✨ Animation fade-in */
  .fade-in {
    animation: fadeIn 1s ease-in-out;
  }

  @keyframes fadeIn {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
  }

  small.text-danger {
    display: block;
    margin-top: -5px;
    margin-bottom: 8px;
  }
</style>

<div class="backdrop fade-in">
  <h2><i class="bi bi-person-plus-fill"></i> <?= esc($titre) ?></h2>

  <?= form_open('/compte/creer') ?>
  <?= csrf_field() ?>

  <div class="form-group mb-3">
    <label for="pseudo">Pseudo :</label>
    <input type="input" name="pseudo" value="<?= set_value('pseudo') ?>" placeholder="Choisissez un pseudo">
    <small class="text-danger"><?= validation_show_error('pseudo') ?></small>
  </div>

  <div class="form-group mb-3">
    <label for="mdp">Mot de passe :</label>
    <input type="password" name="mdp" placeholder="Entrez un mot de passe sécurisé">
    <small class="text-danger"><?= validation_show_error('mdp') ?></small>
  </div>

  <button type="submit" class="btn btn-custom">
    <i class="bi bi-person-check"></i> Créer un nouveau compte
  </button>
  <?php if (session()->has('error')): ?>
    <div class="alert alert-danger">
        <?= session('error') ?>
    </div>
<?php endif; ?>

<?php if (session()->has('success')): ?>
    <div class="alert alert-success">
        <?= session('success') ?>
    </div>
<?php endif; ?>

  </form>
</div>
