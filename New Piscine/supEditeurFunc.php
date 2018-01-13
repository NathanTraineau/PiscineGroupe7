
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "piscine";


// $conn = new mysqli($servername, $username, $password, $dbname);
$myPDO = new PDO('mysql:host=localhost;dbname=piscine', 'root', '');
// $num = $_POST['numEditeur'];
//$nom = $_POST['nomEditeur'];
$num = $_POST['editeurID'];

// Create connection
$con = mysqli_connect($servername, $username, $password, $dbname);


//VERIFICATION CONNECTION
if (mysqli_connect_errno()) {
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
//DELETE FUNCTION
mysqli_query($con,"DELETE FROM editeur WHERE numEditeur='".$num."'");
mysqli_close($con);
?>