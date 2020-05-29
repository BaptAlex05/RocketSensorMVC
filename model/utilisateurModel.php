<?php 
	require("dbConnect.php");

	function getUser($id) {
		$bdd = dbConnect();
		$req = $bdd->prepare('SELECT nom, prenom, mail, id_autoecole, role FROM utilisateurs WHERE id = ?');
		$req->execute(array($id));
		$utilisateur = $req->fetch();

		return $utilisateur;
	}