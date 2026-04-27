<h1 class="h3 mb-4 text-gray-800">Demandes visiteurs</h1>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Messages reçus</h6>
    </div>

    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="thead-light">
                    <tr>
                        <th>Intitulé</th>
                        <th>Email</th>
                        <th>Date</th>
                        <th>Réponse</th>
                        <th>Statut</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                <?php foreach ($demandes as $d) : ?>
                    <tr>
                        <td><?= $d['msg_intitule'] ?></td>
                        <td><?= $d['msg_email'] ?></td>
                        <td><?= $d['msg_date'] ?></td>
                        <td>
                            <?php if ($d['msg_reponse'] == null || $d['msg_reponse'] == ''): ?>
                                <em>Pas encore de réponse</em>
                            <?php else: ?>
                                <?= $d['msg_reponse'] ?>
                            <?php endif; ?>
                        </td>

                        <td>
                            <?php if ($d['msg_reponse'] == null || $d['msg_reponse'] == ''): ?>
                                <span class="badge badge-danger">Non répondu</span>
                            <?php else: ?>
                                <span class="badge badge-success">Répondu</span>
                            <?php endif; ?>
                        </td>

                        <td>
                            <?php if ($d['msg_reponse'] == null || $d['msg_reponse'] == ''): ?>
                                <!-- Bouton actif si pas encore de réponse -->
                                <a class="btn btn-primary btn-sm"
                                   href="<?= site_url('admin/repondre_message/'.$d['msg_id']); ?>">
                                    Répondre
                                </a>
                            <?php else: ?>
                                <!-- Bouton désactivé si déjà répondu -->
                                <button class="btn btn-secondary btn-sm" disabled>
                                    Déjà répondu
                                </button>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>

            </table>
        </div>

    </div>
</div>
