<?php
	include'inc/header.php';
	//include'conexion2.php';

	function myFunction() {
	$nom = $_POST['nom'];
	$pass = $_POST['pass'];


}
	$NumEditeur = $_POST['infoID'];
    $myPDO = new PDO('mysql:host=localhost;dbname=piscine', 'root', '');

    
    $sqlannee = "SELECT * from Festival where Courant = '1' ";

	$annee = $myPDO->query($sqlannee);
	$Festival = $annee->fetch();
    //Jeux
    

    
	$NumEditeurReservation = $_POST['infoID'];
	$FestivalReservation = $Festival['AnneeFestival'];


  	#On récup la réservation de l'éditeur

    $NumRes1 = 'SELECT * from reservation where NumEditeurReservation =  ".$NumEditeurReservation." AND FestivalReservation = ".$FestivalReservation." ';

	$NumRes2 = $myPDO->query($NumRes1);
	$Reservation = $NumRes2->fetch();


# Recupère les jeux de l'editeur 
	$sql2 = 'SELECT * FROM `jeux` where NumEditeur = ".$NumEditeurReservation." AND FestivalJeux = ".$FestivalReservation." ';

    $jeux = $myPDO->query($sql2);
?>

    <table class="table table-bordered table-condensed" id="jeux">
                <thead>
                    <tr>
                        <th>Nom Jeux</th>
                        <th>Nombre Joueur</th>
                        <th>Date sortie</th>
                        <th>Duree Partie</th>
                        <th>Id Editeur</th>
                        <th>Id Categorie</th>
                        <th>Caté</th>
                    </tr>
                </thead>
                <tbody>
            <?php
            while ($r = $jeux->fetch()) : ?>
                <tr>
                	
                    		<td><?php echo htmlspecialchars($r['NomJeux']) ?></td>
                            <td><?php echo htmlspecialchars($r['NombreJoueur']); ?></td>
                            <td><?php echo htmlspecialchars($r['DateSortie']); ?></td>
                            <td><?php echo htmlspecialchars($r['DureePartie']); ?></td>
                            <td><?php echo htmlspecialchars($r['NumEditeur']); ?></td>
                            <td><?php echo htmlspecialchars($r['CodeCategorie']); ?></td>
                            <td>

                        	<form method="POST" action="ajoutJeuxReservationFunc.php">
                        	<input type="int" name="nombre" /> Nombre de jeux <br>
                            <input type="checkbox" name="recu" value ="1"  /> Recu <br>
                            <input type="checkbox" name="Retour" value ="1" /> A retourner <br>
                            <input type="checkbox" name="Don" value ="1"/> Don <br>
                            <input type="checkbox" name="zoneEditeur" value ="1"/> Zone editeur <br>
                            <input type="hidden" name="jeuxID" value="<?php echo $r['NumJeux']; ?>" />
                            <input type="hidden" name="NumReservation" value="<?php echo $Reservation['NumReservation']; ?>" />
                         	<input type="submit" name="submit" value="Ajouter ce jeux " />
                            </td>

                         	</form>
            <?php endwhile ; ?>

                </tbody>
    </table>
           