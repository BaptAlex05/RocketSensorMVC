<?php ob_start(); ?>

	<div class="faq_boutons">
		<p><a href="/RocketSensorMVC/controller/faq.php?page=supprimer&id=<?= $donnees['id']; ?>">Supprimer</a></p> 
		<p><a href="/RocketSensorMVC/controller/faq.php?page=modifier&id=<?= $donnees['id']; ?>">Modifier</a></p>
	</div>

<?php $optionsadmin = ob_get_clean(); ?>

<?php require("faqPublicTemplate.php"); ?>
