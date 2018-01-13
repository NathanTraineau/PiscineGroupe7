
		<?php

			//en tête
			include'inc/header.php';


		?>

		<middle>
			<!--Formulaire pour ajouter une catégorie-->
	    		<form method="POST" action="ajoutZoneFunc.php">
		    		<legend>Zone</legend>

		    		<p>
					<label for="NomZone" >Nom de la zone</label> : <input type="text" name="NameZone"/>
		            
	    			<input type="submit" value="Ajouter la zone" />
				</p>
			</form>
			<form method="POST" action="zone.php">
				<input type="submit" value="Annuler" />
	
			</form>
		</middle>
	</body>

</html>
