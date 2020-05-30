<?php
	$title = "Ajouter un test"; 
	$page_on = 'ajoutTest';
?>

<?php ob_start(); ?>
	
	<section>

    <div id="head_tests">
      <h1>Ajouter un test</h1>
    </div>

        <!-- Creation du formulaire contenants les champs obligatoires pour ajouter un test -->
        <form action="/RocketSensorMVC/controller/tests.php?page=ajouterTraitement" method="post">
            <p>
                <table id="profil_modifier_formulaire">
                  <tr>
                       <td class="champ_profil"><label for="nom">Nom</label></td>
                       <td><input type="text" name="nom" id="nom" required></td>
                  </tr>
                  <tr>
                       <td class="champ_profil"><label for="description">Description</label></td>
                       <td> <textarea name="description" id="description" required></textarea></td>
                  </tr>
                  <tr>
                       <td class="champ_profil"><label for="capteur">Capteur</label></td>
                       <td> <select name="capteur" id="capteur" required>
                          <option value="Micro">Micro</option>
                          <option value="Capteur cardiaque">Capteur cardiaque</option>
                          <option value="Capteur de température">Capteur de température</option>
                          <option value="Autre">Autre</option>
                          </select>
                        </td>
                   </tr> 
                   <tr>
                        <td class="champ_profil"><label for="duree">Durée en minutes</label></td>
                        <td><input type="number" name="duree" id="duree" min="1" max="60" required /></td>
                   </tr>
                   <tr>
                        <td class="champ_profil"><label for="deroulement">Déroulement</label></td>
                        <td><textarea name="deroulement" id="deroulement" required></textarea></td>
                   </tr>

                </table>
                <div class="bouton">
                    <input type="submit" value="Ajouter" />
                    <a href = 'tests_admin.php'>Annuler</a>    
                </div>
            </p>
        </form>

  </section>


<?php $content = ob_get_clean(); ?>

<?php require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/template.php"); ?>