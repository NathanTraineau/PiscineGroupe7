<?php
  include'inc/header.php';

   $myPDO = new PDO('mysql:host=localhost;dbname=piscine', 'root', '');
   

  $sql = "SELECT AnneeFestival, DateFestival, NombreTables,  PrixPlaceStandard FROM `festival`";
  $q= $myPDO->query($sql)->fetch();
?>

<!--#85e085-->

<style>
    body  {
        background-image: url("images/jeux.png");
        background-color: #cccccc;
        background-opacity: 1;

    .button {background-color: #555555;} /* Black */
    }

    h2 {
    color:   #000000;
    font-style: oblique;
    }

.button {
    background-color: #000000; /* Green */
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
    border: 2px solid #000000;
}

.button:hover {
    background-color: #000000;
    color: white;
}

</style>
<div class="container">
</br>
</br>
</br>

  <h2>L'année du festival est: <?php echo $q[0] ?></h3>
  <h2>La date du festival est: <?php echo $q[1] ?></h3>
  <h2>Le nombre de tables du festival est: <?php echo $q[2] ?></h3>
  <h2>Le prix standard par table du festival est: <?php echo $q[3] ?></h3>

  <form action= "AjoutFestival.php" method="POST" >
           <button class="button" type="submit">Ajouter un Festival</button>

  </form>

</div>
</body>






</html> 
