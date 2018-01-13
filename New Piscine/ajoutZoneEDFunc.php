<html>

	<?php
		//connexion base de donnees
		$mybdd = new PDO('mysql:host=localhost;dbname=piscine', 'root', '');
		$editeur = $_POST['numEditeur'];
		//$sql="SELECT NumEditeur, NomEditeur FROM `editeur` WHERE NumEditeur='$editeur' ";
		$sql =	' SELECT NumEditeur, NomEditeur FROM editeur WHERE NumEditeur='$editeur' ';	
		$reponse = $mybdd->query($sql);
		
		//print_r($reponse);
		//$ajout="INSERT INTO zone (NumZone, NomZone) VALUES (NULL, '$nomEditeur')";
		//$requete1= $mybdd->prepare('INSERT INTO zone (NumZone, NomZone) VALUES (NULL, '$editeur')');
		//$requete1->execute(array('nomZone'=>$_POST['NameZone']));
		//$requete2= $mybdd->prepare('INSERT INTO regrouper (IdRegrouper, NumEditeur, NumZone) VALUES (NULL, :numEditeur, :numZone)');
		//$requete2->execute(array('nomZone'=>$_POST['NameZone']));
	?>

	<!-- RETOUR 
	
	<script type="text/javascript">location.href = 'zone.php';</script> -->

</html>
