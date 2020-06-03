<?php
	$title = "Contact"; 
	$page_on = 'contact';
?>

<?php ob_start(); ?>
	<section>	
		<div id="head_contact">
			<h1>Contact</h1>
			<p>Pour contacter l'administrateur, veuillez saisir votre nom, prénom, adresse mail ainsi que votre message.</p>
		</div>

		<?php if (isset($alerte)) { ?>
			<p class="alerte"><?= $alerte ?></p>
		<?php } ?>

		<form method="post" action="/RocketSensorMVC/index.php?section=contact&page=traitement" id="inscription">
				<div id="formulaire_contact">
					<div id="contact_colonne_1">
						<p>
       						<label for="nom">Nom</label><br/>
       						<input type="text" name="nom" id="nom" <?php if (isset($nom)) { echo "value = \"$nom\""; } ?> required/>
       					</p>

       					<p>
       						<label for="prenom">Prénom</label><br/>
       						<input type="text" name="prenom" id="prenom" <?php if (isset($prenom)) { echo "value = \"$prenom\""; } ?> required/>
   						</p>
					</div>

					<div id="contact_colonne_2">
						<p>
       						<label for="mail">Adresse mail</label><br/>
       						<input type="email" name="mail" id="mail" <?php if (isset($mail)) { echo "value = \"$mail\""; } ?> required/>
       					</p>					
					</div>
				</div>

   		 		<div id="formulaire_contact1">
					<p id="message">		 	
       					<label for="message">Message</label><br />
       					<textarea name="message" id="message"></textarea>
   					</p>
   				</div>

				<div class="bouton">
					<input type="submit" value="Envoyer" />	
				</div>
			</form>

	</section>

<?php $content = ob_get_clean(); ?>

<?php require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/template.php"); ?>