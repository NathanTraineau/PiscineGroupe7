
			<?php

			    //en tête
			    include'inc/header.php';
			   //connexion bdd
			    $mybdd = new PDO('mysql:host=localhost;dbname=piscine', 'root', '');

			    $requete = "SELECT CodeCategorie, NomCategorie FROM categorie";
			     
			    $reponse = $mybdd->query($requete);

			    ?>
<p>
				<form method="POST" action="jeux.php">
				<input type="submit" value="Retour aux jeux" />
				
			</form>
</p>

			    <!--tableau des categorie-->
			    <table class="table table-bordered table-condensed">
				<thead>
				    <tr>
					<th>Catégorie</th>
				    </tr>
				</thead>
				<tbody>
					<!--Affiche les catégories-->
				    <?php while ($donnees = $reponse->fetch()):?>
					<tr>
					    <td><?php echo htmlspecialchars($donnees['NomCategorie']) ?></td>
					<td>
						<form method="POST" action="supCategorie.php">
							<input type="hidden" name="catID" value="<?php echo $donnees['CodeCategorie']; ?>" />
							<!-- met en mémoire pour env en post, le code de la categorie -->
                            				<input type="submit" style="float:right;" value="Suppr" />
                        			</form>
					</td>
					</tr>
				    <?php endwhile; ?>
				</tbody>
			    </table>
    
		<middle>

			    <form method="POST" action="ajoutCategorie.php">
			    <input type="submit" value="Ajouter une categorie" />
	
			</form>
				
		</middle>
	</body>
</html>
