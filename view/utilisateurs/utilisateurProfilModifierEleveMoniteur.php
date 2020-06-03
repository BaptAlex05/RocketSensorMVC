<?php ob_start(); ?>

	<tr>
		<td class="champ_profil"><label for="autoecole">Auto-école</label></td>
		<td> 
			<select name="autoecole" id="formulaire_autoecole">
		       <option value="-" <?php if ($utilisateur['id_autoecole'] == 0) echo 'selected' ; ?>>-</option>
		       <?php while ($autoecole = $autoecoles->fetch()) { ?>
		       		<option value="<?= $autoecole['id'] ?>" <?php if ($utilisateur['id_autoecole'] == $autoecole['id']) echo 'selected' ; ?>><?= htmlspecialchars($autoecole['nom']) ?> - <?= htmlspecialchars($autoecole['ville']) ?></option>
		       	<?php } ?>
			</select>
		</td>
	</tr>	

<?php $autoecole = ob_get_clean(); ?>

<?php require("utilisateurProfilModifierTemplate.php"); ?>