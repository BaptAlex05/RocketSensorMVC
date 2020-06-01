<?php 
	require("dbConnect.php");

	function ajouterMessage($nom, $prenom, $mail, $message) {
		$bdd = dbConnect();
		$req = $bdd->prepare('INSERT INTO contact(nom, prenom, mail, message, date) VALUES(:nom, :prenom, :mail, :message, NOW())');
		$req->execute(array(
			'nom' => $nom,
			'prenom' => $prenom,
			'mail' => $mail,
			'message' => $message
		));

		return $req;
	}

	function getMessages() {
		$bdd = dbConnect();
		$messages = $bdd->query('SELECT id, nom, prenom, mail, message, DATE_FORMAT(date, \'%d/%m/%Y\') AS date FROM contact ORDER BY id DESC');
		return $messages;
	}

	function getMessage($id) {
		$bdd = dbConnect();
		$req = $bdd->prepare('SELECT nom, prenom, mail, message, DATE_FORMAT(date, \'%d/%m/%Y\') AS date FROM contact WHERE id = ?');
		$req->execute(array($id));
		$message = $req->fetch();

		return $message;
	}

	function supprimerContact($id) {
		$bdd = dbConnect();
		$req = $bdd->prepare('DELETE FROM contact WHERE id = ?');
		$req->execute(array($id));

		return $req;
	}