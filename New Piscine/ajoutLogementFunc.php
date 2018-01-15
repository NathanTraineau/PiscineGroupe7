<!DOCTYPE html>
<html>

<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "piscine";


$myPDO = new PDO('mysql:host=localhost;dbname=piscine', 'root');

$ville = $_POST['VilleLogement'];
$rue=$_POST['RueLogement'];
$code = $_POST['CodePostaleLogement'];
$chambres= $_POST['NombreChambres'];
$cout=$_POST['CoutLogementNuit'];
$NomLogement=$_POST['NomLogement'];

$sql = "INSERT INTO `logement` VALUES (NULL, '$NomLogement', '$ville', '$rue', '$code', '$chambres', '$cout')";


if ($myPDO->query($sql) == TRUE) {
    //echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>";// . $conn->error;
}

?>
<?php
    
    if (!empty( $_POST['NumReservation'])){
    	?>
    	<form name="envoie" method="POST" action="AjoutJeuxReservation.php">
		<input type="hidden" name="NumReservation" value="<?php echo $_POST['NumReservation']; ?>" />
		<input type="hidden" name="infoID" value="<?php echo $_POST['infoID']; ?>" />
	
		</form>
		<script type="text/javascript"> document.envoie.submit();</script>
    	<?php
    } elseif (!empty( $_POST['infoID'])){
    	?>
    	<form name="envoie" method="POST" action="ajoutReservation.php">
		<input type="hidden" name="infoID" value="<?php echo $_POST['infoID']; ?>" />
	
		</form>
		<script type="text/javascript"> document.envoie.submit();</script>
    	<?php
    }
    ?>

	

<html>
		<script type="text/javascript">location.href = 'logement.php';</script>
</html>