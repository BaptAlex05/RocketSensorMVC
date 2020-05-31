<?php ob_start(); ?>

  <?= "<h2 id='resultats_titre'>".$test['nom']."</h2>"; ?>

  <script>
    let resultats = [];
    let dates = [];
  </script>

  <table id="resultats_tableau">
    <tr>
      <td>
        <table id="resultats_tableau_scores">
            <tr>
              <th class='resultats_colonne1'>Date</th>
              <th class='resultats_colonne2'>Score (/100)</th>
            <tr>

            <?php 
              $compteur=0;
              $validation = false;

              while ($donnees = $req->fetch()) { ?>

                <script>
                  resultats.push(<?= $donnees['score']; ?>);
                  dates.push("<?= $donnees['date']; ?>");
                </script>

                <?php if ($compteur%2==0) { ?>

                  <tr class="resultats_couleur1">
                    <td class='resultats_colonne1'><?= htmlspecialchars($donnees['date']); ?></td>
                    <td class='resultats_colonne2'><?= htmlspecialchars($donnees['score']); ?></td>
                  </tr>

                <?php } else { ?>

                  <tr class="resultats_couleur2">
                    <td class='resultats_colonne1'><?= htmlspecialchars($donnees['date']); ?></td>
                    <td class='resultats_colonne2'><?= htmlspecialchars($donnees['score']); ?></td>
                  </tr>

                <?php }
                  $compteur++;


                  if ($donnees['score'] > 75) {
                    $validation = true;
                  } 
              } 
              $req->closeCursor();
            ?>
        </table>
      </td>
      <td>
        <canvas id="graph1"></canvas>
      </td>
    </tr>
</table>

<?php if ($validation == true) { 
          if (isset($_GET['id'])) { ?>
            <p>Le test a bien été validé</p>
    <?php } else { ?>
            <p>Féliciations, vous avez <strong>validé</strong> ce test !</p>
    <?php } 
      } else { 
          if (isset($_GET['id'])) { ?>
            <p>Le test n'a pas été validé</p>
    <?php } else { ?>
            <p>Vous n'avez pas validé ce test. Pour le passer ou le repasser, <a href = "tests.php">cliquez ici</a>.
<?php }}} ?>




<?php $resultatsAffichage = ob_get_clean(); ?>

<?php require("resultatsTemplate.php"); ?>