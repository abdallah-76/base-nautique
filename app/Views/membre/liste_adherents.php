<h1 class="h3 mb-4 text-gray-800">Liste des adhérents</h1>

<?php if (!empty($adherents)) : ?>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Email</th>
            <th>Téléphone</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($adherents as $a) : ?>
        <tr>
            <td><?= $a['pfl_nom'] ?></td>
            <td><?= $a['pfl_prenom'] ?></td>
            <td><?= $a['pfl_email'] ?></td>
            <td><?= $a['pfl_num'] ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php else : ?>
    <p>Aucun adhérent pour le moment !</p>
<?php endif; ?>
