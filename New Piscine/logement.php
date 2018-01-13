<?php
    include'inc/header.php';
    //$servername = "localhost";
    //$username = "root";
    //$password = "";
    //$dbname = "piscine";
    //$editeur= "editeur";
    $myPDO = new PDO('mysql:host=localhost;dbname=piscine', 'root', '');

    $sql = "SELECT * FROM `logement`";

    // Rajouter un nom logement à la bdd

   	//Penser à changer l'orthographe de longement en logement à certains endroits 
    
     
    $q = $myPDO->query($sql);
    ?>
    <div class="col-md-4">
    <table class="table table-bordered table-condensed">
        <thead>
            <tr>
                <th>Nom Logement</th>
                <th>Ville </th>
                <th>Rue </th>
                <th>Code Postale </th>
                <th>Nombre Chambres </th>
                <th>Cout par nuit </th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php while ($r = $q->fetch()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($r['NomLogement']) ?></td>
                    <td><?php echo htmlspecialchars($r['VilleLogement']); ?></td>
                    <td><?php echo htmlspecialchars($r['RueLogement']); ?></td>
                    <td><?php echo htmlspecialchars($r['CodePostaleLogement']); ?></td>
                    <td><?php echo htmlspecialchars($r['NombreChambres']); ?></td>
                    <td><?php echo htmlspecialchars($r['CoutLogementNuit']); ?></td> 
                    <td>
                        <form method="POST" action="supLogement.php">
                            <input type="hidden" name="LogementID" value="<?php echo $r['NumLogement']; ?>" />
                            <input type="submit" style="float:right;" id="suppr" value="Suppr" />
                        </form>
                        <form method="POST" action="modifLogement.php">
                        	<input type="hidden" name="LogementID" value="<?php echo $r['NumLogement']; ?>" />
                            <input type="submit" style="float:right;" id="modif" value="modif" />
                            
                        </form>
                        <!-- <form method="POST" action="modifEditeur.php"> 
                            
                            <input type="submit" style="float:right;" id="modif" value="Modif"/>Modif</button>
                        </form>-->
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>
    <?php 

    //$nom = $_POST['nom'];
    //$pass = $_POST['pass'];
    //echo $nom;
    //echo ' ';
    //echo $pass;
    //$utilisateur1= "alexandra";
    //$pass1 = "alex";
    //if ($nom !== $utilisateur1 and $pass !== $pass1){
        //<script type="text/javascript">location.href = 'accueil.php';</script>
        //myFunction();
    //}
//SHOW [FULL] {COLUMNS | FIELDS}
    //{FROM | IN} $editeur
    //[{FROM | IN} $dbname]
    //[LIKE 'pattern' | WHERE expr]
    //SHOW COLUMNS FROM $dbname.$editeur;


    //$sql = "SELECT NumEditeur, NomEditeur, RueEditeur FROM editeur";
    //$result = $myPDO->query($sql);

//if ($result->num_rows > 0) {
    // output data of each row
    //while($row = $result->fetch_assoc()) {
        //echo "<br> id: ". $row["id"]. " - Name: ". $row["firstname"]. " " . $row["lastname"] . "<br>";
    //}
//} else {
  //  echo "0 results";
//}

//$myPDO->close();
//?>



<middle>


    </p>
    <form method="POST" action="ajoutLogement.php">
    <button type="submit">Ajouter Logement</button>
</form>
</form>
</middle>
</body>
</html>
	