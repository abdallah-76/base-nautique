<h2><?= $titre ?></h2>

<?php if (isset($demande)): ?>

<p><strong>Date :</strong> <?= $demande->msg_date ?></p>
<p><strong>Adresse e-mail :</strong> <?= $demande->msg_email ?></p>
<p><strong>Sujet :</strong> <?= $demande->msg_intitule ?></p>
<p><strong>Message :</strong><br><?= $demande->msg_contenu ?></p>

<?php if (!empty($demande->msg_reponse)): ?>
    <h3>Réponse :</h3>
    <p><?= $demande->msg_reponse ?></p>
<?php else: ?>
    <p><em>Pas encore de réponse.</em></p>
<?php endif; ?>

<?php else: ?>
    <p><em>Demande introuvable.</em></p>
<?php endif; ?>
