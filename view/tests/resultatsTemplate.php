<?php
	$title = "Résultats"; 
	$page_on = 'resultats';
?>

<?php ob_start(); ?>

  <section>

    <div id="head_tests">
      <?php if (isset($nom)) { ?>
        <h1>Synthèse des résultats de <?= $nom ?></h1>
      <?php } else { ?>
        <h1>Synthèse des résultats</h1>
      <?php } ?>
    </div>

    <?php if (isset($alerte)) { ?>
      <p class = "alerte"><?= $alerte ?></p>
    <?php } ?>

    <!-- Formulaire permettant de choisir le test pour lequel on veut voir les resultats -->
    <form id="formulaire" action="/RocketSensorMVC/index.php?section=tests&page=resultats<?php if (isset($_GET['id'])) { echo '&id='.$_GET['id']; } ?>" method="post">
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
