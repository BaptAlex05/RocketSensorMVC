<?php 

	require("dbConnect.php");

	function getPublicQuestions() {
		$bdd = dbConnect();
		$questions = $bdd->query('SELECT id, question, reponse FROM faq WHERE public = 1');

		return $questions;
	}

	function getQuestionsAdmin() {
		$bdd = dbConnect();
		$questions = $bdd->query('SELECT id, question, reponse FROM faq WHERE public = 0');

		return $questions;
	}

	function getQuestion($id) {
		$bdd = dbConnect();
		$req = $bdd->prepare('SELECT question FROM faq WHERE id = ?');
		$req->execute(array($id));	
		$question = $req->fetch();

		return $question;
	}

	function getQuestionReponse($id) {
		$bdd = dbConnect();
		$req = $bdd->prepare('SELECT question, reponse FROM faq WHERE id = ?');
		$req->execute(array($id));	
		$resultat=$req->fetch();

		return $resultat;	
	}

	function ajouterQuestion($question) {
		$bdd = dbConnect();
		$questions = $bdd->prepare('INSERT INTO faq(question) VALUES(:question)');
		$questions->execute(array('question' => $question));

		return $questions;
	}

	function ajouterReponse($question, $reponse, $id) {
		$bdd = dbConnect();
		$req = $bdd->prepare('UPDATE faq SET question = :question, reponse = :reponse, public = 1 WHERE id = :id');
        $req->execute(array(
            'question' => $question,
            'reponse' => $reponse,
            'id' => $id));

        return $req;
	}

	function supprimerQuestion($id) {
		$bdd = dbConnect();
		$req = $bdd->prepare('DELETE FROM faq WHERE id = ?');
        $req->execute(array($id));

        return $req;
	}

	function modifierFaq($question, $reponse, $id) {
		$bdd = dbConnect();
		$req = $bdd->prepare('UPDATE faq SET question = :question, reponse = :reponse WHERE id = :id');
        $req->execute(array(
            'question' => $question,
            'reponse' => $reponse,
            'id' => $id));

        return $req;
	}