<?php

			//en tête
			include'inc/header.php';
			//connexion
 $myPDO = new PDO('mysql:host=localhost;dbname=piscine', 'root', '');
		?>
<middle>
		<!--Formulaire pour ajouter une catégorie-->
	    	<form method="POST" action="ajoutZoneEDFunc.php">
		<legend>Zone</legend>
<p>
<?php
 //Editeurs
    $sql = "SELECT NumEditeur, NomEditeur
            FROM `editeur`";
    $q = $myPDO->query($sql);
    $editeurs = [];
    foreach($q as $ed){
        $editeurs[$ed['NomEditeur']] = $ed['NumEditeur'];//editeurs : tableau des noms d'editeurs
    }

?>


<label for="numEditeur">Nom de l'editeur</label> : <select name="numEditeur" id="numEditeur" required>
                <?php
                foreach($editeurs as $key => $value):
                echo '<option value="'.$value.'">'.$key.'</option>'; 
                endforeach;
                ?>
            </select>

<input type="submit" value="Ajouter la zone" />


</p>
</form>
<form method="POST" action="zone.php">
<input type="submit" value="Annuler" />
</form>

		</middle>
	</body>
</html>
