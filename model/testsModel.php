<?php

	require("dbConnect.php");

	function getTests($id_utilisateur){
		$bdd = dbConnect();
		$req = $bdd->prepare('SELECT tests.id as id_test, tests.nom AS nom, tests.description, MAX(resultats_tests.score) AS score FROM tests LEFT JOIN resultats_tests ON tests.id = resultats_tests.id_test AND resultats_tests.id_utilisateur = ? GROUP BY tests.id');
		$req->execute(array($id_utilisateur));

		return $req;
	}


	function getTest(){
		$req = $bdd->prepare('SELECT nom, description, capteur, duree, deroulement FROM liste_des_tests WHERE id = ?');
		$req->execute(array($_GET['id']));
		$donnees=$req->fetch();
	}

