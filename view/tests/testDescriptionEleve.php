<?php ob_start(); ?>

	<div class="bouton">
        <a href = "/RocketSensorMVC/index.php?section=tests&page=score&id=<?= $_GET['id']; ?>">Commencer</a>
  	</div>
	
<?php $bouton_commencer = ob_get_clean(); ?>

<?php require("testDescriptionTemplate.php"); ?>