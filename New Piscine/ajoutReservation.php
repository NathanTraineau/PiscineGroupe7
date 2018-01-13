<?php
	include'inc/header.php';
	//include'conexion2.php';

	function myFunction() {
	$nom = $_POST['nom'];
	$pass = $_POST['pass'];
<<<<<<< HEAD

}

    $myPDO = new PDO('mysql:host=localhost;dbname=piscine', 'root', '');

    //Jeux
    $sql = "SELECT NumJeux, NomJeux
            FROM `jeux`";
    $q = $myPDO->query($sql);
    $jeux = [];
    foreach($q as $je){
        $jeux[$je['NomJeux']] = $je['NumJeux'];
    }


    //Zone
    $sql = "SELECT NumZone, NomZone
            FROM `zone`";
    $q = $myPDO->query($sql);
    $zone= [];
    foreach($q as $zo){
        $zone[$zo['NomZone']] = $zo['NumZone'];
    }
    	

?>
<middle>
<form action= "fctAjoutReservation.php" method="POST" id="add">
=======
	
}
?>
<middle>
<form action= "fctAjoutReservation.php" method="POST" >
>>>>>>> 97ce80c76be07eaef5e882432f67f38d1f2d6e80
    <legend>Editeur</legend>
    <p>
        <label for="DateReservation">Date de reservation</label> : <input type="date" name="dateReservation" id="dateReservation" required  />
    </p>
                    
    <p>
        <label for="Commenaire">Commentaire</label> : <input type="text" name="Commenaire" id="Commenaire" required/>

    </p>
    <p>
        <label for="PrixEspace">Prix Espace</label> : <input type="number" name="PrixEspace" id="PrixEspace" required/>

    </p>
    <p>
        <label for="Statut">Statut</label> : <input type="bool" name="Statut" id="Statut" required/>
    </p>
    <p>
        <label for="EtatFacture">Etat de la Facture</label> : <input type="bool" name="EtatFacture" id="EtatFacture" required/>
        <!--<label for="Num">NUM </label><input type="number" name="numEditeur" id="numEditeur" required/>-->

    </p>
<<<<<<< HEAD

    
    <input type="submit" value="Ajouter" id = "add" />
</form>
<form action= "ajoutLocaliser.php" method="POST" id="localiser">
    <p>
        <label for="numJeux">Nom Jeux</label> : <select name="numJeux" id="numJeux" required>
            <?php
                foreach($jeux as $key => $value):
                echo '<option value="'.$value.'">'.$key.'</option>'; 
                endforeach;
            ?>
            </select>

    </p>
    <p>
        <label for="numZone">Nom Zone</label> : <select name="numZone" id="numZone" required>
            <?php
                foreach($zone as $key => $value):
                echo '<option value="'.$value.'">'.$key.'</option>'; 
                endforeach;
            ?>
            </select>

    </p>
    <input type="submit" value="Ajout Jeux dans zone" id = "localiser" />
    </form>
=======
    <input type="submit" value="Ajouter" id = "add" />
</form>
>>>>>>> 97ce80c76be07eaef5e882432f67f38d1f2d6e80
</middle>
</body>
</html>