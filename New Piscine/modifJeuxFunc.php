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


NomJeux, NombreJoueur, DateSortie, DureePartie 
$num= $_POST['NumJeux']
$NomJeux = $_POST['NomJeux'];
$NombreJoueur = $_POST['NombreJoueur'];
$DateSortie=$_POST['DateSortie'];
$DureePartie = $_POST['DureePartie'];


//$editeur = $_POST['NumEditeur'];
//$categorie = $_POST['CodeCategorie'];

// echo $num;
//echo $nom;
//echo $ville;
//echo $rue;
//echo $code;
// Check connection
// if ($myPDO->connect_error) {
//     die("Connection failed: " . $myPDO->connect_error);
// } 
//$sql = "UPDATE MyGuests SET lastname='Doe' WHERE id=2";
//$sql = "INSERT INTO `editeur` SET VALUES (NULL, '$nom', '$ville', '$rue', '$code')";
// $sql = "SELECT * FROM `editeur`";

$sql = "UPDATE `jeux` SET nomJeux='".$NomJeux."', NombreJoueur='".$NombreJoueur."', DateSortie='".$DateSortie."', DureePartie='".$DureePartie."' WHERE NumJeux='".$num."'";


//$array=[];
//$stmt = $myPDO->prepare($sql);
// $stmt->execute($array) or die(print_r($stmt->errorInfo(), true));

//verification connexion base de donnes
if ($myPDO->query($sql) == TRUE) {
    //echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>";// . $conn->error;
}

		if (!empty($POST['infoID'])){
		?>
		<form method="POST" action="InfoEditeur.php" name="envoie" >
         	<input type="hidden" name="infoID" value="<?php echo $num; ?>" />

                           
        </form> 
        <script type="text/javascript"> document.envoie.submit();</script>
        <?php } ?>

		<script type="text/javascript">location.href = 'jeux.php';</script>
// $conn->close();



