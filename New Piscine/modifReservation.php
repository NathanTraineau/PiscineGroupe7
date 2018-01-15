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

    // si ça vient du bouton info on aura la variable infoID en post mais si ça vient de la barre recherche alors c'est la varia nomEditeur qu'on va traduire en NumEditeur juste en dessous.
    		//} 
    
    $NumReservation = $_POST['NumReservation'];



    // Il faut penser a mettre cette varia dans toutes les pages qui viennent ici
    $myPDO = new PDO('mysql:host=localhost;dbname=piscine', 'root', '');


    // On récupère les zones 
    $sql = "SELECT *
            FROM `zone`";
    $q = $myPDO->query($sql);
    $zone = [];
    foreach($q as $zo){
        $zone[$zo['NomZone']] = $zo['NumZone'];
    }
    
    $sql2 = 'SELECT * FROM reservation WHERE NumReservation=\''.$NumReservation.'\''; 
    
    $sql3  = 'SELECT * FROM concerner WHERE NumJeux= \''.$NumJeux.'\' and NumReservation=\''.$NumReservation.'\''; 
    
    $res = $myPDO->query($sql2)->fetch();
    $Reservation = $res['NumReservation'];
    $concerner = $myPDO->query($sql3);
    
    ?>
    <form method="POST" action="InfoReservation.php">
    	<input type="hidden" name="NumReservation" value="<?php echo $Reservation; ?>"/>
    <input type="submit" value="Retourner à info">
	</form>


	<form method="POST" action="ajoutLogement.php">
		<input type="hidden" name="infoID" value="<?php echo $infoID; ?>" />

		<button type="submit">Ajout Logement</button>
	</form>
                    

    <table class="table table-bordered table-condensed">
        <thead>
        	
            <tr>
                <th>Nom Jeux</th>
                
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php while ($r = $res->fetch()): ?>
                <tr>
                    <td>
                	<?php
                	$jeux0 = 'SELECT * FROM jeux where NumJeux =  \''.$r['NumJeux'].'\'';
    				$jeux1 = $myPDO->query($jeux0); 
    				$jeux = $jeux1->fetch();
    				echo $jeux['NomJeux'];
    				?>
    				</td>

                    <td>
                        <form method="POST" action="modifJeuxResaFunc.php">





    <form method="POST" action="AjoutReservationFunc.php">
   
    <!-- Ajout d'un logement à la résa -->
    <label for="Annee">Logement </label> : <select name="logement" id="logement" value= "<?php echo $r['NumLogement']; ?>" >
			                <?php
			                $myPDO = new PDO('mysql:host=localhost;dbname=piscine', 'root', '');

			                $sql = "SELECT * FROM `logement`";
						    $q = $myPDO->query($sql);
						    $festival = [];
						    foreach($q as $fes){
						        $festival[$fes['NomLogement']] = $fes['NumLogement'];
						    }
			                foreach($festival as $key => $value):
			                	echo '<option value="'.$value.'">'.$key.'</option>'; //il faut créer les entrées dans la bdd
			                endforeach;
			                ?>
			                </select>

			                
			            	
			            	
    


    	



    <p>
        <label for="DateReservation">Date de reservation</label> : <input type="date" name="dateReservation" id="dateReservation" value= "<?php echo $r['dateReservation']; ?>"  />
    </p>
                    
    

    <p>
        <label for="PrixEspace">Prix Espace</label> : <input type="number" name="PrixEspace" id="PrixEspace" value= "<?php echo $r['PrixEspace']; ?>"/>

    </p>

    
    

    <p>
        <label for="Commentaire">Commentaire</label> : <input type="text" rows="6" name="Commentaire" id="Commentaire" value= "<?php echo $r['Commentaire']; ?>"/>

    </p>
    
    <input type="hidden" name="infoID" value="<?php echo $NumEditeur; ?>" />
    <input type="submit" value="Ajouter des Jeux" id = "add" />
    </form>


                        	<input type="int" name="nombre" value= "<?php echo $r['Nombre']; ?>" /> Nombre de jeux <br>
                            



                            <?php if ($r['Statut'] == '1'){ 
                            	?>
                            <input type="checkbox" name="Statut" value ="1" checked /> Statut <br>
                            <?php }else { ?>

                            	<input type="checkbox" name="Statut" value ="1" /> Statut <br>
                            <?php }  ?>



                            <?php if ($r['EtatFacture'] == '1'){ 
                            	?>
                            <input type="checkbox" name="EtatFacture" value ="1" checked /> EtatFacture <br>
                            <?php } else { ?>

                            	<input type="checkbox" name="EtatFacture" value ="1"  /> EtatFacture <br>
                            <?php }  ?>


					        <!--<label for="Num">NUM </label><input type="number" name="numEditeur" id="numEditeur" required/>-->

					    	</p>
                            <input type="hidden" name="jeuxID" value="<?php echo $r['NumJeux']; ?>" />
                            <input type="hidden" name="IdConcerner" value="<?php echo $r['IdConcerner']; ?>" />
                            <input type="hidden" name="NumReservation" value="<?php echo $Reservation; ?>" />
                         	<input type="submit" name="submit" value="modifier ce jeux " />
                            </td>

                         	</form>
                        <!-- <form method="POST" action="modifEditeur.php"> 
                            
                            <input type="submit" style="float:right;" id="modif" value="Modif"/>Modif</button>
                        </form>-->
                    </td>
                </tr>
            <?php endwhile; ?>
    
        </tbody>
    </table>
    

<!-- On affiche maintenant ses jeux
