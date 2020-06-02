<?php
	$title = htmlspecialchars($autoecole['nom']); 
	$page_on = 'auto-ecoles';
?>

<?php ob_start(); ?>
	
	<section>
    <h1>Ajouter une auto-école</h1>

     <p id="retour_liste_autoecoles"><a href="/RocketSensorMVC/controller/autoecoles.php">Retour à la liste des auto-écoles</a></p>

    <form action="/RocketSensorMVC/controller/autoecoles.php?page=modifierTraitement&id=<?= $_GET['id'] ?>" method="post">
      <p>
        <table id="profil_modifier_formulaire">
           <tr>
               <td class="champ_profil"><label for="nom">Nom</label></td>
               <td><input type="text" name="nom" id="nom" required value="<?= htmlspecialchars($autoecole['nom']); ?>" class="nom"/></td>
           </tr>
           <tr>
               <td class="champ_profil"><label for="licence">Licence</label></td>
               <td><input type="licence" name="licence" id="licence" required value="<?= htmlspecialchars($autoecole['licence']); ?>" class="nom" /></td>
           </tr>
           <tr>
              <td class="champ_profil"><label for="adresse">Adresse</label></td>
              <td><input type="adresse" name="adresse" id="adresse" required value="<?= htmlspecialchars($autoecole['adresse']); ?>"/></td>
           </tr>
           <tr>
              <td class="champ_profil"><label for="codepostal">Code Postal</label></td>
              <td><input type="codepostal" name="codepostal" id="codepostal" required value="<?= htmlspecialchars($autoecole['codepostal']); ?>" max=10 min=10 /></td>
           </tr>
           <tr>
              <td class="champ_profil"><label for="ville">Ville</label></td>
              <td><input type="ville" name="ville" id="ville" required value="<?= htmlspecialchars($autoecole['ville']); ?>" /></td>
           </tr>        
        </table>

        <div class="bouton">
            <input type="submit" value="Modifier" />  
        </div>

      </p>
    </form>


    </section>

<?php $content = ob_get_clean(); ?>

<?php require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/template.php"); ?>