
			<?php

			    //en tête
			    include'inc/header.php';
			   //connexion bdd
			    $mybdd = new PDO('mysql:host=localhost;dbname=piscine', 'root', '');

			    $requete = "SELECT NumZone, NomZone FROM zone";
			     
			    $reponse = $mybdd->query($requete);

			    ?>


			    <!--tableau des categorie-->
			    <table class="table table-bordered table-condensed">
				<thead>
				    <tr>
					<th>Zones</th>
				    </tr>
				</thead>
				<tbody>
					<!--Affiche les catégories-->
				    <?php while ($donnees = $reponse->fetch()):?>
					<tr>
					    <td><?php echo htmlspecialchars($donnees['NomZone']) ?></td>
					<td>
						<form method="POST" action="supZone.php">
							<input type="hidden" name="zoneID" value="<?php echo $donnees['NumZone']; ?>" />			
                            				<input type="submit" style="float:right;" value="Suppr" />
                        			</form>
						<form method="POST" action="ajoutJeuxZone.php">
							<input type="hidden" name="zoneID" value="<?php echo $donnees['NumZone']; ?>" />
                            				<input type="submit" style="float:right;" value="Ajouter un jeu dans cette zone" />
                        			</form>
						<form method="POST" action="AfficherJeuxZone.php">
							<input type="hidden" name="zoneID" value="<?php echo $donnees['NumZone']; ?>" />
                            				<input type="submit" style="float:right;" value="Voir les jeux de cette zone" />
                        			</form>
					</td>
					</tr>
				    <?php endwhile; ?>
				</tbody>
			    </table>
    
		<middle>

			    <form method="POST" action="ajoutZone.php">
			    <input type="submit" value="Ajouter une zone" />
	
			</form>
				
		</middle>
	</body>
</html>
