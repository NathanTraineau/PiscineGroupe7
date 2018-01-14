<?php
	include'inc/header.php';
	//include'conexion2.php';

    $myPDO = new PDO('mysql:host=localhost;dbname=piscine', 'root', '');

    // $sql = "SELECT * FROM `editeur` WHERE numEditeur='".$num."'";
    $sql = "SELECT NumJeux, NomJeux, NombreJoueur, DateSortie, DureePartie 
            FROM `jeux` WHERE NumJeux='".$_POST['jeuxID']."' ";
    $row = $myPDO->query($sql)->fetch();

?>
<middle>
<form action= "modifJeuxFunc.php" method="POST" >
    <legend>Editeur</legend>
    <p>
        <label for="NomJeux">Modifier le nom du jeux</label> : <input type="text" name="nomJeux" id="nomJeux" value="<?php echo $row['NomJeux']; ?>" />
    </p>
                    
    <p>

        <label for="NombreJoueur">Mofifier le nombre de joueur</label> : <input type="text" name="nb" id="nb" value="<?php echo $row['NombreJoueur']; ?>" />


    </p>
    <p>
        <label for="DateSortie">modifier la date de sortie</label> : <input type="text" name="date" id="date" value="<?php echo $row['DateSortie']; ?>" />

    </p>
    <p>

        <label for="DureePartie">Modifier la Duree de la partie</label> : <input type="text" name="duree" id="duree" value="<?php echo $row['DureePartie']; ?>" />
        <!--<label for="Num">NUM </label><input type="number" name="numEditeur" id="numEditeur" required/>-->

    </p>
    <?php
		if (!empty($_POST['infoID'])){
		?>
    		<input type="hidden" name="infoID" value="<?php echo $num; ?>" />
    	<?php } ?>

    <input type="hidden" name="jeuxID" value="<?php echo $_POST['jeuxID']; ?>" />
    <input type="submit" value="Save" id = "add" />
</form>
</middle>
</body>
</html>