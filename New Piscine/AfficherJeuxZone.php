<?php
		//en tête
		include'inc/header.php';
		$numZ = $_POST['zoneID'];
		//connexion base de donnees
		$mybdd = new PDO('mysql:host=localhost;dbname=piscine', 'root', '');
		//On recupère les jeux de la zone 
		$requete='SELECT * FROM jeux, concerner WHERE concerner.NumJeux = jeux.NumJeux and concerner.NumZone=\'' . $numZ . '\'';
		$reponse = $mybdd->query($requete);


		//suppression
		//$requete= $mybdd->prepare('DELETE FROM zone WHERE NumZone=:idZone');
		//$requete->execute(array('idZone'=>$_POST['zoneID']));
?>
		

		<!--On affiche ces jeux-->
		<div class="container">
		<label for="jeuZones" style="font-size: 16px">Jeux de la Zone</label> :
		    
			    <!--tableau des categorie-->
			    <table class="table table-bordered table-condensed">
				<thead>
				    <tr>
					<th>Jeux</th>
					<th>Actions</th>
				    </tr>
				</thead>
				<tbody>
					<!--Affiche les catégories-->
				    <?php while ($donnees = $reponse->fetch()):?>
					<tr>
					<td><?php echo htmlspecialchars($donnees['NomJeux']) ?></td>
					<td><?php echo htmlspecialchars($donnees['NombreJoueur']) ?></td>
					<td><?php echo htmlspecialchars($donnees['DateSortie']) ?></td>
					<td><?php echo htmlspecialchars($donnees['DureePartie']) ?></td>
					<td><?php echo htmlspecialchars($donnees['NumEditeur']) ?></td>
					<td><?php echo htmlspecialchars($donnees['CodeCategorie']) ?></td>
					<td><?php echo htmlspecialchars($donnees['Recu']) ?></td>
					<td><?php echo htmlspecialchars($donnees['Retour']) ?></td>
					</tr>
				    <?php endwhile; ?>
				</tbody>
			    </table>
		<form method="POST" action="zone.php">
                    	<input type="submit" style="float:right;" value="Annuler" />
                </form>
    
		</div>

</html>

		

