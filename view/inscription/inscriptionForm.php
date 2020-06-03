<?php
	$title = "Inscription"; 
	$page_on = 'inscription';
	$script = 'verifications';
?>

<?php ob_start(); ?>
	<section>		
		<div id="head_inscription">
			<h1>Inscription</h1>
			<p>Veuillez remplir le formulaire ci-dessous pour vous inscrire</p>
		</div>

		<?php if (isset($alerte)) { ?>
			<p class="alerte"><?= $alerte ?></p>
		<?php } ?>

		<form method="post" action="/RocketSensorMVC/controller/inscription.php?page=traitement" id="inscription">
			<div id="formulaire_inscription">
				<div id="inscription_colonne_1">
					 <p>
							<label for="nom">Nom</label><br/>
							<input type="text" name="nom" id="nom" required class="nom"/>
						</p>

						<p>
							<label for="prenom">Prénom</label><br/>
							<input type="text" name="prenom" id="prenom" required/>
						</p>

						<p id="datenaissance">
							<label for="datenaissance">Date de naissance</label><br/>	
							<input type="date" placeholder="aaaa-mm-jj" name="datenaissance" required pattern="[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])">
						</p>

				</div>

				<div id="inscription_colonne_2">
					<p>
							<label for="mail">Adresse mail</label><br/>
							<input type="email" name="mail" id="mail" required/>
						</p>

						<p>
							<label for="motdepasse">Mot de passe</label><br/>
							<input type="password" name="motdepasse" id="motdepasse" required/>
						</p>

						<p>
							<label for="motdepasse_bis">Saisir le mot de passe à nouveau</label><br/>
							<input type="password" name="motdepasse_bis" id="motdepasse_bis" required/>
						</p>

				</div>
			</div>

			<p id="champ_auto-ecole">
				<label for="autoecole">Auto-école (Facultatif)</label><br/>
				<select name="autoecole" id="formulaire_autoecole" required>
					<option value="0" selected> - </option>
					<?php while($autoecole = $autoecoles->fetch()) { ?>
	          			<option value="<?= $autoecole['id'] ?>"><?= htmlspecialchars($autoecole['nom']) ?> - <?= htmlspecialchars($autoecole['ville']) ?></option>
          			<?php } ?>
		        </select>
			</p>

			<p id="case_cgu">
		       <input type="checkbox" name="cgu" id="cgu" required/><label for="cgu">J'ai lu et j'accepte les <a href="/RocketSensorMVC/index.php?section=cgu">Conditions générales d'utilisation</a></label>
			</p>
			
			<div class="bouton">
				<input type="submit" value="S'inscrire" />	
			</div>
		</form>

		<p id="deja_inscrit">Déjà inscrit ? <a href="connexion.php">Connectez-vous</a></p>
	</section>

<?php $content = ob_get_clean(); ?>

<?php require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/template.php"); ?>