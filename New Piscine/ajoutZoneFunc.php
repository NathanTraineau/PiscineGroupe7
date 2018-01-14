<html>

	<?php
		//connexion base de donnees
		$mybdd = new PDO('mysql:host=localhost;dbname=piscine', 'root', '');
		$requete= $mybdd->prepare('INSERT INTO zone (NumZone, NomZone) VALUES (NULL, :nomZone)');
		$requete->execute(array('nomZone'=>$_POST['NameZone']));

	?>

	<!-- RETOUR -->
	
	<script type="text/javascript">location.href = 'zone.php';</script>

</html>
