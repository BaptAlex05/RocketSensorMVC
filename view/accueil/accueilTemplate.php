<?php
	$title = "Accueil"; 
	$page_on = 'accueil';
?>


<?php ob_start(); ?>

	<div id="accueil_welcome">
		<div class="accueil_wrapper">
			<div class="accueil_content">
				<h1>Bienvenue</h1>
				<p class="accueil_descendre"><img onclick="location.href='#accueil_section';" src="../../public/images/down-arrow.png"></p>
			</div>
		</div>
	</div>

	<section id="accueil_section">
		<div id="accueil_contenu">

			<div class="accueil_presentation">
				<p><img src="../../public/images/bamboo.png" class="accueil_image"></p>
				<h2>Qui sommes nous ?</h2>
				<p><em>Bamboo</em> est une start-up composée de 5 personnes ambitieuses et dynamiques. Nous sommes heureux de vous proposer <strong>Rocket Sensor</strong> : un système de mesures psychotechniques permettant d’évaluer certaines aptitudes nécessaires à la conduite routière.</p>
			</div>

			<div class="accueil_separation">
			</div>

			<div class="accueil_presentation">
				<p><img src="../../public/images/rocket-sensor.png" class='accueil_image'></p>
				<h2>Un produit innovant : Rocket Sensor</h2>
				<p>Dans le besoin de s’assurer que les futurs conducteurs sont parfaitement en alerte et prêts à réagir en toute circonstance, nous avons conçu <strong>Rocket Sensor</strong>. Cette solution innovante  permet de moderniser les tests psychotechniques et ainsi garantir la sécurité de tous.</p>
			</div>

			<div class="accueil_separation">
			</div>

			<div class="accueil_presentation">
				<p><img src="../../public/images/infinite-measures.png" class='accueil_image'></p>
				<h2>Infinite Measures</h2>
				<p>La société <em>Infinite Measures</em> a lancé un appel d'offre auquel la start-up <em>Bamboo</em> a répondu en développant la solution <stron>Rocket Sensor</stron>. <strong>Rocket Sensor</strong> est donc sa propriété et tous les droits lui sont réservés.</p>
			</div>

			<div class="accueil_separation">
			</div>


			<div clas="accueil_presentation">
				<div id="accueil_liens_utiles">

					<?= $liens_utiles ?>

					<div class="accueil_lien_utile">
						<a href="faq.php">
							<p><img src="../../public/images/faq.png"></p>
							<h3>FAQ</h3>
						</a>
					</div>

					<div class="accueil_lien_utile">
						<a href="contact.php">
							<p><img src="../../public/images/contact.png"></p>
							<h3>Nous contacter</h3>
						</a>
					</div>
				</div>
			</div>
		</div>
	</section>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>