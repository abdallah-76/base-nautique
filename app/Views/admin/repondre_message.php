<h1 class="h3 mb-4 text-gray-800">Répondre à une demande</h1>

<p><strong>Intitulé :</strong> <?= $demande->msg_intitule ?></p>
<p><strong>Email :</strong> <?= $demande->msg_email ?></p>
<p><strong>Message :</strong><br><?= $demande->msg_contenu ?></p>

<form method="post">
    <label>Votre réponse :</label>
    <textarea name="reponse" class="form-control" rows="5"></textarea>
    <button class="btn btn-success mt-3">Envoyer</button>
</form>
