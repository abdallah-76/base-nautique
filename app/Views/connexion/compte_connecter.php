<style>
  html, body { height: 100%; margin: 0; padding: 0; }
  body {
    background: url('<?= base_url('bootstrap/images/télécharger.jpeg'); ?>') no-repeat center center fixed;
    background-size: cover;
    display: flex; justify-content: center; align-items: center;
  }
  .backdrop {
    backdrop-filter: blur(8px);
    background-color: rgba(255, 255, 255, 0.85);
    border-radius: 20px;
    padding: 2.5rem;
    width: 90%; max-width: 500px;
    box-shadow: 0 0 25px rgba(0, 0, 0, 0.25);
  }
  h2 { text-align: center; color: #007bff; margin-bottom: 1.5rem; }
  label { font-weight: 600; margin-top: 0.8rem; }
  input[type="input"], input[type="password"]{
    width: 100%; padding: .75rem; border-radius: 10px; border: 1px solid #ccc;
    margin-top: .3rem; margin-bottom: .5rem; transition: .3s ease;
  }
  input[type="input"]:focus, input[type="password"]:focus{
    border-color:#007bff; outline:none; box-shadow:0 0 5px rgba(0,123,255,.4);
  }
  .btn-custom{
    background: linear-gradient(45deg,#007bff,#00c6ff);
    color:white; border:none; border-radius:50px; width:100%;
    padding:.75rem; margin-top:1rem; transition:.3s ease;
  }
  .btn-custom:hover{
    transform:scale(1.05);
    background: linear-gradient(45deg,#0056b3,#00a8e0);
  }
  small.text-danger{ display:block; margin-top:-5px; margin-bottom:8px; }
</style>

<div class="backdrop">
  <h2><?= esc($titre) ?></h2>

  <?php if (session()->getFlashdata('success')) : ?>
    <div class="alert alert-success text-center">
      <?= session()->getFlashdata('success') ?>
    </div>
  <?php endif; ?>

  <?php if (session()->getFlashdata('error')) : ?>
    <div class="alert alert-danger text-center">
      <?= session()->getFlashdata('error') ?>
    </div>
  <?php endif; ?>

  <?= form_open('/compte/connecter') ?>
  <?= csrf_field() ?>

  <div class="form-group mb-3">
    <label for="pseudo">Pseudo :</label>
    <input type="input" name="pseudo" value="<?= set_value('pseudo') ?>" placeholder="Votre pseudo">
    <small class="text-danger"><?= validation_show_error('pseudo') ?></small>
  </div>

  <div class="form-group mb-3">
    <label for="mdp">Mot de passe :</label>
    <input type="password" name="mdp" placeholder="Votre mot de passe">
    <small class="text-danger"><?= validation_show_error('mdp') ?></small>
  </div>

  <button type="submit" class="btn btn-custom">Se connecter</button>



  </form>
</div>
