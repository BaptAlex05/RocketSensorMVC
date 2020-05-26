<header>
	<div id="bloc_header">
		<div id="logo">
			<a href="index.php"><img src="../../public/images/rocket-sensor-by-im.png" alt="logo_rocketsensor"></a>
		</div>
		<nav id="menu_principal">
			<ul>
				<li <?php if ($page_on == 'accueil') {echo ' id="page_on"';} ?>><a href="index.php">Accueil</a></li>
	        	<li <?php if ($page_on == 'faq') {echo ' id="page_on"';} ?>><a href="faq.php">Faq</a></li>
	        	<li <?php if ($page_on == 'contact') {echo ' id="page_on"';} ?>><a href="contact.php">Contact</a></li>
			</ul>
		</nav>

		<nav id="menu_utilisateur">
			<?= $menu_utilisateur ?>
		</nav>
	</div>
</header>