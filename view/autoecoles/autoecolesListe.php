<?php
	$title = "Auto-écoles"; 
	$page_on = 'auto-ecoles';
?>

<?php ob_start(); ?>
	
	<section>
        <h1>Liste des auto-écoles</h1>


        <?php if (isset($alerte)) { ?>
          <p class="alerte"><?= $alerte ?></p>
        <?php } ?>


          </div>

          <table>
            <tr>
                <th class="autoecole_colonne1">Nom</th>
                <th class="autoecole_colonne2">N° licence</th>
                <th class="autoecole_colonne1">Adresse</th>
                <th class="autoecole_colonne2">Code postal</th>
                <th class="autoecole_colonne2">Ville</th>
            </tr>

            <?php $compteur = 0;
                  while ($autoecole = $autoecoles -> fetch()) {          
                    if ($compteur % 2 == 0) {
            ?> 
                  <tr class="line_pointer" onclick="document.location='/RocketSensorMVC/controller/autoecoles.php?page=autoecole&id=<?= $autoecole['id']; ?>';">
                    <td class="autoecole_colonne_boucle1"><?= htmlspecialchars($autoecole['nom']) ?></td>
                    <td class="autoecole_colonne_boucle1"><?= htmlspecialchars($autoecole['licence']) ?></td>
                    <td class="autoecole_colonne_boucle1"><?= htmlspecialchars($autoecole['adresse']) ?></td>
                    <td class="autoecole_colonne_boucle1"><?= htmlspecialchars($autoecole['codepostal']) ?></td>
                    <td class="autoecole_colonne_boucle1"><?= htmlspecialchars($autoecole['ville']) ?></td>
                  </tr>

            <?php } else { ?> 
                  <tr class="line_pointer" onclick="document.location='/RocketSensorMVC/controller/autoecoles.php?page=autoecole&id=<?= $autoecole['id']; ?>';"> 
                    <td class="autoecole_colonne_boucle2"><?= htmlspecialchars($autoecole['nom']) ?></td>
                    <td class="autoecole_colonne_boucle2"><?= htmlspecialchars($autoecole['licence']) ?></td>
                    <td class="autoecole_colonne_boucle2"><?= htmlspecialchars($autoecole['adresse']) ?></td>
                    <td class="autoecole_colonne_boucle2"><?= htmlspecialchars($autoecole['codepostal']) ?></td>
                    <td class="autoecole_colonne_boucle2"><?= htmlspecialchars($autoecole['ville']) ?></td>
                  </tr>
            <?php } 
                $compteur += 1;
              }
            ?>
        </table>

        <div class="bouton">
          <a href = "/RocketSensorMVC/controller/autoecoles.php?page=ajouter">Ajouter</a>
        </div>


    </section>

<?php $content = ob_get_clean(); ?>

<?php require($_SERVER['DOCUMENT_ROOT']."/RocketSensorMVC/view/template.php"); ?>