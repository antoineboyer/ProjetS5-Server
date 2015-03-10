<!--La page principale de BoatTracker côté serveur, elle est comme un tableau de bord (affichage de la carte et des paramètres en temps réel) -->
<html>

   <head>
   	<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
      <title>Premiere carte avec OpenStreetMap</title>
      <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
   	<link rel="stylesheet" href="../css/style.css" type="text/css">
      <script src="http://www.openlayers.org/api/OpenLayers.js" type="text/javascript"></script>   
      <script src="http://maps.google.com/maps/api/js?v=3.5&amp;sensor=false"></script>
      <script type="text/javascript" src="carte.js"></script>
      <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.1.min.js"></script>


      
   </head>	
   <!-- Instenciation de la carte grâce au fichier carte.js-->
   <body onload="map = init(); affichageMap(-4.57071912, 48.35752164, map);">
   <script type="text/javascript">
   </script>
      <div class="container">
         <div class="jumbotron">
            <header class="row">
               <div class="col-md-12">
                  <h2>Boat Tracking</h2>
               </div>
            </header>
         </div>
         <div class="row">
               <nav class="col-md-2">
                  <h3>Menu</h3>
                  
               </nav>
      	     <div class="col-md-8"> 
               <!-- Affichage de la carte 'map'-->
                  <div id="map"></div> 
               </div>
              <div class="col-md-2"></div> 
         </div>
         <div class="row">
            <div id ="Bateau" class="col-md-offset-1" class="col-md-11 ">
               <!-- Ici, affichage des données bateaux sous forme de tableau-->
               <?php
               include('donneeBateau.php');
               ?>
            </div>
         <div>
         <div class="row">
            <div id="Bouee" class="col-md-offset-1" class="col-md-11" >
               <!-- Ici, affichage des données bouées sous forme de tableau-->
               <?php
               include('donneeBouee.php');
               ?>
            </div>
         <div>


         <div class="row">
            <div class="col-md-offset-1" class="col-md-11">
               <!-- Ici, possiblité de modification de la fréquence d'émission des bateaux/bouées-->
               <?php
               include('frequence.php');
               ?>
            </div>
         </div>

         <footer class="row">
            <div class="col-md-12">
               Pied de page, OpenStreetMap rocks !
            </div>
         </footer>
      </div>
   </body>
   </html>

<!-- Ici, les fichiers JS/AJAX pour rafraîchir automatiquement certains div de la page-->
   
    <script src="refreshAppareil.js"></script> 









