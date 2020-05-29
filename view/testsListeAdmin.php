<?php
	$title = "Tests"; 
	$page_on = 'tests';
?>

<?php ob_start(); ?>

  <section>

        <div id="head_tests">
          <h1>Liste des tests</h1>
          <p>Retrouvez la liste des tests disponibles</p>

          <!-- Message de confirmation -->
          <?php if (isset($alerte)) { ?>
            <p class="alerte"><?= $alerte ?></p>
          <?php } ?>
        </div>

        <table id="tableau_liste">
          <tr>
              <th class="tests_colonne1"> Test </th>
              <th class="tests_colonne2">Description</th>
          </tr>

          <?php
            $compteur=0;

            // On affiche chaque entrée une à une
            while ($donnees = $reponse->fetch())
            {
              if ($compteur%2==0){
          ?>

                <a href ="test.php?id=<?= $donnees['id']; ?>">
                <tr class="couleur1_tab" onclick="document.location='test.php?id=<?= $donnees['id']; ?>';">
                    <td class="tests_colonne1"><a href ="test.php?id=<?= $donnees['id']; ?>"><?php echo $donnees['nom'] ?></a></td>
                    <td class="tests_colonne2"><?php echo $donnees['description'] ?></td>
                </tr>
                </a>
          
          <?php 
              }
              else{
          ?>

                <a href ="test.php?id=<?= $donnees['id']; ?>">
                <tr class="couleur2_tab" onclick="document.location='test.php?id=<?= $donnees['id']; ?>';">
                    <td class="tests_colonne1"> <a href ="test.php?id=<?= $donnees['id']; ?>"><?php echo $donnees['nom'] ?> </a> </td>
                    <td class="tests_colonne2"> <?php echo $donnees['description'] ?> </td>
                </tr>
                </a>
          
          <?php
              }
              $compteur++;
            }
          ?>

       </table>



      <div id="test_administateur">
        <?php
        
        if ($_SESSION['role'] == 'Administrateur'){
          //echo $_SESSION['role'] ;
        
        
          ?>
          <div class="bouton">
            <a href = 'test_ajout.php'>Ajouter</a>
            <a href = 'test_modifier.php'>Editer</a>
            <a href = 'test_supp.php'>Supprimer</a>
          </div>

          <?php
        }
        ?>
      </div>

    </section>
	
	
<?php $content = ob_get_clean(); ?>

<?php require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/template.php"); ?>