<?php ob_start(); ?>
	<p class="alerte">Il semblerait qu'un utilisateur soit déjà enregistré avec ces informations. Merci de saisir des informations valides.</p>
<?php $alerte = ob_get_clean(); ?>

<?php require("inscriptionForm.php"); ?>