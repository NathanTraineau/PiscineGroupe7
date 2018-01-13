<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<style>
			<table>
			{
				text-align= center ;
			}
		</style>
	</head>
</html>

<?php
	include'inc/header.php';
    //$servername = "localhost";
    //$username = "root";
    //$password = "";
    //$dbname = "piscine";
    //$editeur= "editeur";
    if ( !empty($_POST['infoID'])) {
    		$num = $_POST['infoID']; // si ça vient du bouton info on aura la variable infoID en post mais si ça vient de la barre recherche alors c'est la varia nomEditeur qu'on va traduire en NumEditeur juste en dessous.
    		} 
    
    // Il faut penser a mettre cette varia dans toutes les pages qui viennent ici
    $myPDO = new PDO('mysql:host=localhost;dbname=piscine', 'root', '');
    if ( !empty($_POST['nomEditeur']) ) {
    	    $sql3 = "SELECT * FROM `editeur` WHERE NomEditeur = '".$_POST['nomEditeur']."'";
    		$m = $myPDO->query($sql3)->fetch();
    		$num = $m['NumEditeur'];
        
    		}
    $sql2 = "SELECT NumContact, NomContact, PrenomContact, NumTelContact, MailContact
            FROM contact WHERE NumEditeur='".$num."'"; 
    $edit= "SELECT NomEditeur FROM `editeur` WHERE NumEditeur='".$num."'";

    
    $q = $myPDO->query($sql2);
    $NomEdit = $myPDO->query($edit)->fetch();
    ?>
    <form method="POST" action="editeur.php">
    <button type="submit">Retour Editeurs</button>
	</form>
    <table class="table table-bordered table-condensed">
        <thead>
        	<h3>Contacts de <?php echo $NomEdit['NomEditeur'] ?></h3>
            <tr>
                <th>Nom Contact</th>
                <th>Prenom Contact</th>
                <th>Numéro Contact</th>
                <th>Email du Contact</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php while ($r = $q->fetch()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($r['NomContact']) ?></td>
                    <td><?php echo htmlspecialchars($r['PrenomContact']); ?></td>
                    <td><?php echo htmlspecialchars($r['NumTelContact']); ?></td>
                    <td><?php echo htmlspecialchars($r['MailContact']); ?></td>
                    <td>
                        <form method="POST" action="supContact.php">
                            <input type="hidden" name="ContactID" value="<?php echo $r['NumContact']; ?>" />
                            <input type="hidden" name="infoID" value="<?php echo $num; ?>" />
                            <input type="submit" style="float:right;" id="suppr" value="Suppr" /></button>
                        </form>
                        <form method="POST" action="modifContact.php">
                            <!--<button type="submit">Modif</button> -->
                            <input type="hidden" name="ContactID" value="<?php echo $r['NumContact']; ?>" />
                            <input type="hidden" name="infoID" value="<?php echo $num; ?>" />
                            <input type="submit" style="float:right;" id="suppr" value="modif" /></button>
                        </form>
                        <!-- <form method="POST" action="modifEditeur.php"> 
                            
                            <input type="submit" style="float:right;" id="modif" value="Modif"/>Modif</button>
                        </form>-->
                    </td>
                </tr>
            <?php endwhile; ?>
    
        </tbody>
    </table>
    <form method="POST" action="AjoutContact.php">
        <input type="hidden" name="infoID" value="<?php echo $num; ?>" />
		<button type="submit">Ajouter un contact</button>
	</form>

<!-- On affiche maintenant ses jeux

--> <?php

		$sql2 = "SELECT * FROM jeux WHERE NumEditeur='".$num."'"; 
		$jeux = $myPDO->query($sql2);

	?>
	
	<table class="table table-bordered table-condensed" text-align="center">
        <thead>
        	<h3>Jeux de <?php echo $NomEdit['NomEditeur'] ?></h3>
            
        </thead>
        <tbody>
            <?php while ($JeuxCourant = $jeux->fetch()): ?>
                <tr>
                    <tr><td> Nom du jeux :</td><td><strong><?php echo htmlspecialchars($JeuxCourant['NomJeux']) ?><strong></td> 
                    	<td>  
                    	<form method="POST" action="supJeux.php">
                            <input type="hidden" name="jeuxID" value="<?php echo $r['NumJeux']; ?>">
                            <input type="hidden" name="infoID" value="<?php echo $num; ?>" />
                            <input type="submit" style="float:right;" id="suppr" value="Suppr" />
                        </form>
                    	</td>
                    	<td>
                        <form method="POST" action="modifJeux.php">
                            <!--<button type="submit">Modif</button> -->
                            <input type="hidden" name="jeuxID" value="<?php echo $r['NumJeux']; ?>" />
                            <input type="hidden" name="infoID" value="<?php echo $num; ?>" />
                            <input type="submit" style="float:right;" id="suppr" value="modif" />
                        </form> 
                        </td> 
                    </tr>
                    <tr><td>Nombre de Joueurs : </td><?php echo htmlspecialchars($JeuxCourant['NombreJoueur']); ?></td></tr>
                    <tr><td>Date de Sortie : <td><?php echo htmlspecialchars($JeuxCourant['DateSortie']); ?></td></tr>
                    <tr><td>Duree Partie<td><?php echo htmlspecialchars($JeuxCourant['DureePartie']); ?></td></tr>
                    <tr><td>Categorie penser a faire une fonction qui renvoie le str de la caté<td><?php echo htmlspecialchars($JeuxCourant['CodeCategorie']); ?></td></tr>
                    <tr>
                        
                        <!-- <form method="POST" action="modifEditeur.php"> 
                            
                            <input type="submit" style="float:right;" id="modif" value="Modif"/>Modif</button>
                        </form>-->
                    </td>
                </tr>
            </br>
            <?php endwhile; ?>
    
        </tbody>
    </table>
    <form method="POST" action="ajoutJeux.php">
        <input type="hidden" name="infoID" value="<?php echo $num; ?>" />
		<button type="submit">Ajouter un jeux</button>
	</form>