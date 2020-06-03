<?php 

	session_start();

	if (isset($_GET['section'])) {
		if ($_GET['section'] == "cgu") {
			require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/cgu/cgu.php");
		}

		elseif ($_GET['section'] == "mentions_legales") {
			require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/mentions_legales/mentions_legales.php");
		}

		elseif ($_GET['section'] == "connexion") {
			require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/controller/connexion.php");
			connexion();
		}

		elseif ($_GET['section'] == "inscription") {
			require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/controller/inscription.php");
			inscription();
		}

		elseif ($_GET['section'] == "faq") {
			require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/controller/faq.php");
			faq();
		}

		elseif ($_GET['section'] == "contact") {
			require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/controller/contact.php");
			contact();
		}

		elseif ($_GET['section'] == "tests") {
			require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/controller/tests.php");
			tests();
		}

		elseif ($_GET['section'] == "autoecoles") {
			require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/controller/autoecoles.php");
			autoecoles();
		}

		elseif ($_GET['section'] == "utilisateurs") {
			require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/controller/utilisateurs.php");
			utilisateurs();
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
			
