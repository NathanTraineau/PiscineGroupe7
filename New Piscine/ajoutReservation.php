<?php
	include'inc/header.php';
	//include'conexion2.php';

	function myFunction() {
	$nom = $_POST['nom'];
	$pass = $_POST['pass'];
<<<<<<< HEAD


}
	$NumEditeur = $_POST['infoID'];
    $myPDO = new PDO('mysql:host=localhost;dbname=piscine', 'root', '');

    $annee= $myPDO->querry("SELECT Annee FROM 'Annee ") ->fetch();

    //Jeux
    $sql = " SELECT * FROM `reservation` WHERE NumEditeur = '".$NumEditeur."' ,  AnneeJeux = '".$annee."' ";

    $q = $myPDO->query($sql);

    if (!empty($q->fetch())){ 
?>
    	<form method="POST" action="ChoixEditeurResa.php" name="envoie" >
         <input type="hidden" name="error" value="erreur" />

                           
        </form> 
        <script type="text/javascript"> document.envoie.submit();</script>

        <?php
        
    }
   
    ?>

    <form method="POST" action="ChoixEditeurResa.php">
    <button type="submit">Retour Editeurs</button>
	</form>
    
   
<?php
    
	$edit= "SELECT NomEditeur FROM `editeur` WHERE NumEditeur='".$NumEditeur."'";

    $NomEdit = $myPDO->query($edit)->fetch();

?>

    <h3>Ajouter une Reservation pour <?php echo $NomEdit['NomEditeur'] ?></h3>
    <form method="POST" action="AjoutReservationFunc.php">
    <p>
        <label for="DateReservation">Date de reservation</label> : <input type="date" name="dateReservation" id="dateReservation" required  />
    </p>
    <!-- Ajout d'un logement à la résa -->
    <label for="Annee">Logement </label> : <select name="logement" id="logement" >
			                <?php
			                $myPDO = new PDO('mysql:host=localhost;dbname=piscine', 'root', '');

			                $sql = "SELECT * FROM `logement`";
						    $q = $myPDO->query($sql);
						    $festival = [];
						    foreach($q as $fes){
						        $festival[$fes['NumLogement']] = $fes['NomLogement'];
						    }
			                foreach($festival as $key => $value):
			                	echo '<option value="'.$value.'">'.$key.'</option>'; //il faut créer les entrée dans la bdd
			                endforeach;
			                ?>
			            	</select>


			            	<form method="POST" action="ChoixEditeurResa.php">
			            	<input type="hidden" name="infoID" value="<?php echo $infoID; ?>" />

							 <button type="submit">Ajout Logement</button>
							</form>
                    
    
=======
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
>>>>>>> 76cb15ec5be9351bec9c30bd15ed5d37a66ee907
    <p>
        <label for="PrixEspace">Prix Espace</label> : <input type="number" name="PrixEspace" id="PrixEspace" required/>

    </p>
<<<<<<< HEAD
    
=======
    <p>
        <label for="Statut">Statut</label> : <input type="bool" name="Statut" id="Statut" required/>
    </p>
>>>>>>> 76cb15ec5be9351bec9c30bd15ed5d37a66ee907
    <p>
        <label for="EtatFacture">Etat de la Facture</label> : <input type="bool" name="EtatFacture" id="EtatFacture" required/>
        <!--<label for="Num">NUM </label><input type="number" name="numEditeur" id="numEditeur" required/>-->

    </p>
<<<<<<< HEAD
    <p>
        <label for="Commentaire">Commentaire</label> : <input type="text" name="Commentaire" id="Commentaire" required/>

    </p>
    <input type="hidden" name="annee" value="<?php echo $annee; ?>" />
    <input type="hidden" name="infoID" value="<?php echo $infoID; ?>" />
    <input type="submit" value="Ajouter Reservation" id = "add" />
    </form>
=======
    

<?php

?>

=======
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
>>>>>>> 76cb15ec5be9351bec9c30bd15ed5d37a66ee907
</middle>
</body>
</html>