<?php
// Récupération de l'etat de la derniere emissionSonore, 0 : pas de son ou 1 : son
$son = $donnees2['son'];
// On fixe le parametre On a false, représentant si il doit y avoir une émission sonore
$On = False;
// On regarde pour tout les bateaux si la distance avec la bouée est inferieur à 30 m 
foreach($Tcoordonnees as $tableau)
{
	$distance = (round(get_distance_m($tableau[0],$tableau[1],$lati,$longi)));
	//echo $distance;
	//echo "</br>";
	if ($distance < 30)
	{			
		//On passe a True si un le bateau est à moins de 30m de la bouée
		$On =True;
	}	
}
// Si On a pour valeur false, le son ne doit pas être activé	
if ($On ==False)
{
	//Si le son n'est pas activé, rien à changer
	if($son ==0)
	{
		echo $son;
	}
	//Si le son est activé, on change sa valeur dans la BDD
	else
	{
		$db = mysqli_connect('localhost', 'root', 'root', 'testcarte') or die ("Erreur : " . mysqli_error($db));
		$sql = "UPDATE Appareil
				SET emissionSonore = '0'
				WHERE id = '$id'
				";
		$req = mysqli_query($db,$sql);
		if(! $req )
		{
	  	die('Could not update data: ' . mysql_error());
		}
		//mysqli_close($db);
		echo "0";
	}
}
// Si On a pour valeur true, le son doit être activé	
else
{
	//Si le son est activé, rien à changer
	if($son ==1)
	{
		echo $son;
	}
	//Si le son n'est pas activé, on change sa valeur dans la BDD
	else
	{
		$db = mysqli_connect('localhost', 'root', 'root', 'testcarte') or die ("Erreur : " . mysqli_error($db));
		$sql = "UPDATE Appareil
				SET emissionSonore = '1'
				WHERE id = '$id'
				";
		$req = mysqli_query($db,$sql);
		if(! $req )
		{
	  	die('Could not update data: ' . mysql_error());
		}
		//mysqli_close($db);
		echo "1";
	}
}
?>