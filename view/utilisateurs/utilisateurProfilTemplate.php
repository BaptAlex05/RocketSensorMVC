<?php
	$title = "Profil de ".htmlspecialchars($utilisateur['prenom'])." ".htmlspecialchars($utilisateur['nom']); 
	$page_on = 'profil';
	$script = "suppressionUtilisateur";
?>

<?php ob_start(); ?>
	<section>		
		<h1>Profil de <?= htmlspecialchars($utilisateur['prenom']) ?> <?= htmlspecialchars($utilisateur['nom']) ?></h1>

		<?php if (isset($alerte)) { ?>
			<p class="alerte"><?= $alerte ?></p>
		<?php } ?>

		<p>
			<table>
				<tr class="profil_ligne">
					<td class="champ_profil">Nom</td>
					<td><span class="nom"><?= htmlspecialchars($utilisateur['nom']); ?></span></td>
				</tr>
				<tr class="profil_ligne">
					<td class="champ_profil">Prénom</td>
					<td><?= htmlspecialchars($utilisateur['prenom']); ?></td>
				</tr>
				<tr class="profil_ligne">
					<td class="champ_profil">Date de naissance</td>
					<td><?= htmlspecialchars($utilisateur['datenaissance']); ?></td>
				</tr>
				<tr class="profil_ligne">
					<td class="champ_profil">Adresse mail</td>
					<td><?= htmlspecialchars($utilisateur['mail']); ?></td>
				</tr>

				<?php if (isset($autoecole)) { echo $autoecole; } ?>

				<tr class="profil_ligne">
					<td class="champ_profil">Rôle</td>
					<td><span class="role"><?= htmlspecialchars($utilisateur['role']); ?></span></td>
				</tr>
			</table>

			</p>

			<div id="utilisateur_boutons">
				<?php if(isset($boutons_modifier_supprimer)) { ?>
					<div class="bouton">
						<a href="/RocketSensorMVC/controller/utilisateurs.php?page=utilisateurModifier&id=<?=$_GET['id'];?>">Modifier le profil</a>
					</div>

					<div class="bouton">
						<a id = "supprimer" href="/RocketSensorMVC/controller/utilisateurs.php?page=utilisateurSupprimer&id=<?= $_GET['id'] ?>">Supprimer</a>
					</div>
				<?php } ?>

				<?php if (isset($bouton_bannir)) { ?>
					<div class="bouton">
						<a href="/RocketSensorMVC/controller/utilisateurs.php?page=bannir&id=<?= $_GET['id'] ?>">Bannir</a>
					</div>
				<?php } ?>

				<?php if (isset($bouton_debannir)) { ?>
					<div class="bouton">
						<a href="/RocketSensorMVC/controller/utilisateurs.php?page=debannir&id=<?= $_GET['id'] ?>">Débannir</a>
					</div>
				<?php } ?>

				<?php if (isset($bouton_resultats)) { ?>
					<div class="bouton">
						<a href="/RocketSensorMVC/controller/tests.php?page=resultats&id=<?=$_GET['id'];?>">Voir ses résultats aux tests</a>
					</div>
				<?php } ?>
			</div>

	</section>

<?php $content = ob_get_clean(); ?>

<?php require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/template.php"); ?>