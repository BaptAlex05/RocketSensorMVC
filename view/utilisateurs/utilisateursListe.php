<?php
	$title = "Liste des utilisateurs"; 
	$page_on = 'profil';
?>

<?php ob_start(); ?>
	<section>		
		<h1>Liste des utilisateurs</h1>

		<?php if (isset($alerte)) { ?>
			<p class="alerte"><?= $alerte ?></p>
		<?php } ?>

		<table>
			<tr>
				<th class="utilisateurs_colonne1">Nom</th>
				<th class="utilisateurs_colonne1">Prénom</th>
				<th class="utilisateurs_colonne1">Date de naissance</th>
				<th class="utilisateurs_colonne2">Auto-école</th>
				<th class="utilisateurs_colonne1">Rôle</th>
			</tr>

			<?php 
				$compteur = 0;
				while ($utilisateur = $utilisateurs->fetch()) {
					if ($compteur % 2 == 0) {
			?> 
						<tr class="line_pointer" onclick="document.location='/RocketSensorMVC/controller/utilisateurs.php?page=utilisateur&id=<?= $utilisateur['id']; ?>';">
							<td class="utilisateurs_colonne_boucle1"><?= htmlspecialchars($utilisateur['nom']) ?></td>
							<td class="utilisateurs_colonne_boucle1"><?= htmlspecialchars($utilisateur['prenom']) ?></td>
							<td class="utilisateurs_colonne_boucle1"><?= htmlspecialchars($utilisateur['datenaissance']) ?></td>
							<td class="utilisateurs_colonne_boucle1"><?php if (is_null($utilisateur['autoecole_nom'])) { echo "-"; } else { echo htmlspecialchars($utilisateur['autoecole_nom'])." - ".htmlspecialchars($utilisateur['autoecole_ville']); } ?></td>
							<td class="utilisateurs_colonne_boucle1"><?= htmlspecialchars($utilisateur['role']) ?></td>
						</tr>

			<?php } else { ?> 
        				<tr class="line_pointer" onclick="document.location='/RocketSensorMVC/controller/utilisateurs.php?page=utilisateur&id=<?= $utilisateur['id']; ?>';">
        					<td class="utilisateurs_colonne_boucle2"><?= htmlspecialchars($utilisateur['nom']) ?></td>
							<td class="utilisateurs_colonne_boucle2"><?= htmlspecialchars($utilisateur['prenom']) ?></td>
							<td class="utilisateurs_colonne_boucle2"><?= htmlspecialchars($utilisateur['datenaissance']) ?></td>
							<td class="utilisateurs_colonne_boucle2"><?php if (is_null($utilisateur['autoecole_nom'])) { echo "-"; } else { echo htmlspecialchars($utilisateur['autoecole_nom'])." - ".htmlspecialchars($utilisateur['autoecole_ville']); } ?></td>
							<td class="utilisateurs_colonne_boucle2"><?= htmlspecialchars($utilisateur['role']) ?></td>
						</tr>
			<?php }
				$compteur += 1;
			}
			?>
		</table>
	</section>

<?php $content = ob_get_clean(); ?>

<?php require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/template.php"); ?>