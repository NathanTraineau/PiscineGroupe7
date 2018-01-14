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

		//on crée l'entité regrouper:
		//on récupère le num de la zone qui vient d'être créé
		$sql2 =	' SELECT NumZone, NomZone FROM zone WHERE NomZone=\'' . $nomEditeur . '\'';	
		$reponse2 = $mybdd->query($sql2);
		$reponse2 = $reponse2 ->fetch();
		$numZone=$reponse2['NumZone'];
		echo ''.$numZone.' ';//ok
		echo ''.$editeur.'';//ok
		//on crée l'entité regrouper
		$requete2= $mybdd->prepare('INSERT INTO regrouper (IdRegrouper, NumEditeur, NumZone) VALUES (NULL, :numED, :numZ)');
		$requete2->execute(array('numED'=>$editeur, 'numZ'=>$numZone));
		//echo ''.$requete2.'';

	?>

	<!-- RETOUR -->
	
	<script type="text/javascript">location.href = 'zone.php';</script> 

</html>
