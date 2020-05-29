<?php 
	require("dbConnect.php");

	function checkEmail($mail) {
		$bdd = dbConnect();
		$req = $bdd->prepare('SELECT * FROM utilisateurs WHERE mail = ?');
		$req->execute(array($mail));
		$resultat = $req->fetch();

		return $resultat;
	}

	function addUser($nom, $prenom, $mail, $datenaissance, $motdepasse, $autoecole, $cle) {
		$bdd = dbConnect();
		$req = $bdd->prepare("INSERT INTO utilisateurs(nom, prenom, mail, datenaissance, motdepasse, id_autoecole, cle) VALUES (:nom, :prenom, :mail, :datenaissance, :motdepasse, :id_autoecole, :cle)");
		$req->execute(array(
			'nom' => $nom,
			'prenom' => $prenom,
			'mail' => $mail,
			'datenaissance' => $datenaissance,
			'motdepasse' => $motdepasse,
			'id_autoecole' => $autoecole,
			'cle' => $cle));
	}

	function getActif($mail) {
		$bdd = dbConnect();
		$req = $bdd->prepare('SELECT actif FROM utilisateurs WHERE mail = ?');
		$req->execute(array($mail));
		$resultat = $req->fetch();

		$actif = htmlspecialchars($resultat['actif']);

		return $actif;
	}

	function getCle($mail) {
		$bdd = dbConnect();
		$req = $bdd->prepare('SELECT cle FROM utilisateurs WHERE mail = ?');
		$req->execute(array($mail));
		$resultat = $req->fetch();

		$cle = htmlspecialchars($resultat['cle']);

		return $cle;
	}

	function activateUser($mail) {
		$bdd = dbConnect();
		$req = $bdd->prepare('UPDATE utilisateurs SET actif = 1 WHERE mail = ?');
		$req->execute(array($mail));
	}