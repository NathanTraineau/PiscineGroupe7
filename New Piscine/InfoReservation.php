
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
    //$servername = "localhost";
    //$username = "root";
    //$password = "";
    //$dbname = "piscine";
    //$editeur= "editeur";
    //if ( !empty($_POST['NumReservation'])) {

    $NumReservation = $_POST['NumReservation']; // si ça vient du bouton info on aura la variable infoID en post mais si ça vient de la barre recherche alors c'est la varia nomEditeur qu'on va traduire en NumEditeur juste en dessous.
    		//} 
    
    // Il faut penser a mettre cette varia dans toutes les pages qui viennent ici
    $myPDO = new PDO('mysql:host=localhost;dbname=piscine', 'root', '');
    
    $sql2 = "SELECT *
            FROM reservation WHERE NumReservation='".$NumReservation."'"; 
    
    $sql3  = 'SELECT *
            FROM concerner WHERE NumReservation= \''.$NumReservation.'\''; 


    
    
    $res = $myPDO->query($sql2)->fetch();

    $num = $res['NumEditeurReservation'];
    $reservation = $res['NumReservation'];
    $concerner = $myPDO->query($sql3);
    
    ?>
    <form method="POST" action="reservation.php">
    <button type="submit">Retour Reservation</button>
	</form>
    <table class="table table-bordered table-condensed">
        <thead>
        	
            <tr>
                <th>Nom Jeux</th>
                <th>Nombre de joueur</th>
                <th>Date de sortie</th>
                <th>Duree de la Partie</th>
                
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php while ($r = $concerner->fetch()): ?>
                <tr>
                    <td>
                	<?php
                	$jeux0 = 'SELECT * FROM jeux where NumJeux =  \''.$r['NumJeux'].'\'';
    				$jeux1 = $myPDO->query($jeux0); 
    				$jeux = $jeux1->fetch();
    				echo $jeux['NomJeux'];
    				?>
    				<td><?php echo htmlspecialchars($jeux['NombreJoueur']); ?></td>
                    <td><?php echo htmlspecialchars($jeux['DateSortie']); ?></td>
                    <td><?php echo htmlspecialchars($jeux['DureePartie']); ?></td>
    				</td>
                    <td>
                        <form method="POST" action="supJeuxResa.php">
                            <input type="hidden" name="NumReservation" value="<?php echo $reservation; ?>" />
        					<input type="hidden" name="infoID" value="<?php echo $num; ?>" />
                            <input type="hidden" name="jeuxID" value="<?php echo $jeux['NumJeux']; ?>" />
                            <input type="submit" style="float:right;" id="suppr" value="Suppr de la reservation" /></button>
                        </form>
                        <form method="POST" action="modifJeuxResa.php">
                            <!--<button type="submit">Modif</button> -->
                            <input type="hidden" name="NumReservation" value="<?php echo $reservation; ?>" />
        					<input type="hidden" name="infoID" value="<?php echo $num; ?>" />
                            <input type="hidden" name="jeuxID" value="<?php echo $jeux['NumJeux']; ?>" />
                            <input type="submit" style="float:right;" id="suppr" value="modifier la reservation pour ce jeux" /></button>
                        </form>
                        <!-- <form method="POST" action="modifEditeur.php"> 
                            
                            <input type="submit" style="float:right;" id="modif" value="Modif"/>Modif</button>
                        </form>-->
                    </td>
                </tr>
            <?php endwhile; ?>
    
        </tbody>
    </table>


    <table class="table table-bordered table-condensed">
        <thead>
        	
            <tr>
            	<th>Nom du logement </th>
                <th>Ville </th>
                <th>Rue </th>
                <th>Code Postale </th>
                <th>Nombre Chambres </th>
                <th>Cout par nuit </th>
                <th></th>
            </tr>
                
                <th></th>
            </tr>
        </thead>
        <tbody>
        	<?php


        	$sql3  = 'SELECT * FROM loger WHERE  NumReservation=\''.$NumReservation.'\'';
			$loger = $myPDO->query($sql3);
            while ($r = $loger->fetch()): ?> <p>
    	<?php
                	$lo = 'SELECT * FROM `logement` where NumLogement = \''.$r['NumLogement'].'\' ' ;
    				$loge1 = $myPDO->query($lo); 
    				$logement = $loge1->fetch();

    				
    				
    				?>
    				<tr>
                	<td><?php echo htmlspecialchars($logement['NomLogement']); ?></td>
                    <td><?php echo htmlspecialchars($logement['VilleLogement']); ?></td>
                    <td><?php echo htmlspecialchars($logement['RueLogement']); ?></td>
                    <td><?php echo htmlspecialchars($logement['CodePostaleLogement']); ?></td>
                    <td><?php echo htmlspecialchars($logement['NombreChambres']); ?></td>
                    <td><?php echo htmlspecialchars($logement['CoutLongementNuit']); ?></td> 
                    
                    <td>
                        <form method="POST" action="supLogementResa.php">
                            <input type="hidden" name="NumReservation" value="<?php echo $reservation; ?>" />
        					<input type="hidden" name="infoID" value="<?php echo $num; ?>" />
                            <input type="hidden" name="logementID" value="<?php echo $logement['NumLogement']; ?>" />
                            <input type="submit" style="float:right;" id="suppr" value="Suppr de la reservation" /></button>
                        </form>


                        
                        <!-- <form method="POST" action="modifEditeur.php"> 
                            
                            <input type="submit" style="float:right;" id="modif" value="Modif"/>Modif</button>
                        </form>-->
                    </td>
                </tr>
            <?php endwhile; ?>
    
    
    	 



		<form method="POST" action="AjoutJeuxReservation.php">
    	<input type="hidden" name="NumReservation" value="<?php echo $NumReservation; ?>" />
        <input type="hidden" name="infoID" value="<?php echo $num; ?>" />
		<button type="submit">Compléter la Reservation</button>
	</form>

	<form method="POST" action="modifReservation.php">
    	<input type="hidden" name="infoID" value="<?php echo $NumReservation; ?>" />
        <input type="hidden" name="infoID" value="<?php echo $num; ?>" />
		<button type="submit">Modifier la reservation</button>
	</form>


<!-- On affiche maintenant ses jeux
