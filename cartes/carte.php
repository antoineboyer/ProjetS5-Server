<html>

   <head>
   	<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
      <!--<meta http-equiv="Refresh" content="10"> -->
      <title>Premiere carte avec OpenStreetMap</title>
      <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
      <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
   	<link rel="stylesheet" href="style.css" type="text/css">
      <script src="http://www.openlayers.org/api/OpenLayers.js" type="text/javascript"></script>   
      <script src="http://maps.google.com/maps/api/js?v=3.5&amp;sensor=false"></script>
      <script type="text/javascript" src="carte.js"></script>

      
   </head>	

   <body onload="map = init(); affichageMap(-4.56854, 48.35825, map);">
      <div class="container">
         <div class="jumbotron">
            <header class="row">
               <div class="col-md-12">
                  <h2>Boat Tracking</h1>
               </div>
            </header>
         </div>
         <div class="row">
               <nav class="col-md-2">
                  <h4>Menu</h2>
               </nav>
      	     <div class="col-md-8"> 
                  <div id="map"></div> 
               </div>
              <div class="col-md-2"></div> 
         </div>
         <div class="row">
            <div class="col-md-12">
               <input type="button" id="button1" value="zoom quelque part"> 
               <script>
                  var element = document.getElementById("button1");

                              element.addEventListener('click',
                                                      function()
                                                      {
                                                         //var map = init();
                                                         //affichageMap(-4.56854, ++longitude, map);
                                                         //init(-4.56854, 30.35825)
                                                         //var map = document.getElementById("map");
                                                         map.setCenter(new OpenLayers.LonLat(10.56854, 48.35825).transform(new OpenLayers.Projection("EPSG:4326"),map.getProjectionObject()), 14);
                                                      
                                                      },false);


               //Exemple de refresh d'élement de page sans utiliser AJAX
               /*
               longitude = 41.35825;
                  $(document).ready(
                     function() 
                     {
                        setInterval(function() 
                        {
                           affichageMap(-4.56854, ++longitude, map);
                        }, 3000);
                     });
               */
               </script> 
               
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

   