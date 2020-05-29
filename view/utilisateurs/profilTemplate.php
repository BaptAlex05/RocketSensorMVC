<?php
	$title = "Profil"; 
	$page_on = 'profil';
?>

<?php ob_start(); ?>
	<section>		
		<h1>Profil</h1>

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

			<div class="bouton">
				<a href="profil_modifier.php">Modifier le profil</a>
			</div>

	</section>

<?php $content = ob_get_clean(); ?>

<?php require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/template.php"); ?>