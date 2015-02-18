   function init() {
        //var map = new OpenLayers.Map('map', {controls:[]});
        
        /*
        var osmLayer = new OpenLayers.Layer.OSM();
        map.addLayer(osmLayer);
        */
        
        //map.zoomToMaxExtent();
        
        //map.setCenter(new OpenLayers.LonLat(542966, 5745320), 16);

        //map.addControl(new OpenLayers.Control.Navigation());
        //map.addControl(new OpenLayers.Control.PanZoomBar());
        //map.addControl(new OpenLayers.Control.OverviewMap());
        //map.addControl(new OpenLayers.Control.MousePosition());
        //map.addControl(new OpenLayers.Control.LayerSwitcher());
        
        /*
        var epsg4326 = new OpenLayers.Projection("EPSG:4326");
        map.addControl(new OpenLayers.Control.MousePosition({displayProjection: epsg4326}));
        */
        
        /*
        center = new OpenLayers.LonLat(4.87652, 45.78097).transform(
            epsg4326, // transformer depuis le système de projection WGS84
            map.getProjectionObject() // vers le système de projection UTM de la carte
        );
        map.setCenter(center, 15);
        */
        
        /*
        var parkings = new OpenLayers.Layer.Text( "Parkings", {location:"markerlist.txt", projection: epsg4326});
        map.addLayer(parkings);
        */

        /*
        var regions = new OpenLayers.Layer.Vector("Régions", {
            protocol: new OpenLayers.Protocol.HTTP({
                url: "regions.kml",
                format: new OpenLayers.Format.KML({}),
                projection: epsg4326
            }),
            strategies: [new OpenLayers.Strategy.Fixed()],
            styleMap: new OpenLayers.StyleMap({ 
    		    "default": { 
        	    	fillColor: "#0000AA", 
        	    	strokeColor: "#000000", 
        	    	strokeWidth: 2, 
        	    	fillOpacity: 0.4 
       		    } 
    	    }) 
        });
        map.addLayer(regions);
        */

        /*
        var recyclage = new OpenLayers.Layer.Vector("Points de recyclage", {
            protocol: new OpenLayers.Protocol.HTTP({
                url: "recyclage.osm",
                format: new OpenLayers.Format.OSM({}),
                projection: epsg4326
            }),
            strategies: [new OpenLayers.Strategy.Fixed()],
            styleMap: new OpenLayers.StyleMap({ 
    		    "default": { 
        		    fillColor: "#00DD00", 
        		    strokeColor: "#000000", 
        		    pointRadius: 7, 
        		    fillOpacity: 1 
       		    } 
    	    }) 
        });
        map.addLayer(recyclage);
        */
        
   }

