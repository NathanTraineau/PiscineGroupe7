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
$num = $_POST['editeurID'];
$nom = $_POST['nomEditeur'];
$ville=$_POST['ville'];
$rue = $_POST['Rue'];
$code = $_POST['code'];

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
$sql = "UPDATE `editeur` SET nomEditeur='".$nom."', villeEditeur='".$ville."', rueEditeur='".$rue."', codePostaleEditeur='".$code."' WHERE numEditeur='".$num."'";

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
	<script type="text/javascript">location.href = 'editeur.php';</script>
</html>
