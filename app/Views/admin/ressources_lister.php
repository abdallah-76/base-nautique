<h1 class="h3 mb-4 text-gray-800"><?= esc($titre) ?></h1>

<?php if (session()->getFlashdata('success')) : ?>
    <div class="alert alert-success">
        <?= session()->getFlashdata('success') ?>
    </div>
<?php endif; ?>

<a href="<?= site_url('admin/ajouter_ressource'); ?>" class="btn btn-primary mb-3">
    Ajouter une ressource
</a>

<?php if (!empty($ressources)) : ?>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nom</th>
            <th>Image</th>
            <th>Jauge min</th>
            <th>Jauge max</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($ressources as $r) : ?>
        <tr>
            <!-- PAS de esc() ici : déjà htmlspecialchars dans le modèle -->
            <td><?= $r['rsc_nom'] ?></td>

            <td>
                <?php if (!empty($r['rsc_image'])) : ?>
                    <img src="<?= base_url('bootstrap/images/'.$r['rsc_image']); ?>" 
                         alt="<?= $r['rsc_nom'] ?>" 
                         style="max-width:100px;">
                <?php endif; ?>
            </td>

            <!-- Ici ce sont des nombres, esc() ne pose pas de souci -->
            <td><?= esc($r['rsc_jaugemin']) ?></td>
            <td><?= esc($r['rsc_jaugemax']) ?></td>

            <!-- PAS de esc() ici non plus -->
            <td><?= $r['rsc_descriptif'] ?></td>

            <td class="d-flex gap-2">
                <!-- Bouton Détail -->
                <a href="#"
                   class="btn btn-primary">
                    Détail
                </a>

                <!-- Bouton Suppression -->
                <a href="<?= site_url('admin/supprimer_ressource/'.$r['rsc_id']); ?>"
                   class="btn btn-danger btn-sm"
                   onclick="return confirm('Supprimer cette ressource ?');">
                    Supprimer
                </a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<?php else : ?>

    <p>Aucune ressource réservable pour l'instant !</p>

<?php endif; ?>
