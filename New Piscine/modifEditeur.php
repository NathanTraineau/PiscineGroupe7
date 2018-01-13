<?php
	include'inc/header.php';
	//include'conexion2.php';

    $myPDO = new PDO('mysql:host=localhost;dbname=piscine', 'root', '');

    // $sql = "SELECT * FROM `editeur` WHERE numEditeur='".$num."'";
    $sql = "SELECT NumEditeur, NomEditeur, VilleEditeur, RueEditeur, CodePostaleEditeur 
            FROM `editeur` WHERE numEditeur='".$_POST['editeurID']."' ";
    $row = $myPDO->query($sql)->fetch();

?>
<middle>
<form action= "modifEditeurFunc.php" method="POST" >
    <legend>Editeur</legend>
    <p>
        <label for="NomEditeur">Modifier le nom de l'Editeur</label> : <input type="text" name="nomEditeur" id="nomEditeur" value="<?php echo $row['NomEditeur']; ?>" />
    </p>
                    
    <p>
        <label for="Ville">Mofifier le ville</label> : <input type="text" name="ville" id="ville" value="<?php echo $row['VilleEditeur']; ?>" />

    </p>
    <p>
        <label for="Rue">modifier la rue</label> : <input type="text" name="Rue" id="Rue" value="<?php echo $row['RueEditeur']; ?>" />

    </p>
    <p>
        <label for="CodePostale">Modifier le code postale</label> : <input type="text" name="code" id="code" value="<?php echo $row['CodePostaleEditeur']; ?>" />
        <!--<label for="Num">NUM </label><input type="number" name="numEditeur" id="numEditeur" required/>-->

    </p>
    <input type="hidden" name="editeurID" value="<?php echo $_POST['editeurID']; ?>" />
    <input type="submit" value="Save" id = "add" />
</form>
</middle>
</body>
</html>