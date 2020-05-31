<?php
	$title = "Modifier un test"; 
	$page_on = 'modifierTest';
?>

<?php ob_start(); ?>

  <section>

    <div id="head_tests">
      <h1>Editer un test</h1>
    </div>


    <!-- Premier formulaire pour choisir le test à modifier -->
    <form id="formulaire" action="/RocketSensorMVC/controller/tests.php?page=modifier" method="post">
      <table>
        <tr>
           <td class="champ_profil"><label for="id">Choisir un test</label></td>
           <td> <select name="id" id="nom" onchange="this.form.submit()" required>
            <option value="default" > - </option>
            <?php
              while ($test = $tests->fetch()){
            ?> 
              <option value="<?php echo $test['id']; ?>" <?php if (isset($_POST['id']) && $test['id'] == $_POST['id']) { echo 'selected'; }?>><?= htmlspecialchars($test['nom']); ?> </option>
            <?php } ?>
              </select>
            </td>
        </tr>
      </table>
    </form>

    <?php if (isset($testForm)) { echo $testForm; } ?>

  </section>


<?php $content = ob_get_clean(); ?>

<?php require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/template.php"); ?>