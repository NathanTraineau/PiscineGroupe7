
<?php
		//connexion base de donnees
		$mybdd = new PDO('mysql:host=localhost;dbname=piscine', 'root', '');
		//suppression
		$requete= $mybdd->prepare('DELETE FROM zone WHERE NumZone=:idZone');
		$requete->execute(array('idZone'=>$_POST['zoneID']));
?>
<html>
		<script type="text/javascript">location.href = 'zone.php';</script>
</html>
