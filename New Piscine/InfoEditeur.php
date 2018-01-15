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
<div class="container">
    <form method="POST" action="editeur.php">
    <button type="submit">Retour Editeurs</button>
	</form>
    <table class="table table-bordered table-condensed" id="contact">
        <thead>
        	<h3>Contacts de <?php echo $NomEdit['NomEditeur'] ?></h3>
            <tr>
                <th>Nom Contact</th>
                <th>Prenom Contact</th>
                <th>Numéro Contact</th>
                <th>Email du Contact</th>
                <th>Actions</th>
              
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
		<button class="button" type="submit">Ajouter un contact</button>
	</form>

<!-- On affiche maintenant ses jeux

--> <?php

		$sql2 = "SELECT * FROM jeux WHERE NumEditeur='".$num."'"; 
		$jeux = $myPDO->query($sql2);

	?>
	
	<table class="table table-bordered table-condensed" text-align="center" id="jeux">
        <thead>
        	<h3>Jeux de <?php echo $NomEdit['NomEditeur'] ?></h3>
             <tr>
                    <th>Nom du jeux </th>
                    <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($JeuxCourant = $jeux->fetch()): ?>
                    <!--<td><?php echo htmlspecialchars($JeuxCourant['NomJeux']) ?></td>-->
                <tr>
                    <td><?php echo htmlspecialchars($JeuxCourant['NomJeux']);?></td>
                    
                    <td>  
                        <form method="POST" action="supJeux.php">
                            <input type="hidden" name="jeuxID" value="<?php echo $JeuxCourant['NumJeux']; ?>">
                            <input type="hidden" name="infoID" value="<?php echo $num; ?>" />
                            <input type="submit" style="float:right;" id="suppr" value="Supprimer" />
                        </form>
                        
                        
                        <form method="POST" action="modifJeux.php">
                            <!--<button type="submit">Modif</button> -->
                            <input type="hidden" name="jeuxID" value="<?php echo $JeuxCourant['NumJeux']; ?>" />
                            <input type="hidden" name="infoID" value="<?php echo $num; ?>" />
                            <input type="submit" style="float:right;" id="suppr" value="Modifier" />
                        </form> 

                         <form method="POST" action="InfoJeux.php">
                            <!--<button type="submit">Modif</button> -->
                            <input type="hidden" name="infoID" value="<?php echo $JeuxCourant['NumJeux']; ?>" />
                            <input type="hidden" name="editeurID" value="<?php echo $num; ?>" />
                            <input type="submit" style="float:right;" id="suppr" value="Info" />
                        </form> 
                        </td> 
                </tr>
                
            <?php endwhile; ?>
    
        </tbody>
    </table>
    <form method="POST" action="ajoutJeux.php">
        <input type="hidden" name="infoID" value="<?php echo $num; ?>" />
		<button class="button" type="submit">Ajouter un jeux</button>
	</form>
</div>
<style>
#jeux {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}
#jeux th {
    border: 1px solid #ddd;
    padding: 8px;
}

#jeux tr:nth-child(even){background-color: #f2f2f2;}

#jeux tr:hover {background-color: #ddd;}

#jeux th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #4CAF50;
    color: white;

}
#contact {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}
#contact th {
    border: 1px solid #ddd;
    padding: 8px;
}

#contact tr:nth-child(even){background-color: #f2f2f2;}

#contact tr:hover {background-color: #ddd;}

#contact th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #4CAF50;
    color: white;

}
.button {
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 10px 15px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
    cursor: pointer;
}

.button {
    background-color: white; 
    color: black; 
    border: 2px solid #4CAF50;
}

.button:hover {
    background-color: #4CAF50;
    color: white;
}


    </style>
</html>