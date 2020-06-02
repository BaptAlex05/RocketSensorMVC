<?php
	$title = htmlspecialchars($autoecole['nom']); 
	$page_on = 'autoecole';
  $script = "suppressionAutoecole";
?>

<?php ob_start(); ?>
	
	<section>
      <h1><?= htmlspecialchars($autoecole['nom']) ?></h1>

      <?php if (isset($alerte)) { ?>
        <p class="alerte"><?= $alerte ?></p>
      <?php } ?>

      <p id="retour_liste_autoecoles"><a href="/RocketSensorMVC/controller/autoecoles.php">Retour à la liste des auto-écoles</a></p>

      <p>
        <table>
          <tr class="profil_ligne">
            <td class="champ_profil">Nom</td>
            <td><?= htmlspecialchars($autoecole['nom']) ?></td>
          </tr>
          <tr class="profil_ligne">
            <td class="champ_profil">Licence</td>
            <td><?= htmlspecialchars($autoecole['licence']) ?></td>
          </tr>
          <tr class="profil_ligne">
            <td class="champ_profil">Adresse</td>
            <td><?= htmlspecialchars($autoecole['adresse']) ?></td>
          </tr>
          <tr class="profil_ligne">
            <td class="champ_profil">Code Postal</td>
            <td><?= htmlspecialchars($autoecole['codepostal']) ?></td>
          </tr>
          <tr class="profil_ligne">
            <td class="champ_profil">Ville</td>
            <td><?= htmlspecialchars($autoecole['ville']) ?></td>
          </tr>
        </table>

      </p>

      <div class="bouton">
        <a href="/RocketSensorMVC/controller/autoecoles.php?page=modifier&id=<?= $autoecole['id'] ?>">Éditer</a>
        <a href="/RocketSensorMVC/controller/autoecoles.php?page=supprimer&id=<?= $autoecole['id'] ?>" id="supprimer">Supprimer</a>
      </div>

  </section>

<?php $content = ob_get_clean(); ?>

<?php require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/template.php"); ?>