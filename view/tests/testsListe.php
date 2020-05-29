<?php
	$title = "Tests"; 
	$page_on = 'tests';
?>

<?php ob_start(); ?>
	
	<section>
        <div id="head_tests">
          <h1>Liste des tests</h1>
          <p>Retrouvez la liste des tests disponibles ainsi que votre progression</p>
        </div>

        <table id="tableau_liste">
          <tr>
              <th class="tests_colonne1"> Test </th>
              <th class="tests_colonne2">Description</th>
              <th class="tests_colonne3">Score</th>
              <th class="tests_colonne4">Validation</th>
          </tr>

          <?php
            $compteur=0;

            while ($test = $tests->fetch()) {
              if ($compteur%2==0){  //condition sur le compteur pour l'alterance de couleurs dans le tableau
          ?>

                <a href ="/RocketSensorMVC/controller/tests.php?page=test&id=<?= $test['id_test']; ?>">
                <tr class="couleur1_tab" onclick="document.location='/RocketSensorMVC/controller/tests.php?page=test&id=<?= $test['id_test']; ?>';">
                    <td class="tests_colonne1"><a href ="/RocketSensorMVC/controller/tests.php?page=test&id=<?= $test['id_test']; ?>"><?php echo $test['nom'] ?></a></td> 
                    <td class="tests_colonne2"><?php echo $test['description'] ?></td>
                    <td class="tests_colonne3"><?php echo $test['score'] ?></td>
                    <td class="tests_colonne4"><?php if ($test['score'] < 75) { echo "Non validé"; } else { echo "Validé"; } ?></td>
                </tr>
                </a>
          
          <?php } else { ?>

                <a href ="/RocketSensorMVC/controller/tests.php?page=test&id=<?= $test['id_test']; ?>">
                <tr class="couleur2_tab" onclick="document.location='/RocketSensorMVC/controller/tests.php?page=test&id=<?= $test['id_test']; ?>';">
                    <td class="tests_colonne1"><a href ="/RocketSensorMVC/controller/tests.php?page=test&id=<?= $test['id_test']; ?>"><?php echo $test['nom'] ?></a></td>
                    <td class="tests_colonne2"><?php echo $test['description'] ?> </td>
                    <td class="tests_colonne3"><?php echo $test['score'] ?></td>
                    <td class="tests_colonne4"><?php if ($test['score'] < 75) { echo "Non validé"; } else { echo "Validé"; } ?></td>
                </tr>
                </a>
          
          <?php
          	}
            $compteur++;
            }
          ?>

       </table>
    </section>

<?php $content = ob_get_clean(); ?>

<?php require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/template.php"); ?>