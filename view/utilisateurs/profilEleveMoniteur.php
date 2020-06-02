<?php ob_start(); ?>

	<tr class="profil_ligne">
		<td class="champ_profil">Auto-école</td>
		<td><?= $autoecole['nom'] ?> - <?= $autoecole['ville']; ?></td>
	</tr>

<?php $autoecole = ob_get_clean(); ?>

<?php require("profilTemplate.php"); ?>