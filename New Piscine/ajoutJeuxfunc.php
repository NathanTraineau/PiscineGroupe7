<?php
$servername = "localhost";
$username= "root";
$password = "";
$dbname = "piscine";

// Create connection
// $conn = new mysqli($servername, $username, $password, $dbname);
$myPDO = new PDO('mysql:host=localhost;dbname=piscine', 'root', '');
// $num = $_POST['numEditeur'];
$nomJeux = $_POST['nomJeux'];
$nombre=$_POST['nombre'];
$DateSortie = $_POST['DateSortie'];
$DureePartie = $_POST['DureePartie'];
$editeur = $_POST['infoID'];
$categ = $_POST['codeCategorie'];



echo $nomJeux;
echo $nombre;
echo $DateSortie;
echo $DureePartie;
echo $editeur;
echo $categ;
// Check connection
// if ($myPDO->connect_error) {
//     die("Connection failed: " . $myPDO->connect_error);
// } 

$sql = "INSERT INTO `jeux` VALUES (NULL, '$nomJeux', '$nombre', '$DateSortie', '$DureePartie', '$editeur', '$categ')";
// $sql = "SELECT * FROM `editeur`";

//$array=[];
//$stmt = $myPDO->prepare($sql);
// $stmt->execute($array) or die(print_r($stmt->errorInfo(), true));

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
		if (!empty($_POST['infoID'])){
		?> 	<form name="envoie" action="InfoEditeur.php" method="POST">
    			<input type="hidden" name="infoID" value="<?php echo $editeur; ?>" />
    		</form>
    		<script type="text/javascript"> document.envoie.submit();</script>
    	<?php } ?>

	
	<script type="text/javascript">location.href = 'jeux.php';</script>

	

</html>
