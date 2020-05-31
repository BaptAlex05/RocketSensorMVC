<?php 

	require("dbConnect.php");

	function getPublicQuestions() {
		$bdd = dbConnect();
		$req = $bdd->query('SELECT id, question, reponse FROM faq WHERE public = 1');

		return $req;
	}

	function ajouterQuestion($question) {
		$bdd = dbConnect();
		$req = $bdd->prepare('INSERT INTO faq(question) VALUES(:question)');
		$req->execute(array('question' => $question));

		return $req;
	}