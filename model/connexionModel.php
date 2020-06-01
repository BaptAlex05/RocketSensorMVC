<?php 
	require("dbConnect.php");

	function getUser($mail) {
		$bdd = dbConnect();
		$req = $bdd->prepare('SELECT id, mail, motdepasse, nom, prenom, role, actif FROM utilisateurs WHERE mail = ?');
		$req->execute(array($mail));
		$utilisateur = $req->fetch();

		return $utilisateur;
	}