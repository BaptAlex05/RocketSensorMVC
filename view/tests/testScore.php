<?php
	$title = "Passer un test"; 
	$page_on = 'passerTest';
?>

<?php ob_start(); ?>
	
	<section>

    <h1><?= htmlspecialchars($test['nom']); ?></h1>

    <div id="test_score">
        <p> Vous avez obtenu le score : <strong><?= $score;?></strong></p>

        <!-- Condition validation du test -->
        <?php if ($score >= 75) { ?>
            <p>Bravo, vous avez <strong>validé</strong> ce test !</p>
        <?php } else { ?>
            <p>Vous n'avez pas validé ce test. Veuillez réessayer plus tard.</p>
        <?php } ?>
    </div>

    <div class="bouton">
        <a href='tests.php'>Retour à la liste des tests</a>
    </div>

  </section>


<?php $content = ob_get_clean(); ?>

<?php require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/template.php"); ?>