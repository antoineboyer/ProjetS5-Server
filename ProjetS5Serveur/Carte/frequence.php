<!-- Element intégré à carte.php, cette page donne la possiblité de modifier la fréquence en méthode POST -->
<h2>Modifier la fréquence ici ! </h2>
<form method="post" action="update.php">
	<!-- Mis en place d'un select/option permettant de choisir à quel appreil on veut changer la fréquence -->
	<select name="appareils">
		<?php
		$db = mysqli_connect('****','****','****','****') or die ("Erreur : " . mysqli_error($db));
		$sql = "SELECT id, nom  FROM Appareil ";
		$req = mysqli_query($db,$sql);
		//Après avoir selectionné les id et nom des appareils, on affiche les différents noms.
		while($row = mysqli_fetch_assoc($req))
		{
			$id = $row['id'];
			$nom = $row['nom'];
		?>
			<option value="<?php echo $id ?>"><?php echo $nom ?></option>
		<?php	
		}
		?>
	</select>
	<!--Champs permettant de saisir la fréquence souhaité -->
	<input type="number" id="frequence" name="freq"  size="3" />
	<!--Champs permettant de valider -->
	<input type="submit" value="modifier"/>
</form>
