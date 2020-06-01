<?php ob_start(); ?>

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
        <canvas id="graph1"></canvas>
      </td>
    </tr>
</table>

<script>
  var ctx = document.getElementById('graph1').getContext('2d')

var data = {
  labels: dates, /* abscisse (dates) */
  datasets: [{
    label: 'Score',
    borderColor: '#FF544D',
    backgroundColor: 'rgba(0, 0, 0, 0)',
    pointBackgroundColor: '#FF544D',
    data: resultats /* Scores */
  }] /*tableau qui contient toutes les lignes et 1 objet = 1 ligne */
}

let options = {
  scales: {
    yAxes: [{
      ticks: {
        max: 100,
        min: 0,
        stepSize: 10
      }
    }]
  }
}

var config = {
  type: 'line',
  data: data,
  options: options
}
var graph1 = new Chart(ctx, config);

</script>

<?php $resultatsAffichage = ob_get_clean(); ?>

<?php require("resultatsTemplate.php"); ?>