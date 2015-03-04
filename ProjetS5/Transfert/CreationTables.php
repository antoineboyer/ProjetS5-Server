<?php

	$servername = "localhost";
	$username = "root";
	$password = "root";
	$dbname = "testcarte";

	// Création de la connexion à la BDD
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	// Vérification de la connexion
	if (!$conn) {
    	die("La Connexion a echouee : " . mysqli_connect_error());
	}

	// Création de la table Appareil (répertorie les bateaux et les bouées)
	$sql = "CREATE TABLE IF NOT EXISTS Appareil (
	id VARCHAR(30) PRIMARY KEY, 
	nom VARCHAR(30) NOT NULL,
	type VARCHAR(30) NOT NULL,
	freq VARCHAR(30),
	batterie VARCHAR(30),
	emissionSonore boolean,
	emissionGPS boolean,
	parcours VARCHAR(50)
	)
	";
	
	// Création de la table HistBateau (Données GPS des bateaux)
	$sql2 = "CREATE TABLE IF NOT EXISTS HistBateau (
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	idEtranger VARCHAR(30), 
	lati VARCHAR(30),
	longi VARCHAR(30),
	precisi VARCHAR(30),
	dateheure DATETIME,
	cap VARCHAR(30),
	vitesse VARCHAR(30),
	FOREIGN KEY (idEtranger) REFERENCES Appareil(id)
	)
	";

	// Création de la table HistBouée (Données GPS des bouées)
	$sql3 = "CREATE TABLE IF NOT EXISTS HistBouee (
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	idEtranger VARCHAR(30) NOT NULL, 
	lati VARCHAR(30) NOT NULL,
	longi VARCHAR(30) NOT NULL,
	precisi VARCHAR(30),
	dateheure DATETIME,
	FOREIGN KEY (idEtranger) REFERENCES Appareil(id)
	)
	";
	
	if (mysqli_query($conn, $sql) === TRUE && mysqli_query($conn, $sql2) === TRUE && mysqli_query($conn, $sql3) === TRUE) {
    	echo "Tables creees avec succes!";
	} else {
    	echo "Erreur pendant la creation des tables : " . mysqli_error($conn);
	}

	mysqli_close($conn);
?>