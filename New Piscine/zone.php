
			<?php

			    //en tête
			    include'inc/header.php';
			   //connexion bdd
			    $mybdd = new PDO('mysql:host=localhost;dbname=piscine', 'root', '');

			    $requete = "SELECT NumZone, NomZone FROM zone";
			     
			    $reponse = $mybdd->query($requete);

			    ?>

<<<<<<< HEAD

=======
		<div class="container">
		    <form method="POST" action="ChoixZone.php">
		    	<label for="zones" style="font-size: 16px">Zones</label> :
		    
>>>>>>> 76cb15ec5be9351bec9c30bd15ed5d37a66ee907
			    <!--tableau des categorie-->
			    <table class="table table-bordered table-condensed">
				<thead>
				    <tr>
					<th>Zones</th>
<<<<<<< HEAD
=======
					<th>Actions</th>
>>>>>>> 76cb15ec5be9351bec9c30bd15ed5d37a66ee907
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
<<<<<<< HEAD
						<form method="POST" action="ajoutJeuxZone.php">
							<input type="hidden" name="zoneID" value="<?php echo $donnees['NumZone']; ?>" />
                            				<input type="submit" style="float:right;" value="Ajouter un jeu dans cette zone" />
                        			</form>
=======
						
>>>>>>> 76cb15ec5be9351bec9c30bd15ed5d37a66ee907
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

<<<<<<< HEAD
			    <form method="POST" action="ajoutZone.php">
=======
			    <!--<form method="POST" action="ChoixZone.php">-->
>>>>>>> 76cb15ec5be9351bec9c30bd15ed5d37a66ee907
			    <input type="submit" value="Ajouter une zone" />
	
			</form>
				
		</middle>
	</body>
<<<<<<< HEAD
=======
</div>
>>>>>>> 76cb15ec5be9351bec9c30bd15ed5d37a66ee907
</html>
