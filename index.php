<?php 

	session_start();

	if (isset($_GET['section'])) {
		if ($_GET['section'] == "cgu") {
			require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/cgu/cgu.php");
		}

		elseif ($_GET['section'] == "mentions_legales") {
			require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/mentions_legales/mentions_legales.php");
		}

		else {
			require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/controller/accueil.php");
			accueil();
		}
	}

	else {
		require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/controller/accueil.php");
		accueil();
	}
			
