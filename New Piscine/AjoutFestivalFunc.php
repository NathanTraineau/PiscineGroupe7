<!DOCTYPE html>
<html>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "piscine";

// Create connection
// $conn = new mysqli($servername, $username, $password, $dbname);
try 
{
	$myPDO = new PDO('mysql:host=localhost;dbname=piscine', 'root', '');
}
catch (Exception $e)
{
	die('Erreur : '. $e->getMessage());
}

$AnneeFestival = $_POST['AnneeFestival'];
$DateFestival =$_POST['DateFestival'];
$NombreTables = $_POST['NombreTables'];
$PrixPlaceStandard = $_POST['PrixPlaceStandard'];
// echo $num;

$IdEditeur = $_POST['infoID'];
$sql2 = "INSERT INTO `festival` VALUES ('$AnneeFestival', '$DateFestival', '$NombreTables', '$PrixPlaceStandard')";

if ($myPDO->query($sql2) == TRUE) {
    //echo "New record created successfully";
} else {
    echo "Error: " . $sql2 . "<br>";// . $conn->error;
}


// $conn->close();
?>

<html>
		

	
	<script type="text/javascript">location.href = 'acceuil.php';</script>
	

</html>