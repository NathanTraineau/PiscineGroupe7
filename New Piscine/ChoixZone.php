<?php
    include'inc/header.php';
?>

	<p> Voulez-vous ajouter une zone Editeur ? </p>
<form action="ajoutZone.php" method="post">

<input type="radio" name="zoneED" value="oui" id="oui"  /> <label for="oui">Oui</label>
<input type="radio" name="zoneED" value="non" id="non" checked="checked"/> <label for="non">Non, une autre zone </label>
  <p>
  <input type="submit" value="Valider" />
  </p>

</form>
</div>


