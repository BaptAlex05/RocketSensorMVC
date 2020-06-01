<?php
	$title = "Résultats"; 
	$page_on = 'resultats';
  //$script = "graph";
?>

<?php ob_start(); ?>

  <section>

    <div id="head_tests">
      <h1>Synthèse des résultats</h1>
    </div>

    <?php if (isset($alerte)) { ?>
      <p class = "alerte"><?= $alerte ?></p>
    <?php } ?>

    <!-- Formulaire permettant de choisir le test pour lequel on veut voir les resultats -->
    <form id="formulaire" action="/RocketSensorMVC/controller/tests.php?page=resultats" method="post">
      <table>
        <tr>
           <td class="champ_profil"><label for="id">Choisir un test</label></td>
           <td>
              <select name="id" id="nom" onchange="this.form.submit()" required>
                <option value="default" selected> - </option>
                <?php
                  while ($test = $tests->fetch()){
                ?> 
                  <option value="<?= htmlspecialchars($test['id']); ?>"<?php if (isset($_POST['id']) && $test['id'] == $_POST['id']) { echo 'selected'; }?>><?= htmlspecialchars($test['nom']); ?> </option>
                <?php } ?>
              </select>
          </td>
        </tr>
      </table>
    </form>

    <?php if (isset($resultatsAffichage)) { echo $resultatsAffichage; } ?>

  </section>

<?php $content = ob_get_clean(); ?>

<?php require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/template.php"); ?>
