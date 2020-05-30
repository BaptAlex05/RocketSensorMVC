<?php ob_start(); ?>

	<tr>
		<td class="champ_profil"><label for="autoecole">Auto-école</label></td>
		<td> 
			<select name="autoecole" id="formulaire_autoecole">
		       <option value="-" <?php if ($utilisateur['id_autoecole'] == NULL) echo 'selected' ; ?>>-</option>
		       <option value="1" <?php if ($utilisateur['id_autoecole'] == 1) echo 'selected' ; ?>>Id 1</option>
		       <option value="2" <?php if ($utilisateur['id_autoecole'] == 2) echo 'selected' ; ?>>Id 2</option>
		       <option value="3" <?php if ($utilisateur['id_autoecole'] == 3) echo 'selected' ; ?>>Id 3</option>
		       <option value="4" <?php if ($utilisateur['id_autoecole'] == 4) echo 'selected' ; ?>>Id 4</option> 
			</select>
		</td>
	</tr>	

<?php $autoecole = ob_get_clean(); ?>

<?php require("profilModifierTemplate.php"); ?>
