function init() 
{
	//Ici création et paramétrage de OpenMapStreet
	var epsg4326 = new OpenLayers.Projection("EPSG:4326");

	var map = new OpenLayers.Map('map', {controls:[]});
	map.addControl(new OpenLayers.Control.Navigation());
	map.addControl(new OpenLayers.Control.PanZoomBar());
	map.addControl(new OpenLayers.Control.OverviewMap());
	map.addControl(new OpenLayers.Control.MousePosition({displayProjection: epsg4326}));
	map.addControl(new OpenLayers.Control.LayerSwitcher());
	//var center = new OpenLayers.LonLat(2.70,47.10).transform(epsg4326,
    //map.getProjectionObject());
	//map.setCenter(new OpenLayers.LonLat(0000000, 5958419), 6);

	var osmLayer = new OpenLayers.Layer.OSM();
	map.addLayer(osmLayer);
	//map.zoomToMaxExtent();
	//map.setCenter(new OpenLayers.LonLat(310640, 5958419), 6);
		map.setCenter(new OpenLayers.LonLat(-4.56854, 48.35825).transform(new OpenLayers.Projection("EPSG:4326"),map.getProjectionObject()), 14);

	//Ici création et paramétrage de GoogleMaps
	var gsat = new OpenLayers.Layer.Google(
       "Google Satellite",
       {type: google.maps.MapTypeId.SATELLITE, numZoomLevels: 22,
   sphericalMercator: true}
   );
	map.addLayer(gsat);

	//Ajout d'une couche de points issus d'un fichier texte
	var parkings = new OpenLayers.Layer.Text( "Parkings",
   {location:"markerlist.php", projection: epsg4326});
   map.addLayer(parkings) ;


}
var zoom function()
{
	map =init();
		map.setCenter(new OpenLayers.LonLat(4.56854, 48.35825).transform(new OpenLayers.Projection("EPSG:4326"),map.getProjectionObject()), 14);

}
