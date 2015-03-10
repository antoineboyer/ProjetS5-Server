<!--Page de présentation de l'application Boat tracker -->
<html>

   <head>
   	<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
      <title>Boat Tracker</title>
      <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
      <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <link rel="stylesheet" href="style.css" type="text/css" media="screen"/ />
      <script src="http://www.openlayers.org/api/OpenLayers.js" type="text/javascript"></script>   
      <script src="http://maps.google.com/maps/api/js?v=3.5&amp;sensor=false"></script>
      <script type="text/javascript" src="carte.js"></script>

      
   </head>	

   <body id ="bodyIndex">
      <div class="container">
         <div class="jumbotron">
            <header class="row">
               <div class="col-md-12">
                  <h2 >Boat Tracking</h2>
               </div>
            </header>
         </div>
         <div class="row">
               <nav class="col-md-2">
                  <h3 class="blanc">Menu</h3>
                  <!--Lien vers la carte BoatTracker -->
                  <h4 ><a class="blanc" href="Carte/carte.php"> Voir la carte </a></h4>
               </nav>
      	     <div class="col-md-8"> 
                  <div > 
                     <h2 class="blanc"> Description </h2> 
                     <p class="blanc">La course en mer, appelé plus communément régate, 
                        s’articule en général autour de différentes bouées. Ces bouées 
                        représentent le parcours que doit effectuer le voilier tout au long de la course. 
                        Pour pouvoir participer activement à des régates, les non-voyants doivent connaître
                         la position de ces bouées. Or à l’heure actuelle, il n’existe pas de systèmes adaptés
                          aux non-voyants permettant de connaître la position des bouées en temps réel sur un bateau. 
                          Pour pouvoir créer un tel produit, il faut d’abord rendre la bouée et le bateau communicants. 
                          Ceci est la finalité de notre projet.</p>
                  </div> 
               </div>
              <div class="col-md-2"></div> 
         </div>
         <div class="row">
            <div class="col-md-8 col-md-offset-2">
               
               
            </div>
         <div>
         
         <footer class="row">
            <div class="col-md-12">
               
            </div>
         </footer>
      </div>
   </body>
   </html>

   