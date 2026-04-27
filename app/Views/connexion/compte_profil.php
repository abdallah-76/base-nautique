<h1 class="h3 mb-4 text-gray-800">Mon profil</h1>

<div class="row">
    <div class="col-lg-8">

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Informations personnelles</h6>
            </div>

            <div class="card-body">

                <p><strong>Nom : </strong><?= $profil->pfl_nom ?></p>
                <p><strong>Prénom : </strong><?= $profil->pfl_prenom ?></p>
                <p><strong>Email : </strong><?= $profil->pfl_email ?></p>
                <p><strong>Téléphone : </strong><?= $profil->pfl_num ?></p>

                <p><strong>Rôle : </strong>
                    <?php
                    if ($profil->cpt_role == 'A') echo "Administrateur";
                    elseif ($profil->cpt_role == 'M') echo "Membre";
                    else echo "Invité";
                    ?>
                </p>

                <p><strong>Statut : </strong>
                    <?php
                    if ($profil->cpt_statut == 'A') echo "Actif";
                    elseif ($profil->cpt_statut == 'D') echo "Désactivé";
                    else echo "Inconnu";
                    ?>
                </p>

            </div>
        </div>

    </div>
</div>
