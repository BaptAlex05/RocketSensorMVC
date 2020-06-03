<?php
	$title = "Supprimer un test"; 
	$page_on = 'supprimerTest';
  $script = "suppressionTest";
?>

<?php ob_start(); ?>
	
	<section>

        <div id="head_tests">
          <h1>Supprimer un test</h1>
        </div>

        <form method="post" action="/RocketSensorMVC/controller/tests.php?page=supprimerTraitement">

        <table>

          <?php while ($test = $tests->fetch()) { ?>

            <tr>
              <td><input type="radio" name="nom" value="<?= htmlspecialchars($test['nom']); ?>"/></td>
              <td><label for="<?php $test['nom']; ?>"> <?= htmlspecialchars($test['nom']); ?> </label></td>
            </tr>

         <?php } ?>
         
        </table>
          <div class="bouton">
              <input id = "supprimer" type="submit" value="Supprimer" /> 
              <a href = '/RocketSensorMVC/controller/tests.php?page=admin'>Annuler</a>   
          </div>
        </form>    
      </section>


<?php $content = ob_get_clean(); ?>

<?php require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/template.php"); ?>