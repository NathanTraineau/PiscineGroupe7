<?php


// Create connection
// $conn = new mysqli($servername, $username, $password, $dbname);
$myPDO = new PDO('mysql:host=localhost;dbname=piscine', 'root', '');
// $num = $_POST['numEditeur'];
$nomJeux = $_POST['nomJeux'];
$nombre=$_POST['nombre'];
$DateSortie = $_POST['DateSortie'];
$DureePartie = $_POST['DureePartie'];
$editeur = $_POST['numEditeur'];
$commentaire= $_POST['CommentaireJeux'];
$categ = $_POST['codeCategorie'];

$sqltest = "SELECT * from Festival where Courant = '1' ";

$test = $myPDO->query($sqltest);
$Festival = $test->fetch();

$sql = "INSERT INTO `jeux` VALUES (NULL,  '".$Festival['AnneeFestival']."', '$nomJeux', '$nombre', '$DateSortie', '$DureePartie', '$editeur', '$categ','$commentaire' )";
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
<?php
    
    if (!empty( $_POST['NumReservation'])){
    	?>
    	<form name="envoie" method="POST" action="AjoutJeuxReservation.php">
		<input type="hidden" name="NumReservation" value="<?php echo $_POST['NumReservation']; ?>" />
		<input type="hidden" name="infoID" value="<?php echo $_POST['infoID']; ?>" />
	
		</form>
		<script type="text/javascript"> document.envoie.submit();</script>
    	<?php
    }?>
		<script type="text/javascript">location.href = 'jeux.php';</script>
</html>