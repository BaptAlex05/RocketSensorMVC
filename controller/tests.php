<?php
	session_start();

	require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/model/testsModel.php");


	getListeTests();



	function getListeTests(){
		$tests = getTests($_SESSION['id']);
		require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/tests/testsListe.php");
	}

