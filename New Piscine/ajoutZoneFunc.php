<html>

	<?php
		//connexion base de donnees
		$mybdd = new PDO('mysql:host=localhost;dbname=piscine', 'root', '');


		$nz=$_POST['NameZone'];

		//Selectionne le festival
		$sqltest = "SELECT * from Festival WHERE Courant = '1' ";
		$test = $mybdd->query($sqltest);
		$Festival = $test->fetch();
		$annee = $Festival['AnneeFestival'];
		
		$requete="INSERT INTO zone (NumZone, NomZone, AnneeZone) VALUES (NULL, '$nz', '$annee')";
		$reponse= $mybdd->query($requete);
		
	?>

	<!-- RETOUR -->
	
	<script type="text/javascript">location.href = 'zone.php';</script>

</html>
