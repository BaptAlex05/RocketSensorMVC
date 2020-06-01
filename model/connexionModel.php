<?php 
	require("dbConnect.php");

	function getUser($mail) {
		$bdd = dbConnect();
		$req = $bdd->prepare('SELECT id, mail, motdepasse, nom, prenom, role, actif FROM utilisateurs WHERE mail = ?');
		$req->execute(array($mail));
		$utilisateur = $req->fetch();

		return $utilisateur;
	}

	function checkEmail($mail) {
		$bdd = dbConnect();
		$req = $bdd->prepare('SELECT * FROM utilisateurs WHERE mail = ?');
		$req->execute(array($mail));
		$resultat = $req->fetch();

		return $resultat;
	}

	function getUserCle($mail) {
		$bdd = dbConnect();
		$req = $bdd->prepare('SELECT cle FROM utilisateurs WHERE mail = ?');
		$req->execute(array($mail));
		$cle = $req->fetch();

		return $cle;
	}

	function setPassword($mail, $motdepasse) {
		$bdd = dbConnect();
		$req = $bdd->prepare('UPDATE utilisateurs SET motdepasse = :motdepasse WHERE mail = :mail');
		$req->execute(array(
			'motdepasse' => $motdepasse,
			'mail' => $mail));

		return $req;
	}