<?php

	$data0=$_POST["nom"];
	$data1=$_POST["id"];
	$data2=$_POST["type"];

	$identifiant= $data1.$data0.$data2;

	
	$db = mysqli_connect('localhost', 'root', 'root', 'testcarte') or die ("Error " . mysqli_error($db));
	$sql = "SELECT *  FROM Appareil WHERE id = '$identifiant' ";
	$req = mysqli_query($db,$sql);

	
	while($row = mysqli_fetch_assoc($req))
  		echo $row['freq'] . ";" . $row['emissionGPS'] . ";" . $row['emissionSonore'] . ";";
  

?>