<html>

   <head>
   	<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
      <!--<meta http-equiv="Refresh" content="10"> -->
      <title>Premiere carte avec OpenStreetMap</title>
      <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
   	<link rel="stylesheet" href="style.css" type="text/css">
      <script src="http://www.openlayers.org/api/OpenLayers.js" type="text/javascript"></script>   
      <script src="http://maps.google.com/maps/api/js?v=3.5&amp;sensor=false"></script>
      <script type="text/javascript" src="carte.js"></script>
   </head>	

   <body onload="init()">
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
         <footer class="row">
            <div class="col-md-12">
               Pied de page, OpenStreetMap rocks !
            </div>
         </footer>
      </div>
   </body>
   </html>

   