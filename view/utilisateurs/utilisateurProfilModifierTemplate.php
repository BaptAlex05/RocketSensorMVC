<?php
	$title = "Modifier le profil de ".htmlspecialchars($utilisateur['prenom'])." ".htmlspecialchars($utilisateur['nom']); 
	$page_on = 'profil';
?>

<?php ob_start(); ?>	
	<section>	
		<h1>Modifier le profil</h1>
		<form action="/RocketSensorMVC/index.php?section=utilisateurs&page=utilisateurModifierTraitement&id=<?= $_GET['id'] ?>" method="post">
			<p>
				<table id="profil_modifier_formulaire">
				   <tr>
				       <td class="champ_profil"><label for="nom">Nom</label></td>
				       <td><input type="text" name="nom" id="nom" required value="<?= htmlspecialchars($utilisateur['nom']); ?>" class="nom"/></td>
				   </tr>
				   <tr>
				       <td class="champ_profil"><label for="prenom">Prénom</label></td>
				       <td><input type="prenom" name="prenom" id="prenom" required value="<?= htmlspecialchars($utilisateur['prenom']); ?>" /></td>
				   </tr>
				    <tr>
				   		<td class="champ_profil"><label for="datenaissance">Date de naissance</label></td>
				   		<td><input type="date" name="datenaissance" id="datenaissance" required value="<?= htmlspecialchars($utilisateur['datenaissance']); ?>" placeholder="aaaa-mm-jj" pattern="[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])"/></td>
				   </tr> 
				   <tr>
				   		<td class="champ_profil"><label for="mail">Adresse mail</label></td>
				   		<td><input type="mail" name="mail" id="mail" required value="<?= htmlspecialchars($utilisateur['mail']); ?>"/></td>
				   </tr>
				   
				   <?php if (isset($autoecole)) { echo $autoecole; } ?>	

				   <tr>
				   		<td class="champ_profil"><label for="role">Rôle</label></td>
				   		<td><select name="role" id="formulaire_role" required>
					           <option value="Élève" <?php if (htmlspecialchars($utilisateur['role']) == 'Élève') echo 'selected' ; ?>>Élève</option>
					           <option value="Moniteur" <?php if (htmlspecialchars($utilisateur['role']) == 'Moniteur') echo 'selected' ; ?>>Moniteur</option>
					           <option value="Administrateur" <?php if (htmlspecialchars($utilisateur['role']) == 'Administrateur') echo 'selected' ; ?>>Administrateur</option>
			        		</select>
			        	</td>
				   </tr>	  
				</table>

    			<div class="bouton">
					<input type="submit" value="Modifier" />	
				</div>
			</p>
		</form>
	</section>

<?php $content = ob_get_clean(); ?>

<?php require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/template.php"); ?>