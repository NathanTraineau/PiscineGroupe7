<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<style>
			<table>
			{
				text-align= center ;
			}
		</style>
	</head>
</html>

<?php
	include'inc/header.php';
    if ( !empty($_POST['infoID'])) {
    		$num = $_POST['infoID']; // si ça vient du bouton info on aura la variable infoID en post mais si ça vient de la barre recherche alors c'est la varia nomEditeur qu'on va traduire en NumEditeur juste en dessous.
    		} 
    
    // Il faut penser a mettre cette varia dans toutes les pages qui viennent ici
    $myPDO = new PDO('mysql:host=localhost;dbname=piscine', 'root', '');
    if( !empty($num)){
        $sql3 = "SELECT * FROM `jeux` WHERE NumJeux = '".$num."'";
        $m = $myPDO->query($sql3)->fetch();
        $nomJeux = $m[2];
        $num = $m['NumJeux'];

    }
   
    $edit= "SELECT *  FROM `editeur` WHERE NumEditeur='".$m['NumEditeur']."'";
    $Editeur = $myPDO->query($edit)->fetch();
    $Editeur['NumEditeur'];
    ?>
<div class='container'>
    <form method="POST" action="jeux.php">
    <button type="submit">Retour Jeux</button>
	</form>
    <table class="table table-bordered table-condensed">
        <thead>
        	<h3>Editeur de <?php echo $nomJeux?>: </h3>
            <tr>
                <th>Nom Editeur</th>
                <th>Ville Editeur</th>
                <th>Rue Editeur</th>
                <th>Code postale</th>
            </tr>
        </thead>
        <tbody>
            
                <tr>
                    <td><?php echo htmlspecialchars($Editeur[1]) ?></td>
                    <td><?php echo htmlspecialchars($Editeur[2]); ?></td>
                    <td><?php echo htmlspecialchars($Editeur[3]); ?></td>
                    <td><?php echo htmlspecialchars($Editeur[4]); ?></td>
                        <!--<form method="POST" action="changerEditeurFunc.php">
                            <!--<button type="submit">Modif</button> -->
                            <!--<input type="hidden" name="infoID" value="<?php echo $Editeur['NumEditeur']; ?>" />
                            <!--<input type="hidden" name="jeuxID" value="<?php echo $num; ?>" />-->
                            <!--<input type="submit" style="float:right;" id="suppr" value="changerEditeur" /></button>
                        </form>-->
                       
                    </td>
                    
                </tr>
    
        </tbody>
    </table>
    
<!--On affiche maintenat la categorie du jeux-->

 <?php
        $myPDO = new PDO('mysql:host=localhost;dbname=piscine', 'root', '');
		$sql2 = "SELECT * FROM `categorie` WHERE CodeCategorie='".$m['CodeCategorie']."'"; 
		$categorie = $myPDO->query($sql2)->fetch();
        $nomCategorie= $categorie[1];
        //var_dump($categorie[0]);
        
	?>
<h3>Categorie du jeux <?php echo $nomJeux?> est: <?php echo $nomCategorie?></h3>
        	
    
    <form method="POST" action="ajoutCategorie.php">
        <input type="hidden" name="infoID" value="<?php echo $num; ?>" />
		<button type="submit">Ajouter une categorie</button>
	</form>

<?php
 $myPDO = new PDO('mysql:host=localhost;dbname=piscine', 'root', '');

    //Editeurs
    $sql = "SELECT NumEditeur, NomEditeur
            FROM `editeur`";
    $q = $myPDO->query($sql);
    $editeurs = [];
    foreach($q as $ed){
        $editeurs[$ed['NomEditeur']] = $ed['NumEditeur'];
    }
  //$editeur = $_POST['jeuxID'];

//Categories 
    $sql = "SELECT CodeCategorie, NomCategorie
            FROM `categorie`";
    $q = $myPDO->query($sql);
    $categories = [];
    foreach($q as $cat){
        $categories[$cat['NomCategorie']] = $cat['CodeCategorie'];
    }
?>
<body>
<h3>Pour changer l'editeur du jeux <?php echo $nomJeux?> : </h3>

</br>
<form action= "changerEditeurFunc.php" method="POST" >
    <p>
        <label for="numEditeur">Nom editeur</label> : <select name="numEditeur" id="numEditeur" required>
                <?php
                foreach($editeurs as $key => $value):
                echo '<option value="'.$value.'">'.$key.'</option>'; 
                endforeach;
                ?>
            </select>
        <!--<label for="Num">NUM </label><input type="number" name="numEditeur" id="numEditeur" required/>-->
        <input type="hidden" name="infoID" value="<?php echo $Editeur['NumEditeur']; ?>" />
        <input type="submit" value="Changer" id = "add" />
    </p>
</form>
<h3>Pour changer la categorie du jeux <?php echo $nomJeux?> : </h3>
<body>
</br>
<form action= "changerCategorieFunc.php" method="POST" >
    <p>
        <label for="CodeCategorie">Nom Categorie</label> : <select name="CodeCategorie" id="CodeCategorie" required>
                <?php
                foreach($categories as $key => $value):
                echo '<option value="'.$value.'">'.$key.'</option>'; 
                endforeach;
                ?>
            </select>
        <!--<label for="Num">NUM </label><input type="number" name="numEditeur" id="numEditeur" required/>-->
        <input type="hidden" name="infoID" value="<?php echo $categorie['CodeCategorie']; ?>" />
        <input type="submit" value="Changer" id = "add" />
    </p>
</form>
<div>
</body>
</html>