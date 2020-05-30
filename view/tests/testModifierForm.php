<?php ob_start(); ?>

  <!-- Deuxième formulaire pour modifier les valeurs des champs préremplis -->
  <form action="/RocketSensorMVC/controller/tests.php?page=modifierTraitement&id=<?=$test['id'] ?>" method="post">
    <p>
      <table id="profil_modifier_formulaire">

         <tr>
              <td class="champ_profil"><label for="nom">Nom</label></td>
              <td><input type="text" name="nom" id="nom" value="<?= htmlspecialchars($test['nom']); ?>" required /></td>
         </tr>
        <tr>
             <td class="champ_profil"><label for="description">Description</label></td>
             <td> <textarea name="description" id="description" required><?= htmlspecialchars($test['description']); ?> </textarea></td>
        </tr>
        <tr>
             <td class="champ_profil"><label for="capteur">Capteur</label></td>
             <td> <select name="capteur" id="capteur" required>
                <option value="Micro" <?php if ($test['capteur'] == 'Micro') echo 'selected' ; ?>>Micro</option>
                <option value="Capteur cardiaque" <?php if ($test['capteur'] == 'Capteur cardiaque') echo 'selected' ; ?>>Capteur cardiaque</option>
                <option value="Capteur de température" <?php if ($test['capteur'] == 'Capteur de température') echo 'selected' ; ?>>Capteur de température</option>
                <option value="Autre" <?php if ($test['capteur'] == 'Autre') echo 'selected' ; ?>>Autre</option>
                </select>
              </td>
         </tr> 
         <tr>
              <td class="champ_profil"><label for="duree">Durée en minutes</label></td>
              <td><input type="number" name="duree" id="duree" min="1" max="60" value="<?= htmlspecialchars($test['duree']); ?>" required /></td>
         </tr>
         <tr>
              <td class="champ_profil"><label for="deroulement">Déroulement</label></td>
              <td><textarea name="deroulement" id="deroulement" required><?= htmlspecialchars($test['deroulement']); ?> </textarea></td>
         </tr>


      </table>
      <div class="bouton">
          <input type="submit" value="Editer" />
          <a href = 'tests_admin.php'>Annuler</a>
      </div>
    </p>
  </form>

<?php $testForm = ob_get_clean(); ?>

<?php require("testModifierTemplate.php"); ?>