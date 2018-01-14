<!DOCTYPE html>
<html>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "piscine";

// Create connection
// $conn = new mysqli($servername, $username, $password, $dbname);
$myPDO = new PDO('mysql:host=localhost;dbname=piscine', 'root', '');
$num = $_POST['jeuxID'];
$nom = $_POST['nomJeux'];
$nb=$_POST['nb'];
$date = $_POST['date'];
$duree = $_POST['duree'];
//$editeur = $_POST['NumEditeur'];
//$categorie = $_POST['CodeCategorie'];

$sql = "UPDATE `jeux` SET nomJeux='".$nom."', NombreJoueur='".$nb."', DateSortie='".$date."', DureePartie='".$duree."' WHERE numJeux='".$num."'";



//verification connexion base de donnes
if ($myPDO->query($sql) == TRUE) {
    //echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>";// . $conn->error;
}

?>


<html>
	<script type="text/javascript">location.href = 'jeux.php';</script>
</html>
