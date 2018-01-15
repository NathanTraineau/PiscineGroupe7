
			<?php

			    //en tête
			    include'inc/header.php';
			   //connexion bdd
			    $mybdd = new PDO('mysql:host=localhost;dbname=piscine', 'root', '');
			//Selectionne le festival
			$sqltest = "SELECT * from Festival WHERE Courant = '1' ";
			$test = $mybdd->query($sqltest);
			$Festival = $test->fetch();
			$annee = $Festival['AnneeFestival'];



			    $requete = 'SELECT NumZone, NomZone, AnneeZone FROM zone WHERE AnneeZone=\'' . $annee . '\'';
			     
			    $reponse = $mybdd->query($requete);

			    ?>

		<div class="container">
		    <form method="POST" action="ChoixZone.php">
		    	<label for="zones" style="font-size: 16px">Zones</label> :
		    
			    <!--tableau des categorie-->
			    <table class="table table-bordered table-condensed">
				<thead>
				    <tr>
					<th>Zones</th>
					<th>Nombre d'espaces occupés</th>
					<th>Actions</th>
				    </tr>
				</thead>
				<tbody>
					<!--Affiche les catégories-->
				    <?php while ($donnees = $reponse->fetch()):?>
					<tr>
					    <td><?php echo htmlspecialchars($donnees['NomZone']) ?></td>
						<td>
					<?php $req = 'SELECT IdLocaliser, NumReservation, NumZone, SUM(NombreEspace) as som FROM localiser WHERE NumZone=\'' .$donnees['NumZone']. '\'';
						$espace = $mybdd->query($req);
						$espace1 = $espace->fetch();
						$nbrEspace = $espace1['som'];
						echo htmlspecialchars($nbrEspace);
					?></td>						
					<td>
						<form method="POST" action="supZone.php">
							<input type="hidden" name="zoneID" value="<?php echo $donnees['NumZone']; ?>" />			
                            				<input type="submit" style="float:right;" value="Suppr" />
                        			</form>
						
						<form method="POST" action="AfficherJeuxZone.php">
							<input type="hidden" name="zoneID" value="<?php echo $donnees['NumZone']; ?>" />
                            				<input type="submit" style="float:right;" value="Voir jeux" />
                        			</form>
					</td>
					</tr>
				    <?php endwhile; ?>
				</tbody>
			    </table>
    
		<middle>


</div>

</html>
