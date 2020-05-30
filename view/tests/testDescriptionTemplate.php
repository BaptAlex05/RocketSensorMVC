<?php
	$title = $test['nom']; 
	$page_on = 'test';
?>

<?php ob_start(); ?>
	
	<section>

    <div id="head_tests">
      <h1><?= $test['nom'] ?></h1>
    </div>

    <p>
      <table class="affichage_test">
          <tr>
              <td class="champ_profil">Description</td>
              <td class="profil_ligne"><?= $test['description'] ?></span></td>
          </tr>
          <tr>
              <td class="champ_profil">Capteur</td>
              <td class="profil_ligne"><?= $test['capteur'] ?></td>
          </tr>
          <tr>
              <td class="champ_profil">Durée</td>
              <td class="profil_ligne"><?= $test['duree'] ?> minutes</td>
          </tr>
          <tr>
              <td class="champ_profil">Déroulement</td>
              <td class="profil_ligne"><?= $test['deroulement'] ?></span></td>
          </tr>
      </table>
    </p>

    <?php if (isset($bouton_commencer)) { echo $bouton_commencer; } ?>

  </section>

<?php $content = ob_get_clean(); ?>

<?php require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/template.php"); ?>