<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "testcarte";

// Création de la connexion à la BDD
$conn = new mysqli($servername, $username, $password, $dbname);
// Vérification de la connexion à la BDD
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// Création de la table Device (répertorie les beteaux et les bouées)
$sql = "CREATE TABLE IF NOT EXISTS Appareil (
AndroidId VARCHAR(30) NOT NULL PRIMARY KEY, 
nom VARCHAR(30) NOT NULL,
type VARCHAR(30) NOT NULL,
freq VARCHAR(30),
batterie VARCHAR(30),
sound boolean,
parcours VARCHAR(50)
)
";

// Création de la table DataBoat (Données GPS des bateaux)
$sql2 = "CREATE TABLE IF NOT EXISTS HistBateau (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
idEtranger INT(6) UNSIGNED NOT NULL, 
lati VARCHAR(30) NOT NULL,
longi VARCHAR(30) NOT NULL,
precision VARCHAR(30) NOT NULL,
dateheure datetime,
cap VARCHAR(30),
vitesse VARCHAR(30),
FOREIGN KEY (idEtranger) REFERENCES Device(id)
)
";

// Création de la table DataBoat (Données GPS des bouées)
$sql3 = "CREATE TABLE IF NOT EXISTS HistBouee (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
idEtranger INT(6) UNSIGNED NOT NULL, 
lati VARCHAR(30) NOT NULL,
longi VARCHAR(30) NOT NULL,
dateheure datetime,
FOREIGN KEY (idEtranger) REFERENCES Device(id)
)
";
// Envoie de la requête
if ($conn->query($sql) === TRUE && $conn->query($sql2) === TRUE && $conn->query($sql3) === TRUE ) {
    echo "Tablescreated successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

//Ajout de données à la BDD
$add1 = "INSERT IGNORE INTO Device (id, nom, type, freq, batterie, sound, parcours) 
		 VALUES ('2', 'leNormand', 'bateau', '0,1', '100', '0', NULL)
		";
$add2 = "INSERT IGNORE INTO Device (id, nom, type, freq, batterie, sound, parcours) 
		 VALUES ('3', 'auVent', 'bouee', '0,1', '100', '0', NULL)
		";
$add3 = "INSERT IGNORE INTO Device (id, nom, type, freq, batterie, sound, parcours) 
		 VALUES ('4', 'auPres', 'bouee', '0,1', '100', '0', NULL)
		";

$add4 = "INSERT IGNORE INTO DataBoat (id, idEtranger, lati, longi, dateheure, cap, vitesse) 
		 VALUES ('2', '2', '5.00000', '41.00000', '2015-02-25 00:00:00', NULL, NULL);";

$add5 = "INSERT IGNORE INTO DataBouee (id, idEtranger, lati, longi, dateheure) 
		 VALUES ('1', '3', '6.00000', '41.00000', '2015-02-25 00:00:00');";

$add6 = "INSERT IGNORE INTO DataBouee (id, idEtranger, lati, longi, dateheure) 
		 VALUES ('2', '4', '7.00000', '41.00000', '2015-02-25 00:00:00');";	 
// Envoie de la requête
if ($conn->query($add1) === TRUE && $conn->query($add2) === TRUE && $conn->query($add3) === TRUE && $conn->query($add4) === TRUE && $conn->query($add5) === TRUE && $conn->query($add6) === TRUE ) 
{
    echo "Add successfully";
} 
else 
{
    echo "Error adding values " . $conn->error;
}

$conn->close();
?>