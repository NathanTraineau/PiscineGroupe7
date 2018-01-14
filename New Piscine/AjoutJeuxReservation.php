<?php
	include'inc/header.php';
	//include'conexion2.php';

	function myFunction() {
	$nom = $_POST['nom'];
	$pass = $_POST['pass'];


}
	$NumEditeur = $_POST['infoID'];
    $myPDO = new PDO('mysql:host=localhost;dbname=piscine', 'root', '');

    $annee= $myPDO->querry("SELECT Annee FROM 'Annee ") ->fetch()

    //Jeux
    

    
        
    }
    # Recupère les jeux de l'editeur 

    $sql2 = "SELECT * FROM `jeux` where NumEditeur = '".$NumEditeur."' , AnneeJeux = '".$annee."' ";

    $jeux = $myPDO->query($sql2);