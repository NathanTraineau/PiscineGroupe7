<html>

	<?php
		//connexion base de donnees
		$mybdd = new PDO('mysql:host=localhost;dbname=piscine', 'root', '');
		$editeur = $_POST['numEditeur'];
		//on récupère le nom de l'editeur
		$sql =	' SELECT NumEditeur, NomEditeur FROM editeur WHERE NumEditeur=\'' . $editeur . '\'';	
		$reponse = $mybdd->query($sql);
		$reponse = $reponse ->fetch();
		$nomEditeur=$reponse['NomEditeur'];
		// on crée une zone à son nom
		$requete1= $mybdd->prepare('INSERT INTO zone (NumZone, NomZone) VALUES (NULL, :ed)');
		$requete1->execute(array('ed'=>$nomEditeur));
	
	?>

	<!-- RETOUR -->
	
	<script type="text/javascript">location.href = 'zone.php';</script> 

</html>
