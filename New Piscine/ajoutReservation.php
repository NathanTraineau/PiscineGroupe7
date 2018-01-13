<?php
	include'inc/header.php';
	//include'conexion2.php';

	function myFunction() {
	$nom = $_POST['nom'];
	$pass = $_POST['pass'];


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
                    
    
    <p>
        <label for="PrixEspace">Prix Espace</label> : <input type="number" name="PrixEspace" id="PrixEspace" required/>

    </p>
    
    <p>
        <label for="EtatFacture">Etat de la Facture</label> : <input type="bool" name="EtatFacture" id="EtatFacture" required/>
        <!--<label for="Num">NUM </label><input type="number" name="numEditeur" id="numEditeur" required/>-->

    </p>
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

</middle>
</body>
</html>