<style>
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

  .backdrop {
    backdrop-filter: blur(8px);
    background-color: rgba(255, 255, 255, 0.85);
    border-radius: 20px;
    padding: 2.5rem;
    width: 90%;
    max-width: 550px;
    box-shadow: 0 0 25px rgba(0, 0, 0, 0.25);
  }

  .btn-custom {
    background: linear-gradient(45deg, #28a745, #42d57a);
    color: white;
    border: none;
    border-radius: 50px;
    transition: 0.3s ease;
  }

  .btn-custom:hover {
    transform: scale(1.05);
    background: linear-gradient(45deg, #1e7e34, #2ebf5f);
  }

  label {
    font-weight: 600;
  }

  .fade-in {
    animation: fadeIn 0.9s ease-in-out;
  }

  @keyframes fadeIn {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
  }
</style>


<div class="backdrop fade-in">
  <h2 class="text-center mb-4 text-success">
    <i class="bi bi-key"></i> <?php echo $titre; ?>
  </h2>

  <?= form_open('message/verifier') ?>
  <?= csrf_field() ?>

    <div class="mb-4">
      <label for="code_secret" class="form-label">Entrez votre code secret :</label>

      <input type="text" name="code_secret" id="code_secret"
             class="form-control form-control-lg"
            >

      <small class="text-danger">
        <?= validation_show_error('code_secret') ?>
      </small>
    </div>

    <div class="text-center">
      <button type="submit" class="btn btn-custom w-100 py-2">
        <i class="bi bi-search"></i> Voir ma demande
      </button>
    </div>

  </form>
</div>
