<?php ob_start(); ?>

	<div class="bouton">
        <a href = "/RocketSensorMVC/controller/tests.php?page=score&id_test=<?= $_GET['id']; ?>">Commencer</a>
  	</div>
	
<?php $bouton_commencer = ob_get_clean(); ?>

<?php require("testDescriptionTemplate.php"); ?>