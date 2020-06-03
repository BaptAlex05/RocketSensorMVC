<header>
	<div id="bloc_header">
		<div id="logo">
			<a href="/RocketSensorMVC/index.php"><img src="/RocketSensorMVC/public/images/rocket-sensor-by-im.png" alt="logo_rocketsensor"></a>
		</div>
		<nav id="menu_principal">
			<ul>
				<li <?php if ($page_on == 'accueil') {echo ' id="page_on"';} ?>><a href="/RocketSensorMVC/index.php">Accueil</a></li>
	        	<li <?php if ($page_on == 'faq') {echo ' id="page_on"';} ?>><a href="/RocketSensorMVC/index.php?section=faq">Faq</a></li>
	        	<li <?php if ($page_on == 'contact') {echo ' id="page_on"';} ?>><a href="/RocketSensorMVC/index.php?section=contact">Contact</a></li>
			</ul>
		</nav>

		<nav id="menu_utilisateur">
			<?= $menu_utilisateur ?>
		</nav>
	</div>
</header>