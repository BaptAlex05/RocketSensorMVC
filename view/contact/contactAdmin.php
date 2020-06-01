<?php
	$title = "Contact"; 
	$page_on = 'contact';
?>

<?php ob_start(); ?>
	<section>	

		<div id="head_contact">
			<h1>Messagerie</h1>
			<p>Retrouvez ici la liste de tous les messages envoyés depuis le formulaire de contact.</p>
		</div>
		
		<?php if (isset($alerte)) { ?>
			<p class="alerte"><?= $alerte ?></p>
		<?php } ?>

		<?php if (isset($message)) { ?>
			<p class="alerte"><?= $message ?></p>
		<?php } ?>

		<?php while ($message = $messages->fetch()) { ?>

			<div class="contact_admin_post">
				<div class="contact_admin_message">
					<table>
						<tr>
							<th>De :</th> <td><?= htmlspecialchars($message['prenom']); ?> <?= htmlspecialchars($message['nom']); ?></td>
							<th>Mail : </th><td><?= htmlspecialchars($message['mail']); ?></td>
							<th>Le : </th><td><?= htmlspecialchars($message['date']); ?></td>
						</tr>

					</table>
					<p><?= substr(htmlspecialchars($message['message']), 0, 500); ?> ...</p>
				</div>

				<div class="contact_admin_boutons">
					<div class="bouton">
						<a href="/RocketSensorMVC/controller/contact.php?page=reponse&id=<?=htmlspecialchars($message['id']);?>">Répondre</a>
					</div>
					<div class="bouton">
						<a id = "supprimer" href="/RocketSensorMVC/controller/contact.php?page=supprimer&id=<?=htmlspecialchars($message['id']);?>">Supprimer</a>
					</div>
				</div>
			</div>

		<?php } ?>

	</section>

<?php $content = ob_get_clean(); ?>

<?php require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/template.php"); ?>