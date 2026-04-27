<h1 class="h3 mb-4 text-gray-800">Espace invité</h1>
<p>Bienvenue <?= session()->get('user'); ?> !</p>

<?php if (!empty($reservations)) : ?>
    <h4>Vos réservations</h4>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Date</th>
                <th>Heure</th>
                <th>Lieu</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($reservations as $r) : ?>
            <tr>
                <td><?= $r['rsv_nom'] ?></td>
                <td><?= $r['rsv_date'] ?></td>
                <td><?= $r['rsv_heure'] ?></td>
                <td><?= $r['rsv_lieu'] ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php else : ?>
    <p>Aucune réservation pour le moment.</p>
<?php endif; ?>
