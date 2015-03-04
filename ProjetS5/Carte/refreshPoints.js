// Rafraichir les points sur la carte
   var parkings = new OpenLayers.Layer.Text( "Parkings",
   {location:"markerlist.php", projection: epsg4326});
   map.addLayer(parkings) ;