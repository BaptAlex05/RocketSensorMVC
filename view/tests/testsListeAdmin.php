<?php
	$title = "Tests"; 
	$page_on = 'tests';
?>

<?php ob_start(); ?>

  <section>

        <div id="head_tests">
          <h1>Liste des tests</h1>
          <p>Retrouvez la liste des tests disponibles</p>

          <!-- Message de confirmation -->
          <?php if (isset($alerte)) { ?>
            <p class="alerte"><?= $alerte ?></p>
          <?php } ?>
        </div>

        <table id="tableau_liste">
          <tr>
              <th class="tests_colonne1"> Test </th>
              <th class="tests_colonne2">Description</th>
          </tr>

          <?php
            $compteur=0;

            // On affiche chaque entrée une à une
            while ($test = $tests->fetch()) {
              if ($compteur%2==0){
          ?>

                <a href ="/RocketSensorMVC/index.php?section=tests&page=test&id=<?= $test['id']; ?>">
                <tr class="couleur1_tab" onclick="document.location='/RocketSensorMVC/index.php?section=tests&page=test&id=<?= $test['id']; ?>';">
                    <td class="tests_colonne1"><a href ="/RocketSensorMVC/index.php?section=tests&page=test&id=<?= $test['id']; ?>"><?= htmlspecialchars($test['nom']) ?></a></td>
                    <td class="tests_colonne2"><?= htmlspecialchars($test['description']) ?></td>
                </tr>
                </a>
          
          <?php } else { ?>

                <a href ="/RocketSensorMVC/index.php?section=tests&page=test&id=<?= $test['id']; ?>">
                <tr class="couleur2_tab" onclick="document.location='/RocketSensorMVC/index.php?section=tests&page=test&id=<?= $test['id']; ?>';">
                    <td class="tests_colonne1"> <a href ="/RocketSensorMVC/index.php?section=tests&page=test&id=<?= $test['id']; ?>"><?= htmlspecialchars($test['nom']) ?> </a> </td>
                    <td class="tests_colonne2"> <?= htmlspecialchars($test['description']) ?> </td>
                </tr>
                </a>
          
          <?php } $compteur++; } ?>

       </table>

      <div id="test_administateur">
          <div class="bouton">
            <a href = '/RocketSensorMVC/index.php?section=tests&page=ajouter'>Ajouter</a>
            <a href = '/RocketSensorMVC/index.php?section=tests&page=modifier'>Editer</a>
            <a href = '/RocketSensorMVC/index.php?section=tests&page=supprimer'>Supprimer</a>
          </div>
      </div>
    </section>
	
	
<?php $content = ob_get_clean(); ?>

<?php require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/template.php"); ?>