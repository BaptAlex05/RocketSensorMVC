<?php session_start();

	require("dbConnect.php");

	function getTests($id_utilisateur){
		$bdd = dbConnect();
		$req = $bdd->prepare('SELECT liste_des_tests.id as id_test, liste_des_tests.nom AS nom, liste_des_tests.description, MAX(resultats_tests.score) AS score FROM liste_des_tests LEFT JOIN resultats_tests ON liste_des_tests.id = resultats_tests.id_test AND resultats_tests.id_utilisateur = ? GROUP BY liste_des_tests.id');
		$req->execute(array($id_utilisateur));

		return $req;
	}

?>