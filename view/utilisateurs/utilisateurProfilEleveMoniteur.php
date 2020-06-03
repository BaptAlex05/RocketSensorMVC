<?php ob_start(); ?>

	<tr class="profil_ligne">
		<td class="champ_profil">Auto-école</td>
		<td><?= $autoecole ?>
		</td>
	</tr>

<?php $autoecole = ob_get_clean(); ?>

<?php require("utilisateurProfilTemplate.php"); ?>