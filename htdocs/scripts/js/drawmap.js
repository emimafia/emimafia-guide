//<![CDATA[

var map;
var layer_mapnik;
var layer_tah;
var layer_markers;

function drawmap() {
	
	
    // Popup und Popuptext
    //HIER LINKS ZU POIs EINFÜGEN!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    
    //  						|
    //  						|
    //  						V
    var popuptext="<a href=\"linkzumphpscript.php?irgendwas\"><font color=\"black\"><b>Dresden<br>Stadtmitte<br></b></font></a>";
    var textfraukirch="<a href=\"scripts/templates/poi.php?p=1\"><font color=\"black\"><b>Frauenkirche<br></b></font></a>";
    var textaltmarkt="<a href=\"scripts/templates/poi.php?p=4\"><font color=\"black\"><b>Altmarkt<br></b></font></a>";
    var textgrossgart="<a href=\"scripts/templates/poi.php?p=3\"><font color=\"black\"><b>Großer Garten<br></b></font></a>";
    var textsemper="<a href=\"scripts/templates/poi.php?p=2\"><font color=\"black\"><b>Semperoper</b></font></a>";
    var textwaldschl="<a href=\"scripts/templates/poi.php?p=5\"><font color=\"black\"><b>Waldschlößchenbrücke</b></font></a>";

    OpenLayers.Lang.setCode('de');
    
    // Position und Zoomstufe der Karte
    var lon = 13.73836112;
    var lat = 51.059259;
    var zoom = 13; 

    map = new OpenLayers.Map('map', {
        projection: new OpenLayers.Projection("EPSG:900913"),
        displayProjection: new OpenLayers.Projection("EPSG:4326"),
        controls: [
            new OpenLayers.Control.Navigation(),
            new OpenLayers.Control.LayerSwitcher(),
            new OpenLayers.Control.PanZoomBar()],
        maxExtent:
            new OpenLayers.Bounds(-20037508.34,-20037508.34,
                                    20037508.34, 20037508.34),
        numZoomLevels: 18,
        maxResolution: 156543,
        units: 'meters'
    });

    layer_mapnik = new OpenLayers.Layer.OSM.Mapnik("Mapnik");
    layer_markers = new OpenLayers.Layer.Markers("Address", { projection: new OpenLayers.Projection("EPSG:4326"), 
    	                                          visibility: true, displayInLayerSwitcher: false });
   

	OpenLayers.Marker.defaultIcon = function () {
    	return new OpenLayers.Icon ("media/images/marker.png", {w:20, h:30}, {x: -10, y:-30});
	};

    map.addLayers([layer_mapnik, layer_markers]);
    jumpTo(lon, lat, zoom);
 
    // Position des Markers
    addMarker(layer_markers, 13.741575, 51.051883333333, textfraukirch); //Frauenkirche
    addMarker(layer_markers, 13.738030555556 ,51.049666666667, textaltmarkt); //Altmarkt
    addMarker(layer_markers, 13.763055555556, 51.0375, textgrossgart); //Großer Garten
    addMarker(layer_markers, 13.735169444444, 51.054508333333, textsemper); // Semperoper
    addMarker(layer_markers, 13.776983333333, 51.063969444444, textwaldschl); //Waldschlößchenbrücke

}

//]]>
