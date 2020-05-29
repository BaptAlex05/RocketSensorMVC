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

		else {
			listeTests();
		}
	}
	

	function listeTests(){
		$tests = getTests($_SESSION['id']);
		require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/tests/testsListe.php");
	}


	function test(){
		$test = getTest($_GET['id']);
		require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/tests/testDescription.php");
	}
