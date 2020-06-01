<?php ob_start(); ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>

    <h2 id='resultats_titre'><?= htmlspecialchars($test['nom']) ?></h2>

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

                while ($resultat = $resultats->fetch()) { ?>

                  <script>
                    resultats.push(<?= htmlspecialchars($resultat['score']); ?>);
                    dates.push("<?= htmlspecialchars($resultat['date']); ?>");
                  </script>

                  <?php if ($compteur%2==0) { ?>

                    <tr class="resultats_couleur1">
                      <td class='resultats_colonne1'><?= htmlspecialchars($resultat['date']); ?></td>
                      <td class='resultats_colonne2'><?= htmlspecialchars($resultat['score']); ?></td>
                    </tr>

                  <?php } else { ?>

                    <tr class="resultats_couleur2">
                      <td class='resultats_colonne1'><?= htmlspecialchars($resultat['date']); ?></td>
                      <td class='resultats_colonne2'><?= htmlspecialchars($resultat['score']); ?></td>
                    </tr>

                  <?php }
                    $compteur++;

                    if ($resultat['score'] > 75) {
                      $validation = true;
                    } 
                } ?>
          </table>
        </td>
        <td>
          <canvas id="graph"></canvas>
        </td>
      </tr>
  </table>

  <?php if ($validation == true) { ?>
    <p class = "resultats_validation">Le test a été validé.</p>
  <?php } else { ?>
    <p class = "resultats_validation">Le test n'a pas été validé.</p>
  <?php } ?>

<script src="/RocketSensorMVC/public/js/graph.js"></script>

<?php $resultatsAffichage = ob_get_clean(); ?>

<?php require("resultatsTemplate.php"); ?>