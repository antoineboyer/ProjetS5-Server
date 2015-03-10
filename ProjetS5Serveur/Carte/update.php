<?php
	//Modification de la fréquence si le post est non null
	if($_POST["freq"]!=NULL)
	{
		// Vérification que la période est compris entre 1000 ms et 1 000 000 ms
		if($_POST["appareils"]!=NULL && $_POST["freq"]!=NULL && 1000<=(int)$_POST["freq"] && (int)$_POST["freq"]<=1000000)
		{
			$id = $_POST[appareils];
			$freq = $_POST[freq];
			//Modification de la fréquence dans la BDD
			$db = mysqli_connect('****,'****','****','****') or die ("Erreur : " . mysqli_error($db));
			$sql = "UPDATE Appareil
					SET freq = '$freq'
					WHERE id = '$id'
					";
			$req = mysqli_query($db,$sql);
			if(! $req )
			{
		  	die('Could not update data: ' . mysql_error());
			}
			header('Location:/TestProjetS5/Carte/carte.php');
		}
		else
		{
			//Affichage d'un message d'erreur si la fréquence n'est pas dans la bonne plage
		?>
			<h5> <center> Erreur, votre fréquence doit être comprise entre 1 000 et 1 000 000! </center> </h5>
			<h5> <center> Veuillez recommencez ! </center> </h5>
			<center>
			<form method="post" action="/TestProjetS5/Carte/carte.php">   		
				<input type="submit" value="Revenir à la carte"/>
			</form>
			</center>
			<?php
		}
	}

	//Modification de l'émission GPS
	elseif($_POST["emission"]!=NULL)
	{	
		$emission = $_POST["emission"];
		$id = $_POST["identifiant"];
		$db = mysqli_connect('****','****','****','****') or die ("Erreur : " . mysqli_error($db));
		//Si l'émission est à 0, on la met à 1
		if ($emission == "0")
		{
			//Modification dans la base de donnée
			$sql = "UPDATE Appareil
					SET emissionGPS = '1'
					WHERE id = '$id'
					";
			$req = mysqli_query($db,$sql);
			if(! $req )
			{
		  	die('Could not update data: ' . mysql_error());
			}
		//Redirection vers carte.php	
		header('Location:/TestProjetS5/Carte/carte.php');
		}
		//Si l'émission est à 1, on la met à 0
		else
		{
			//Modification dans la base de donnée
			$sql = "UPDATE Appareil
					SET emissionGPS = '0'
					WHERE id = '$id'
					";
			$req = mysqli_query($db,$sql);
			if(! $req )
			{
		  	die('Could not update data: ' . mysql_error());
			}
		//Redirection vers carte.php
		header('Location:/TestProjetS5/Carte/carte.php');	
		}
	}

?>