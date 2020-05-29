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
		require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/tests/testsListe.php");
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


	function test(){
		$test = getTest($_GET['id']);
		require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/tests/testDescription.php");
	}







