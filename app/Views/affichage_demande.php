<div class="container my-5 p-4 bg-white shadow rounded">
  <h2 class="text-center mb-4"><?php echo $titre; ?></h2>

  <?php if (!empty($message)) : ?>
    <table class="table table-bordered table-striped">
      <tr><th>Intitulé</th><td><?php echo $message->msg_intitule; ?></td></tr>
      <tr><th>Contenu</th><td><?php echo $message->msg_contenu; ?></td></tr>
      <tr><th>Date</th><td><?php echo $message->msg_date; ?></td></tr>
      <tr><th>Email</th>
        <td>
          <?php
          if ($message->msg_email != null) {
              echo $message->msg_email;
          } else {
              echo "<em>Sans email</em>";
          }
          ?>
        </td>
      </tr>
      <tr><th>Réponse</th>
        <td>
          <?php
          if ($message->msg_reponse != null) {
              echo $message->msg_reponse;

              if (!empty($message->cpt_pseudo)) {
                  echo "<br><small class='text-muted'>Répondu par : <strong>" 
                      . $message->cpt_pseudo . "</strong></small>";
              }
          } else {
              echo "<em>Pas encore de réponse</em>";
          }
          ?>
        </td>
      </tr>

    </table>
  <?php else : ?>
    <div class="alert alert-warning text-center">
      Aucun message trouvé pour ce code.
    </div>
  <?php endif; ?>
</div>
