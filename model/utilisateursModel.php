<?php 
	require("dbConnect.php");

	function getUserProfil($id) {
		$bdd = dbConnect();
		$req = $bdd->prepare('SELECT nom, prenom, mail, id_autoecole, role, DATE_FORMAT(datenaissance, \'%d/%m/%Y\') AS datenaissance FROM utilisateurs WHERE id = ?');
		$req->execute(array($id));
		$utilisateur = $req->fetch();

		return $utilisateur;
	}

	function getAutoecole($id_autoecole) {
		$bdd = dbConnect();
		$req = $bdd->prepare('SELECT id, nom, ville FROM autoecoles WHERE id = ?');
		$req->execute(array($id_autoecole));
		$autoecole = $req->fetch();

		return $autoecole;
	}

	function getUserModifierProfil($id) {
		$bdd = dbConnect();
		$req = $bdd->prepare('SELECT nom, prenom, mail, id_autoecole, datenaissance FROM utilisateurs WHERE id = ?');
		$req->execute(array($id));
		$utilisateur = $req->fetch();

		return $utilisateur;
	}

	function updateUser($id, $nom, $prenom, $mail, $datenaissance, $autoecole) {
		$bdd = dbConnect();
		$req = $bdd->prepare('UPDATE utilisateurs SET nom = :nom, prenom = :prenom, mail = :mail, datenaissance = :datenaissance, id_autoecole = :autoecole WHERE id = :id');
		$req->execute(array(
			'nom' => $nom,
			'prenom' => $prenom,
			'mail' => $mail,
			'datenaissance' => $datenaissance,
			'autoecole' => $autoecole,
			'id' => $id
			));
	}