<?php ob_start(); ?>
	<p class="alerte">Les deux mots de passe saisis ne semblent pas correspondre. Merci de réessayer.</p>
<?php $alerte = ob_get_clean(); ?>

<?php require("inscriptionForm.php"); ?>