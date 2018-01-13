

<?php
	
	//include'conexion2.php';

    $myPDO = new PDO('mysql:host=localhost;dbname=piscine', 'root', '');

    	$annee= $myPDO->querry("SELECT Annee FROM 'Annee ") ->fetch();

 		$sql2 = "SELECT * FROM `jeux` where NumEditeur = '".$NumEditeur."' , AnneeJeux = '".$annee."' ";

    	$jeux = $myPDO->query($sql2);


    	$reservation = $myPDO->query($sql2); ?>

    		<table class="table table-bordered table-condensed" id="jeux">
                <thead>
                    <tr>
                        <th>Nom Jeux</th>
                        <th>Nombre Joueur</th>
                        <th>Date sortie</th>
                        <th>Duree Partie</th>
                        <th>Id Editeur</th>
                        <th>Id Categorie</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
            <?php
            while ($r = $jeux->fetch()): ?>
                <tr>
                	
                    		<td><?php echo htmlspecialchars($r['NomJeux']) ?></td>
                            <td><?php echo htmlspecialchars($r['NombreJoueur']); ?></td>
                            <td><?php echo htmlspecialchars($r['DateSortie']); ?></td>
                            <td><?php echo htmlspecialchars($r['DureePartie']); ?></td>
                            <td><?php echo htmlspecialchars($r['NumEditeur']); ?></td>
                            <td><?php echo htmlspecialchars($r['CodeCategorie']); ?></td>
                            <td>

                        	<form method="POST" action="ajoutJeuxReservation.php">
                        	<input type="int" name="nombre" > Nombre de jeux <br>
                            <input type="bool" name="recu"  > Recu <br>
                            <input type="bool" name="Retour"  > A retourner <br>
                            <input type="bool" name="Don" > Don <br>
                            <input type="bool" name="zoneEditeur" > Zone editeur <br>
                         	<input type="submit" name="submit" >

                         	</form>
                </td>
            </tbody>
                        
                        
                        <!-- ajout jeux reservation : ajoute dans concerner les trucs avec le num de résa jsp comment 

                        	Si temps faire un bouton qui suppr le jeux de concerner
                            
                            <input type="submit" style="float:right;" id="modif" value="Modif"/>Modif</button>
                        </form>-->
                    </td>
                </tr>
            <?php endwhile; ?>