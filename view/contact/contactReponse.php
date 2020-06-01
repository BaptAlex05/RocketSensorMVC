<?php
	$title = "Répondre au message"; 
	$page_on = 'contact';
?>

<?php ob_start(); ?>
	<section>	

		<h1>Répondre à un message</h1>

		<div id= "contact_admin_reponse">

			<p><a href="/RocketSensorMVC/controller/contact.php?page=admin">Retour à la liste des messages</a></p>


			<div id ="contact_admin_reponse_message">
				<table>
					<tr>
						<th>De :</th> <td><?= htmlspecialchars($message['prenom']); ?> <?= htmlspecialchars($message['nom']); ?></td>
						<th>Mail : </th><td><?= htmlspecialchars($message['mail']); ?></td>
						<th>Le : </th><td><?= htmlspecialchars($message['date']); ?></td>
					</tr>
				</table>
				<p id = "contact_admin_reponse_message_label">Message :</p>
				<p><?= nl2br(htmlspecialchars($message['message'])); ?></p>
			</div>


			<form method="post" action="/RocketSensorMVC/controller/contact.php?page=reponseTraitement&id=<?= $_GET['id'] ?>">
				<label for="reponse">Réponse</label><br/>
				<textarea name="reponse"></textarea>

				<input type="hidden" name="mail" value="<?= htmlspecialchars($message['mail']); ?>"/>
				<input type="hidden" name="message" value="<?= nl2br(htmlspecialchars($message['message'])); ?>"/>

				<div class="bouton">
					<input type="submit" value="Répondre et envoyer">
				</div>
			</form>
		</div>



	</section>

<?php $content = ob_get_clean(); ?>

<?php require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/template.php"); ?>