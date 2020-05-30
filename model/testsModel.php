<?php

	require("dbConnect.php");

	function getTests($id_utilisateur){
		$bdd = dbConnect();
		$req = $bdd->prepare('SELECT tests.id as id_test, tests.nom AS nom, tests.description, MAX(resultats_tests.score) AS score FROM tests LEFT JOIN resultats_tests ON tests.id = resultats_tests.id_test AND resultats_tests.id_utilisateur = ? GROUP BY tests.id');
		$req->execute(array($id_utilisateur));

		return $req;
	}

	function getTestsAdmin(){
		$bdd = dbConnect();
		$tests = $bdd->query('SELECT id, nom, description FROM tests ORDER BY id LIMIT 0,20');

		return $tests;
	}

	function getTest($id_test){
		$bdd = dbConnect();
		$req = $bdd->prepare('SELECT id, nom, description, capteur, duree, deroulement FROM tests WHERE id = ?');
		$req->execute(array($id_test));
		$test = $req->fetch();

		return $test;
	}

	function ajouterTest($nom, $description, $capteur, $duree, $deroulement) {
		$bdd = dbConnect();
		$req = $bdd->prepare('INSERT INTO tests(nom, description, capteur, duree, deroulement) VALUES(:nom, :description, :capteur, :duree, :deroulement)');
    	$req->execute(array(
		    'nom' => $nom,
		    'description' => $description,
		    'capteur' => $capteur,
		    'duree' => $duree,
			'deroulement' => $deroulement));
	}

	function modifierTest($nom, $description, $capteur, $duree, $deroulement, $id) {
	$bdd = dbConnect();

	$req = $bdd->prepare('UPDATE tests SET nom=:nom, description=:description, capteur=:capteur, duree=:duree, deroulement=:deroulement WHERE id = :id');
	    $req->execute(array(
		    'nom' => $nom,
		    'description' => $description,
		    'capteur' => $capteur,
		    'duree' => $duree,
			'deroulement' => $deroulement,
			'id' => $id));
	}

	function getTestsNoms(){
		$bdd = dbConnect();
		$tests = $bdd->query('SELECT id, nom FROM tests');

		return $tests;
	}

	function supprimerTest($nom) {
		$bdd = dbConnect();
		$req = $bdd->prepare('DELETE FROM tests WHERE nom = :nom');
	    $req->execute(array('nom' => $nom));
	    
	}

