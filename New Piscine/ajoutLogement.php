<?php
	include'inc/header.php';
	//include'conexion2.php';

    $myPDO = new PDO('mysql:host=localhost;dbname=piscine', 'root', '');

    if ( !empty($_POST['reservID'])) {
    	//On voit si la requête vient d'une page réservation auquel cas on aura le champ Id editeur de figé
    	$sql7 = "SELECT * FROM editeur WHERE NumEditeur = '".$_POST['reservID']."' " ;
    	$f = $myPDO->query($sql7);
    	$edit = $f->fetch();
    	
    	
	}

    //Editeurs
    $sql = "SELECT NumEditeur, NomEditeur
            FROM `editeur`";
    $q = $myPDO->query($sql);
    $editeurs = [];
    foreach($q as $ed){
        $editeurs[$ed['NomEditeur']] = $ed['NumEditeur'];
    }
    
    //Categories 
    $sql = "SELECT CodeCategorie, NomCategorie
            FROM `categorie`";
    $q = $myPDO->query($sql);
    $categories = [];
    foreach($q as $cat){
        $categories[$cat['NomCategorie']] = $cat['CodeCategorie'];
    }
    // var_dump($editeurs);
    // die();

?>
CREATE TABLE logement(
	NumLogement int NOT NULL UNIQUE AUTO_INCREMENT,
	NomLogement varchar(100)
	VilleLogement varchar(255),
	RueLogement varchar(255),
	CodePostaleLogement varchar(255),
	NombreChambres int,
	CoutLogementNuit int,
	PRIMARY KEY (NumLogement)

<middle>
<form action= "ajoutLogementfunc.php" method="POST" >
    <legend>Editeur</legend>
    <p>
        <label for="NomLogement">Nom du logement</label> : <input type="text" name="NomLogement" id="NomLogement" required  />
    </p>
                    
    <p>
        <label for="VilleLogement">Ville</label> : <input type="text" name="VilleLogement" id="VilleLogement" required/>

    </p>
    <p>
        <label for="RueLogement">Rue </label> : <input type="text" name="RueLogement" id="RueLogement" placeholder="ex: 1997-11-30" required/>

    </p>
    <p>
        <label for="CodePostaleLogement">CodePostaleLogement</label> : <input type="time" name="DureePartie" id="DureePartie" placeholder="ex: 05:26:00 " required/>
        <!--<label for="Num">NUM </label><input type="number" name="numEditeur" id="numEditeur" required/>-->

    </p>
    <?php if (!empty($edit['NomEditeur'])){
    	//On voit si la requête vient d'une page éditeur (donc aurait un identifiant d'éditeur) auquel cas on aura le champ Id editeur de figé
    	// $edit l'editeur auquel on veut ajouter un jeux
    ?>	
    	ID editeur : <?php echo $edit['NomEditeur'] ?>
    	<input type="hidden" name="infoID" value="<?php echo $edit['NumEditeur']; ?>" />
     <p>
    <?php } 
    	  else // si on ajoute un jeux sans être passé par info editeur mais par jeux.php
    	  { ?> 
        <label for="numEditeur">ID editeur</label> : <select name="infoID" id="infoID" >
                <?php
                foreach($editeurs as $key => $value):
                echo '<option value="'.$value.'">'.$key.'</option>'; 
                endforeach;
                ?>
            </select>
        <?php } ?>
        <!--<label for="Num">NUM </label><input type="number" name="numEditeur" id="numEditeur" required/>-->

    </p>

     <p>
        <label for="codeCategorie">Code categorie</label> : <select name="codeCategorie" id="codeCategorie" >
                <?php
                foreach($categories as $key => $value):
                echo '<option value="'.$value.'">'.$key.'</option>'; //il faut créer les entrée dans la bdd
                endforeach;
                ?>
            </select>
        <!--<label for="Num">NUM </label><input type="number" name="numEditeur" id="numEditeur" required/>-->

    </p>
    
	
	

    <input type="submit" value="Ajouter le jeux" id = "add" />
</form>
</middle>
</body>
</html>