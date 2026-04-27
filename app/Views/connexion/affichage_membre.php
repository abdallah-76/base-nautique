<?php $session = session(); ?>

<h1 class="h3 mb-4 text-gray-800">Accueil Membre</h1>

<!-- Carte BIENVENUE -->
<div class="card shadow mb-4">
    <div class="card-body">
        <h4 class="mb-3">Bonjour, <strong><?= $session->get('user'); ?></strong></h4>

        <p>Rôle actuel :
            <strong>
                <?php
                // rôle prioritaire = pfl_role (chez toi), sinon cpt_role
                $role = $profil->pfl_role;

                if ($role == 'A') echo "Administrateur";
                elseif ($role == 'M') echo "Membre";
                else echo "Invité";
                ?>
            </strong>
        </p>

        <p class="text-muted">
            Vous êtes connecté à votre espace sécurisé.  
            Utilisez le menu de gauche pour gérer vos réservations
            et consulter la liste des adhérents.
        </p>
    </div>
</div>

<h1 class="h3 mb-4 text-gray-800">Mes réservations</h1>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Liste des réservations</h6>
    </div>

    <div class="card-body">

        <?php if (!empty($reservations)) : ?>

            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th>Nom</th>
                            <th>Date</th>
                            <th>Heure</th>
                            <th>Lieu</th>
                            <th>Liste de participants</th>
                        </tr>
                    </thead>

                    <tbody>
                    <?php foreach ($reservations as $r) : ?>
                        <tr>
                            <td><?= $r['rsv_nom'] ?></td>
                            <td><?= $r['rsv_date'] ?></td>
                            <td><?= $r['rsv_heure'] ?></td>
                            <td><?= $r['rsv_lieu'] ?></td>
                            <td>
                                <?php foreach ($r['participants'] as $p) : ?>
                                    <?= $p['pfl_prenom']." ".$p['pfl_nom'] ?><br />
                                <?php endforeach; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

        <?php else : ?>
            <p class="text-muted"><em>Aucune réservation trouvée.</em></p>
        <?php endif; ?>

    </div>
</div>
