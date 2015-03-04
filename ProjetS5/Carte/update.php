<?php
	//Modification de la fréquence
	if($_POST["freq"]!=NULL)
	{
		//On récupère la fréquence et l'id entré par l'utilisateur
		$freq = $_POST["freq"];
		$int =(int)$freq;
		$id = $_POST["identifiant"];		
		// Si la fréquence est comprise dans cette fourchette, on modifie la valeur de la fréquence
		if ($int>=1 && $int<=100000)
		{	
			$db = mysqli_connect('localhost', 'root', 'root', 'testcarte') or die ("Erreur : " . mysqli_error($db));

			$sql = "UPDATE Appareil
					SET freq = '$freq'
					WHERE id = '$id'
					";
			$req = mysqli_query($db,$sql);
			if(! $req )
			{
		  	die('Could not update data: ' . mysql_error());
			}

		header('Location:/ProjetS5/Carte/carte.php');
		}
		// Sinon, on envoie un message d'erreur
		else
		{ 
			
			?>
				<h5> <center> Erreur, votre fréquence doit être comprise entre 1 et 10 000 et doit être entière! </center> </h5>
				<h5> <center> Veuillez recommencez ! </center> </h5>
				<center>
				<form method="post" action="/ProjetS5/Carte/carte.php">   		
		       	<input type="submit" value="Revenir"/>
				</form>
				</center>

			<?php
		}
	}

	//Modification de l'émission GPS
	if($_POST["emission"]!=NULL)
	{	
		$emission = $_POST["emission"];
		$id = $_POST["identifiant"];
		$db = mysqli_connect('localhost', 'root', 'root', 'testcarte') or die ("Erreur : " . mysqli_error($db));
		//Si l'émission est à 0, on la met à 1
		if ($emission == "0")
		{
			$sql = "UPDATE Appareil
					SET emissionGPS = '1'
					WHERE id = '$id'
					";
			$req = mysqli_query($db,$sql);
			if(! $req )
			{
		  	die('Could not update data: ' . mysql_error());
			}

		header('Location:/ProjetS5/Carte/carte.php');
		}
		//Si l'émission est à 1, on la met à 0
		else
		{
			$sql = "UPDATE Appareil
					SET emissionGPS = '0'
					WHERE id = '$id'
					";
			$req = mysqli_query($db,$sql);
			if(! $req )
			{
		  	die('Could not update data: ' . mysql_error());
			}

		header('Location:/ProjetS5/Carte/carte.php');	
		}
	}
?>