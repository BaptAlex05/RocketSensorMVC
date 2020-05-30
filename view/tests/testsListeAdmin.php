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

                <a href ="/RocketSensorMVC/controller/tests.php?page=test&id=<?= $test['id']; ?>">
                <tr class="couleur1_tab" onclick="document.location='/RocketSensorMVC/controller/tests.php?page=test&id=<?= $test['id']; ?>';">
                    <td class="tests_colonne1"><a href ="/RocketSensorMVC/controller/tests.php?page=test&id=<?= $test['id']; ?>"><?= $test['nom'] ?></a></td>
                    <td class="tests_colonne2"><?= $test['description'] ?></td>
                </tr>
                </a>
          
          <?php } else { ?>

                <a href ="/RocketSensorMVC/controller/tests.php?page=test&id=<?= $test['id']; ?>">
                <tr class="couleur2_tab" onclick="document.location='/RocketSensorMVC/controller/tests.php?page=test&id=<?= $test['id']; ?>';">
                    <td class="tests_colonne1"> <a href ="/RocketSensorMVC/controller/tests.php?page=test&id=<?= $test['id']; ?>"><?= $test['nom'] ?> </a> </td>
                    <td class="tests_colonne2"> <?= $test['description'] ?> </td>
                </tr>
                </a>
          
          <?php } $compteur++; } ?>

       </table>

      <div id="test_administateur">
          <div class="bouton">
            <a href = '/RocketSensorMVC/controller/tests.php?page=ajouter'>Ajouter</a>
            <a href = '/RocketSensorMVC/controller/tests.php?page=modifier'>Editer</a>
            <a href = '/RocketSensorMVC/controller/tests.php?page=supprimer'>Supprimer</a>
          </div>
      </div>
    </section>
	
	
<?php $content = ob_get_clean(); ?>

<?php require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/template.php"); ?>