<h1 class="h3 mb-4 text-gray-800"><?= esc($titre) ?></h1>

<?php if (session()->getFlashdata('success')) : ?>
    <div class="alert alert-success">
        <?= session()->getFlashdata('success') ?>
    </div>
<?php endif; ?>

<?= form_open(site_url('admin/ajouter_ressource')) ?>
<?= csrf_field() ?>

<div class="form-group mb-3">
    <label for="nom">Nom de la ressource :</label>
    <input type="input" name="nom" value="<?= set_value('nom') ?>" class="form-control">
    <small class="text-danger"><?= validation_show_error('nom') ?></small>
</div>

<div class="form-group mb-3">
    <label for="jaugemin">Jauge minimale :</label>
    <input type="number" name="jaugemin" value="<?= set_value('jaugemin') ?>" class="form-control">
    <small class="text-danger"><?= validation_show_error('jaugemin') ?></small>
</div>

<div class="form-group mb-3">
    <label for="jaugemax">Jauge maximale :</label>
    <input type="number" name="jaugemax" value="<?= set_value('jaugemax') ?>" class="form-control">
    <small class="text-danger"><?= validation_show_error('jaugemax') ?></small>
</div>

<div class="form-group mb-3">
    <label for="descriptif">Descriptif :</label>
    <textarea name="descriptif" class="form-control"><?= set_value('descriptif') ?></textarea>
    <small class="text-danger"><?= validation_show_error('descriptif') ?></small>
</div>

<div class="form-group mb-3">
    <label for="liste_materiel">Liste du matériel :</label>
    <textarea name="liste_materiel" class="form-control"><?= set_value('liste_materiel') ?></textarea>
    <small class="text-danger"><?= validation_show_error('liste_materiel') ?></small>
</div>

<button type="submit" class="btn btn-success mt-2">Enregistrer</button>

</form>
