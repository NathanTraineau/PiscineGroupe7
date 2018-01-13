<?php
	include'inc/header.php';
	//include'conexion2.php';

    $myPDO = new PDO('mysql:host=localhost;dbname=piscine', 'root', '');

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
<middle>
<form action= "ajoutJeuxfunc.php" method="POST" >
    <legend>Editeur</legend>
    <p>
        <label for="NomJeux">Nom du jeux</label> : <input type="text" name="nomJeux" id="nomJeux" required  />
    </p>
                    
    <p>
        <label for="NombreJoueur">Nombre Joueur</label> : <input type="int" name="nombre" id="nombre" required/>

    </p>
    <p>
        <label for="DateSortie">Date sortie</label> : <input type="date" name="DateSortie" id="DateSortie" required/>

    </p>
    <p>
        <label for="DureePartie">Duree partie</label> : <input type="int" name="DureePartie" id="DureePartie" required/>
        <!--<label for="Num">NUM </label><input type="number" name="numEditeur" id="numEditeur" required/>-->

    </p>
     <p>
        <label for="numEditeur">Nom editeur</label> : <select name="numEditeur" id="numEditeur" required>
                <?php
                foreach($editeurs as $key => $value):
                echo '<option value="'.$value.'">'.$key.'</option>'; 
                endforeach;
                ?>
            </select>
        <!--<label for="Num">NUM </label><input type="number" name="numEditeur" id="numEditeur" required/>-->

    </p>

     <p>
        <label for="codeCategorie">Categorie</label> : <select name="codeCategorie" id="codeCategorie" required>
                <?php
                foreach($categories as $key => $value):
                echo '<option value="'.$value.'">'.$key.'</option>'; 
                endforeach;
                ?>
            </select>
        <!--<label for="Num">NUM </label><input type="number" name="numEditeur" id="numEditeur" required/>-->

    </p>
    <input type="submit" value="Ajouter jeux" id = "add" />
</form>
</form>
<p>
<form method="POST" action="ajoutCategorie.php">
	<input type="submit" value="Ajouter une categorie" />
	
</form>
</p>
<p>
<form method="POST" action="jeux.php">
	<input type="submit" value="Annuler" />
	
</form>
</p>
</middle>
</body>
</html>
