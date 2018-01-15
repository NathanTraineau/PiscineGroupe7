<?php
	include'inc/header.php';
	//include'conexion2.php';
	



?>
<middle>
<form action= "AjoutFestivalFunc.php" method="POST" >
    <legend>Festival</legend>
    <p>
        <label for="AnneeFestival">Annee Festival</label> : <input type="int" name="AnneeFestival" id="AnneeFestival" required  />
    </p>
                    
    <p>
        <label for="DateFestival">Date Festival</label> : <input type="date" name="DateFestival" id="DateFestival" required/>

    </p>
    <p>
        <label for="NombreTables">Nombre Tables</label> : <input type="text" name="NombreTables" id="NombreTables" required/>

    </p>
    <p>
        <label for="PrixPlaceStandard">Prix Place Standard</label> : <input type="text" name="PrixPlaceStandard" id="PrixPlaceStandard" required/>
        <!--<label for="Num">NUM </label><input type="number" name="numEditeur" id="numEditeur" required/>-->

    </p>
    <input type="submit" value="Ajouter Festival" id = "add" />
</form>
</middle>
</body>
</html>