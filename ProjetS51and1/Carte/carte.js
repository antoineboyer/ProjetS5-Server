//function permettant de créer une carte OpenLayer,
function init() 
{
	//Ici, création de la projection espg4326
	epsg4326 = new OpenLayers.Projection("EPSG:4326");
	// Création de la carte OpenLayer et ajout des diférents éléments (zoombar...)
	var map = new OpenLayers.Map('map', {controls:[]});
	map.addControl(new OpenLayers.Control.Navigation());
	map.addControl(new OpenLayers.Control.PanZoomBar());
	map.addControl(new OpenLayers.Control.OverviewMap());
	map.addControl(new OpenLayers.Control.MousePosition({displayProjection: epsg4326}));
	map.addControl(new OpenLayers.Control.LayerSwitcher());
	//Ajout de la coucher OpenStreetMap à la carte
	var osmLayer = new OpenLayers.Layer.OSM();
	map.addLayer(osmLayer);
	
	return map;

}
/*Function permettant:
-d'ajuster le centrage initial de la carte avec la longitude longi et la latitude lati.
-d'ajouter une coucher Google Satellite à la carte
-d'ajouter une couche de point issu du fichiers markerlist.php regroupant les différents appareil
*/
function affichageMap(longi,lati,map)
{
	//Centrage initial
	map.setCenter(new OpenLayers.LonLat(longi,lati).transform(new OpenLayers.Projection("EPSG:4326"),map.getProjectionObject()), 18);

	//Ici création et paramétrage de GoogleMaps
	var gsat = new OpenLayers.Layer.Google(
       "Google Satellite",
       {type: google.maps.MapTypeId.SATELLITE, numZoomLevels: 22,
   sphericalMercator: true}
   );
	map.addLayer(gsat);

	//Ajout d'une couche de points issus de markerlist.php (ceci mis à jour toute les 5 secondes)
         parkings = new OpenLayers.Layer.Text( "Parkings",
         {location:"markerlist.php", projection: epsg4326});
         map.addLayer(parkings) ;

	setInterval(function(){ 
		map.removeLayer(parkings,true);
		parkings = new OpenLayers.Layer.Text( "Parkings",
         {location:"markerlist.php", projection: epsg4326});
         map.addLayer(parkings) ;
	}, 5000);
}

