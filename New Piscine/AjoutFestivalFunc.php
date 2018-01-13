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

<<<<<<< HEAD

$sql2 = "INSERT INTO `Festival` VALUES ($AnneeFestival, $DateFestival,$NombreTables, $PrixPlaceStandard  )";

if ($myPDO->query($sql2) == TRUE) {
    //echo "New record created successfully";
    ?>
    <html>
		

	
	<script type="text/javascript">location.href = 'login.php';</script>
	

	</html>
<?php
=======
$IdEditeur = $_POST['infoID'];
$sql2 = "INSERT INTO `festival` VALUES ('$AnneeFestival', '$DateFestival', '$NombreTables', '$PrixPlaceStandard')";

if ($myPDO->query($sql2) == TRUE) {
    //echo "New record created successfully";
>>>>>>> 76cb15ec5be9351bec9c30bd15ed5d37a66ee907
} else {
    echo "Error: " . $sql2 . "<br>";// . $conn->error;
}


// $conn->close();
?>

<<<<<<< HEAD
=======
<html>
		

	
	<script type="text/javascript">location.href = 'acceuil.php';</script>
	

</html>
>>>>>>> 76cb15ec5be9351bec9c30bd15ed5d37a66ee907
