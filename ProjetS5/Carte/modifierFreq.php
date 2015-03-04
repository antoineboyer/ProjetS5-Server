<?php
	//On récupère la fréquence entré par l'utilisateur
	$freq = $_POST["freq"];
	$int =(int)$freq;
	$id = $_POST["identifiant"];
	//test
	//echo $freq;echo $id;echo "\n";echo $int;


	if ($int>1 && $int<10000)
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
?>