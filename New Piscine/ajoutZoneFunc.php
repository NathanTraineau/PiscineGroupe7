<html>

	<?php
		//connexion base de donnees
		$mybdd = new PDO('mysql:host=localhost;dbname=piscine', 'root', '');

		$nz=$_POST['NameZone'];

		// on verifie si une zone existe déjà à ce nom:
		$existe=$mybdd->prepare(' SELECT * FROM zone WHERE NomZone= :nom');
		$existe->execute(array('nom'=>$nz));
		$existe = $existe->fetch();
		$existe = $existe['NumZone'];
		if ( !empty($existe)){ ?>
		<h1> Une zone de ce nom est déjà créée</h1>
		<?php }else{

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
	<?php } ?>
</html>
