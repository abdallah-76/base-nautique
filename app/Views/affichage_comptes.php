<?php if (session()->getFlashdata('success')) : ?>
  <div class="alert alert-success text-center">
    <?= session()->getFlashdata('success') ?>
  </div>
<?php endif; ?>

<h1 class="h3 mb-4 text-gray-800"><?= esc($titre) ?></h1>

<div class="row mb-4">
  <div class="col-xl-4 col-md-6">
    <div class="card border-left-primary shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
              Nombre total de comptes
            </div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">
              <?= esc($membre) ?>
            </div>
          </div>
          <div class="col-auto">
            <i class="fas fa-users fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Bouton Ajouter un compte -->
<a href="<?= site_url('compte/creer'); ?>" class="btn btn-success mb-3">
    <i class="fas fa-plus"></i> Ajouter un inviter
</a>
<a href="#" class="btn btn-success mb-3">
    <i class="fas fa-plus"></i> Ajouter un compte
</a>

<div class="card shadow mb-4">
    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="thead-light">
                    <tr>
                        <th>ID</th>
                        <th>Pseudo</th>
                        <th>Rôle</th>
                        <th>Statut</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                <?php foreach ($logins as $c) : ?>
                    <tr>
                        <td><?= $c['cpt_id'] ?></td>
                        <td><?= $c['cpt_pseudo'] ?></td>

                        <!-- RÔLE -->
                        <td>
                            <?php
                            if ($c['cpt_role'] == 'A') echo "Administrateur";
                            elseif ($c['cpt_role'] == 'M') echo "Membre";
                            else echo "Invité";
                            ?>
                        </td>

                        <!-- STATUT -->
                        <td>
                            <?php
                            if ($c['cpt_statut'] == 'A') {
                                echo "<span class='badge badge-success'>Actif</span>";
                            } else {
                                echo "<span class='badge badge-danger'>Désactivé</span>";
                            }
                            ?>
                        </td>

                        <!-- ACTIONS -->
                        <td>

                            <?php if ($c['cpt_statut'] == 'A') : ?>
                                <a href="<?= site_url('compte/desactiver/'.$c['cpt_id']); ?>"
                                   class="btn btn-warning btn-sm">
                                    Désactiver
                                </a>
                            <?php else : ?>
                                <a href="<?= site_url('compte/activer/'.$c['cpt_id']); ?>"
                                   class="btn btn-success btn-sm">
                                    Activer
                                </a>
                            <?php endif; ?>

                            <a href="<?= site_url('compte/supprimer/'.$c['cpt_id']); ?>"
                               class="btn btn-danger btn-sm"
                               onclick="return confirm('Supprimer ce compte ?');">
                                Supprimer
                            </a>

                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>

            </table>
        </div>

    </div>
</div>
