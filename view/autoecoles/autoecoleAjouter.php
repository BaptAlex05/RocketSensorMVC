<?php
	$title = "Ajouter auto-école"; 
	$page_on = 'auto-ecoles';
?>

<?php ob_start(); ?>
	
	<section>
    <h1>Ajouter une auto-école</h1>

     <p id="retour_liste_autoecoles"><a href="/RocketSensorMVC/controller/autoecoles.php">Retour à la liste des auto-écoles</a></p>

    <form action="/RocketSensorMVC/controller/autoecoles.php?page=ajouterTraitement" method="post">
        <p>
            <table id="profil_modifier_formulaire">
              <tr>
                   <td class="champ_profil"><label for="nom">Nom</label></td>
                   <td><input type="text" name="nom" id="nom" class="nom" required></td>
              </tr>
              <tr>
                   <td class="champ_profil"><label for="licence">Licence</label></td>
                   <td><input type="text" name="licence" id="licence" class="nom" required></td>
              </tr>
               <tr>
                    <td class="champ_profil"><label for="adresse">Adresse</label></td>
                    <td><input type="text" name="adresse" id="adresse" required /></td>
               </tr>
               <tr>
                    <td class="champ_profil"><label for="codepostal">Code Postal</label></td>
                    <td><input type="text" name="codepostal" id="codepostal" max=10 min=10 required /></td>
               </tr>
               <tr>
                    <td class="champ_profil"><label for="ville">Ville</label></td>
                    <td><input type="text" name="ville" id="ville" required /></td>
               </tr>
            </table>

            <div class="bouton">
                <input type="submit" value="Ajouter" />
            </div>
        </p>
    </form>


    </section>

<?php $content = ob_get_clean(); ?>

<?php require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/template.php"); ?>