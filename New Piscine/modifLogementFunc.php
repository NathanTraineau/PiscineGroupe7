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
$ville = $_POST['VilleLogement'];
$rue=$_POST['RueLogement'];
$code = $_POST['CodePostaleLogement'];
$chambres= $_POST['NombreChambres'];
$cout=$_POST['CoutLongementNuit'];
$NomLogement=$_POST['NomLogement'];

$sql = "UPDATE `logement` SET NomLogement='".$NomLogement."', VilleLogement='".$ville."', RueLogement='".$rue."', CodePostaleLogement='".$code."', NombreChambres='".$chambres."', CoutLongementNuit='".$cout."' WHERE numLogement='".$_POST['LogementID']."'";




if ($myPDO->query($sql) == TRUE) {
    //echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>";// . $conn->error;
}

// $conn->close();
?>
<html>
		<script type="text/javascript">location.href = 'logement.php';</script>
</html>




