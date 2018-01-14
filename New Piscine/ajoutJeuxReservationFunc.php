<?php
$servername = "localhost";
$username= "root";
$password = "";
$dbname = "piscine";

// Create connection
// $conn = new mysqli($servername, $username, $password, $dbname);
$myPDO = new PDO('mysql:host=localhost;dbname=piscine', 'root', '');
// $num = $_POST['numEditeur'];
$recu = $_POST['recu'];
$Retour=$_POST['Retour'];
$Don = $_POST['Don'];
$NumJeux = $_POST['jeuxID'];
$nombre = $_POST['nombre'];
$NumReservation = $_POST['NumReservation'];


if ($_POST['zoneEditeur'] == "1"){

	#Creer une zone editeur, si elle existe : ajoute à cette zone

}else{

	$NumJeux1 = "SELECT * from jeux where NumJeux=$NumJeux ";

	$NumJeux2 = $myPDO->query($NumJeux1);
	$Jeux = $NumJeux2->fetch();

	$zoneEditeur = 0;


}




#$categ = $_POST['codeCategorie'];


$sql = "INSERT INTO `concerner` VALUES (NULL,  '$NumReservation', '$NumJeux', '$NumZone', '$Nombre', '$Recu', '$Retour', 'don' )";
// $sql = "SELECT * FROM `editeur`";


//verification connexion base de donnes
if ($myPDO->query($sql) == TRUE) {
    //echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>";// . $conn->error;
}

// $conn->close();
?>
<html>
		<script type="text/javascript">location.href = 'reservation.php';</script>
</html>



