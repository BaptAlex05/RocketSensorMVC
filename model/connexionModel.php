<?php 
	require("dbConnect.php");

	getUser($mail) {
		$bdd = dbConnect();
		$req = $bdd->prepare('SELECT id, motdepasse, nom, prenom, role, actif FROM utilisateurs WHERE mail = ?');
		$req->execute(array($mail));
		$utilisateur = $req->fetch();

		return $utilisateur;
	}