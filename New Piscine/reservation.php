
<?php

    include'inc/header.php';

    //$servername = "localhost";
    //$username = "root";
    //$password = "";
    //$dbname = "piscine";
    //$editeur= "editeur";

    $myPDO = new PDO('mysql:host=localhost;dbname=piscine', 'root');


    $sql1 = "SELECT *
            FROM `reservation`";
     
    $q = $myPDO->query($sql1);
    
    ?>
    <div class="container">
    <form method="POST" action="InfoReservation.php">

        <label for="DateReservation" style="font-size: 16px">Date de la reservation</label> :

    </br>
        <input type="text" name="" id="nomEditeur"  > 
    </br>
        <input type="submit" class = "recherche" style="left:20px;" id="recherche" value="Rechercher" /></button>
    </form>

    </br>

    <table class="table table-bordered table-condensed" id="editeur">
        <thead>
            <tr>
                <th>DateReservation</th>
                <th>Commentaire</th>
                <th>PrixEspace</th>
                <th>Statut</th>
                <th>EtatFacture</th>
                <th>Actions</th>
                <th>Informations</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($r = $q->fetch()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($r['DateReservation']) ?></td>

                    <td><?php echo htmlspecialchars($r['Commentaire']); ?></td>

                    

                    <td><?php echo htmlspecialchars($r['PrixEspace']); ?></td>
                    <td><?php echo htmlspecialchars($r['Statut']); ?></td>
                    <td><?php echo htmlspecialchars($r['EtatFacture']); ?></td>

                    <td>
                        <form method="POST" action="supReservation.php">
                            <input type="hidden" name="ReservationID" value="<?php echo $r['NumReservation']; ?>" />
                            <input type="submit" style="float:right;" id="suppr" value="Supprimer" /></button>
                        </form>
                        <form method="POST" action="modifReservation.php">
                            <!--<button type="submit">Modif</button> -->
                            <input type="hidden" name="ReservationID" value="<?php echo $r['NumReservation']; ?>" />
                            <input type="submit" style="float:right;" id="modif" value="Modifier" /></button>
                        </form>
                    </td>
                    <td>
                        <form method="POST" action="InfoReservation.php">
                            <!--<button type="submit">Modif</button> -->
                            <input type="hidden" name="infoID" value="<?php echo $r['NumReservation']; ?>" /> <!-- met en mémoire pour env en post, le num de l'editeur -->
                            <input type="submit" style="float:right;" id="info" value="info" />Voir Informations</button>
                        </form>
                        <!-- <form method="POST" action="modifEditeur.php"> 
                            
                            <input type="submit" style="float:right;" id="modif" value="Modif"/>Modif</button>
                        </form>-->
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

        </p>
            <form method="POST" action="ajoutReservation.php">
            <button class="button" type="submit">Ajouter Reservation</button>
        </form>
        </form>
        </middle>
    </div>
<style>
#editeur {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

#editeur td, #editeur th {
    border: 1px solid #ddd;
    padding: 8px;
}

#editeur tr:nth-child(even){background-color: #f2f2f2;}

#editeur tr:hover {background-color: #ddd;}


#editeur th {
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
    padding: 16px 32px;
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

.recherche {
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 10px 25px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
    cursor: pointer;
}

.recherche {
    background-color: white; 
    color: black; 
    border: 2px solid #4CAF50;
}

.recherche:hover {
    background-color: #4CAF50;
    color: white;
}

input[type=text] {
    width: 130px;
    -webkit-transition: width 0.4s ease-in-out;
    transition: width 0.4s ease-in-out;
}

/* When the input field gets focus, change its width to 100% */
input[type=text]:focus {
    width: 35%;
}

    </style>
</body>
</html>