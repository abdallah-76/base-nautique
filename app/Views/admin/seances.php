<h1 class="h3 mb-4 text-gray-800"><?= esc($titre) ?></h1>

<!-- Formulaire de choix de date -->
<div class="card shadow mb-4">
    <div class="card-body">
        <?= form_open(current_url()) ?>
        <?= csrf_field() ?>

        <div class="form-group mb-3">
            <label for="date">Choisissez une date :</label>
            <input type="date"
                   name="date"
                   id="date"
                   value="<?= esc($date) ?>"
                   class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Voir les réservations</button>

        </form>
    </div>
</div>

<?php if (empty($date)) : ?>

    <p class="text-muted"><em>Veuillez choisir une date ci-dessus.</em></p>

<?php else : ?>

    <h4>Réservations du <?= esc($date) ?></h4>

    <?php if (! empty($reservations_jour)) : ?>

        <table class="table table-bordered table-hover">
            <thead class="thead-light">
                <tr>
                    <th>Ressource</th>
                    <th>Nom de la réservation</th>
                    <th>Heure</th>
                    <th>Lieu</th>
                    <th>Participants inscrits</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($reservations_jour as $r) : ?>
                    <tr>
                        <td><?= esc($r['rsc_nom']) ?></td>
                        <td><?= esc($r['rsv_nom']) ?></td>
                        <td><?= esc($r['rsv_heure']) ?></td>
                        <td><?= esc($r['rsv_lieu']) ?></td>
                        <td>
                            <?php if (! empty($r['participants'])) : ?>
                                <?= esc($r['participants']) ?>
                            <?php else : ?>
                                <em>Aucun participant pour l'instant.</em>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    <?php else : ?>

        <p>Aucune réservation pour l'instant !</p>

    <?php endif; ?>

<?php endif; ?>
