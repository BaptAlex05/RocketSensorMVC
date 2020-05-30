<?php
	session_start();

	require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/model/testsModel.php");

	if (isset($_GET['page'])) {
		if ($_GET['page'] == "test") {
			test();
		}

		else {
			listeTests();
		}
	}

	else {
		listeTests();
	}


	function listeTests(){
		$tests = getTests($_SESSION['id']);

		if (isset($_GET['action'])) {
			if ($_GET['action'] == 1) {
				$alerte = "Une erreur est survenue. Veuillez réessayer.";
				require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/tests/testsListe.php");
			}

			else {
				require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/tests/testsListe.php");
			}
		}

		else {
			require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/tests/testsListe.php");
		}

	}

	function listeTestsAdmin(){
		$tests = getTests();

		//Messages de confirmation après ajout, edition, suppression d'un test
		if (isset($_GET['action'])) {

		    if ($_GET['action'] == 1) {
		     	$alerte = "Le test a bien été ajouté !" ;
		     	require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/tests/testsListeAdmin.php");
		    }
			elseif ($_GET['action'] == 2) {
		        $alerte = "Le test a bien été édité !" ;
		        require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/tests/testsListeAdmin.php");
		    }
		    elseif ($_GET['action'] == 3) {
		        $alerte= "Une erreure s'est produite. Veuillez réessayer." ;
		        require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/tests/testsListeAdmin.php");
		    }
		    elseif ($_GET['action'] == 4) {
		        $alerte = "Le test a bien été supprimé !" ;
		        require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/tests/testsListeAdmin.php");
		    }
		    else{
		    	require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/tests/testsListeAdmin.php");
		    }
		}
		else{
		   	require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/tests/testsListeAdmin.php");
		}
	}


	function test() {
		if (isset($_GET['id'])) {
			$test = getTest($_GET['id']);
			
			if ($_SESSION['role'] == 'Élève') {
				require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/tests/testDescriptionEleve.php");
			}

			else {
				require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/tests/testDescription.php");
			}
		}

		else {
			header("Location: /RocketSensorMVC/controller/tests.php?action=1");
		}

		//EVENTUELLEMENT VERIFIER QUE LE TEST EXISTE BIEN DANS LA BDD
	}







