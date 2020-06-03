<?php 
	require("dbConnect.php");

	function getUserProfil($id) {
		$bdd = dbConnect();
		$req = $bdd->prepare('SELECT nom, prenom, mail, id_autoecole, role, actif, DATE_FORMAT(datenaissance, \'%d/%m/%Y\') AS datenaissance FROM utilisateurs WHERE id = ?');
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

	function getAutoecoles() {
		$bdd = dbConnect();
		$autoecoles = $bdd->query('SELECT id, nom, ville FROM autoecoles');

		return $autoecoles;
	}

	function getUserModifierProfil($id) {
		$bdd = dbConnect();
		$req = $bdd->prepare('SELECT nom, prenom, mail, id_autoecole, datenaissance, role FROM utilisateurs WHERE id = ?');
		$req->execute(array($id));
		$utilisateur = $req->fetch();

		return $utilisateur;
	}

	function updateSelfUser($id, $nom, $prenom, $mail, $datenaissance, $autoecole) {
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

	function getUsers() {
		$bdd = dbConnect();
		$utilisateurs = $bdd->query("SELECT utilisateurs.id AS id, utilisateurs.nom AS nom, utilisateurs.prenom AS prenom, utilisateurs.mail AS mail, utilisateurs.role AS role, DATE_FORMAT(utilisateurs.datenaissance, '%d/%m/%Y') AS datenaissance, autoecoles.nom AS autoecole_nom, autoecoles.ville AS autoecole_ville FROM utilisateurs LEFT JOIN autoecoles ON utilisateurs.id_autoecole = autoecoles.id ORDER BY utilisateurs.nom ASC");

		return $utilisateurs;
	}

	function updateUser($id, $nom, $prenom, $mail, $datenaissance, $role, $autoecole) {
		$bdd = dbConnect();
		$req = $bdd->prepare('UPDATE utilisateurs SET nom = :nom, prenom = :prenom, mail = :mail, datenaissance = :datenaissance, id_autoecole = :autoecole, role = :role WHERE id = :id');
		$req->execute(array(
			'nom' => $nom,
			'prenom' => $prenom,
			'mail' => $mail,
			'datenaissance' => $datenaissance,
			'autoecole' => $autoecole,
			'role' => $role,
			'id' => $id
			));

		return $req;
	}

	function supprimerUser($id) {
		$bdd = dbConnect();
		$req = $bdd->prepare('DELETE FROM utilisateurs WHERE id = ?');
		$req->execute(array($id));

		return $req;
	}

	function setActif($id, $actif) {
		$bdd = dbConnect();
		$req = $bdd->prepare('UPDATE utilisateurs SET actif = :actif WHERE id = :id');
		$req->execute(array(
			'id' => $id,
			'actif' => $actif
		));

		return $req;
	}
