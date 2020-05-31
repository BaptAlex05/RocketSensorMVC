<?php ob_start(); ?>

	<div class="bouton">
		<a href="/RocketSensorMVC/controller/faq.php?page=question">Poser une question</a>
	</div>

<?php $poserquestion = ob_get_clean(); ?>

<?php require("faqPublicTemplate.php"); ?>
