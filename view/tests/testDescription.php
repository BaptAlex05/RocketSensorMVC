<?php
	$title = "Test"; 
	$page_on = 'test';
?>

<?php ob_start(); ?>
	
	<section>

    <div id="head_tests">
      <h1><?php echo $donnees['nom']; ?></h1>
    </div>

    <p>
      <table class="affichage_test">
          <tr>
              <td class="champ_profil">Description</td>
              <td class="profil_ligne"><?= $donnees['description']; ?></span></td>
          </tr>
          <tr>
              <td class="champ_profil">Capteur</td>
              <td class="profil_ligne"><?= $donnees['capteur']; ?></td>
          </tr>
          <tr>
              <td class="champ_profil">Durée</td>
              <td class="profil_ligne"><?= $donnees['duree']; ?> minutes</td>
          </tr>
          <tr>
              <td class="champ_profil">Déroulement</td>
              <td class="profil_ligne"><?= $donnees['deroulement']; ?></span></td>
          </tr>
      </table>
    </p>

    <?php if (isset($_SESSION['id']) && $_SESSION['role'] == 'Élève') { ?>
      <div class="bouton">
        <a href = "test_post.php?id_test=<?= $_GET['id']; ?>">Commencer</a>
      </div>
    <?php } ?>

  </section>

<?php $content = ob_get_clean(); ?>

<?php require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/template.php"); ?>