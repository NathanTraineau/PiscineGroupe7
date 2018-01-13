
<?php
	include'inc/header.php';
	//include'conexion2.php';

    $myPDO = new PDO('mysql:host=localhost;dbname=piscine', 'root', '');

    ##inutile 
    if ( !empty($_POST['infoID'])) {
    	//On voit si la requête vient d'une page éditeur auquel cas on aura le champ Id editeur de figé
    	$sql7 = "SELECT * FROM editeur WHERE NumEditeur = '".$_POST['infoID']."' " ;
    	$f = $myPDO->query($sql7);
    	$edit = $f->fetch();
    	
    	###inutile
	}

    //Editeurs
    $sql = "SELECT NumEditeur, NomEditeur
            FROM `editeur`";
    $q = $myPDO->query($sql);
    $editeurs = [];
    foreach($q as $ed){
        $editeurs[$ed['NomEditeur']] = $ed['NumEditeur'];
    }

    if (!empty($_POST['erreur'])){
    	echo "Cette editeur a déjà une reservation, allez la modifier ";
    }

?>






<form action="ajoutReservation.php" method="POST" >

<label for="numEditeur">ID editeur</label> : <select name="infoID" id="infoID" >
                <?php
                foreach($editeurs as $key => $value):
                echo '<option value="'.$value.'">'.$key.'</option>'; 
                endforeach;
                ?>
            </select>
    		
<input type="submit" style="float:right;" id="suppr" value="Ajouter une reservation" />

</form>