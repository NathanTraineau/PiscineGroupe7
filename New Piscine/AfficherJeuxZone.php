<?php
		//en tête
		include'inc/header.php';
		$numZ = $_POST['zoneID'];

		//connexion base de donnees
		$mybdd = new PDO('mysql:host=localhost;dbname=piscine', 'root', '');

		//Nom de la zone 
		$nomZ = "SELECT * from zone WHERE NumZone = '$numZ' ";
		$nomZ = $mybdd->query($nomZ);
		$nomZ = $nomZ->fetch();
		$nomZ = $nomZ['NomZone'];

		//Selectionne le festival
		$sqltest = "SELECT * from Festival WHERE Courant = '1' ";
		$test = $mybdd->query($sqltest);
		$Festival = $test->fetch();
		$annee = $Festival['AnneeFestival'];
		
		//On recupère les jeux de la zone 
		$requete='SELECT * FROM jeux, concerner WHERE concerner.NumJeux = jeux.NumJeux and concerner.NumZone=\'' . $numZ . '\' and jeux.FestivalJeux=\'' . $annee . '\'';
		$reponse = $mybdd->query($requete);


?>
		

		<!--On affiche ces jeux-->
		<div class="container">
		<label for="jeuZones" style="font-size: 16px">Jeux de la Zone <?php echo $nomZ?></label> :
		    
			    <!--tableau des categorie-->
			    <table class="table table-bordered table-condensed">
				<thead>
				    <tr>
					<th>Jeux</th>
					<th>Nom Editeur</th>
					<th>Nombre de jeux</th>
					<th>Reçu ?</th>
					<th>A retourné ?</th>
					<th>donné ?</th>
					<th>Informations Supplémentaires</th>
				    </tr>
				</thead>
				<tbody>
					<!--Affiche les catégories-->
				    <?php while ($donnees = $reponse->fetch()):?>

					<?php
					//Nom de l'editeur
					$nomED = 'SELECT * from editeur WHERE NumEditeur = \'' . $donnees['NumEditeur'] . '\' ';
					$nomED = $mybdd->query($nomED);
					$nomED = $nomED->fetch();
					$nomED= $nomED['NomEditeur'];
					?>
					<tr>
					<td><?php echo htmlspecialchars($donnees['NomJeux']) ?></td>
					<td><?php echo htmlspecialchars($nomED) ?></td>
					<td><?php echo htmlspecialchars($donnees['Nombre']) ?></td>

					<td><?php if ($donnees['Recu'] == 1 ){
                    				echo "non";
                     			}else{echo "oui" ; }?></td>

                   			<td><?php if ($donnees['Retour'] == 1 ){
                    				echo "non";
                     			}else{echo "oui" ; }?></td>

					<td><?php if ($donnees['don'] == 1 ){
                    				echo "non";
                     			}else{echo "oui" ; }?></td>
					<td>
					<form method="POST" action="InfoJeux.php">
                                    <input type="hidden" name="infoID" />
                                    <input type="submit" style="float:right;" id="suppr" value="Info Jeux" />
                                    </form>
					</td>
					</tr>
				    <?php endwhile; ?>
				</tbody>
			    </table>
		<form method="POST" action="zone.php">
                    	<input type="submit" style="float:right;" value="Annuler" />
                </form>
    
		</div>

</html>

		

