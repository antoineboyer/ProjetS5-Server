<html>

   <head>
   	<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
      <!--<meta http-equiv="Refresh" content="10"> -->
      <title>Premiere carte avec OpenStreetMap</title>
      <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
   	<link rel="stylesheet" href="../css/style.css" type="text/css">
      <script src="http://www.openlayers.org/api/OpenLayers.js" type="text/javascript"></script>   
      <script src="http://maps.google.com/maps/api/js?v=3.5&amp;sensor=false"></script>
      <script type="text/javascript" src="carte.js"></script>
      <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.1.min.js"></script>


      
   </head>	

   <body onload="map = init(); affichageMap(180, 90, map);">
      <script src="refreshPoints.js"></script>
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
                  <div id="map"></div> 
               </div>
              <div class="col-md-2"></div> 
         </div>
         <div class="row">
            <div id ="Bateau" class="col-md-12 ">
               <!-- Ici je teste 'affichage des données bateaux-->
               <?php
               include('donneeBateau.php');
               ?>
            </div>
         <div>
         <div class="row">
            <div id="Bouee"class="col-md-12 ">
               <!-- Ici je teste 'affichage des données bouées-->
               <?php
               include('donneeBouee.php');
               ?>
            </div>
         <div>


         <div class="row">
            <div class="col-md-12">
               <!-- Emplacement à venir-->
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









