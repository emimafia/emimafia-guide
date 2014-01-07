<!DOCTYPE html>
<html class="no-js" lang="de">
<head>
  <meta charset="utf-8" />

  <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame 
       Remove this if you use the .htaccess -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  
  <!-- Meta-Information -->
  <title>Emimafia Cityguide Dresden</title>
  <meta name="author" content="Emimafia">
	<meta name="publisher" content="Emimafia">
	<meta name="copyright" content="Emimafia">
	<meta name="description" content="Ein virtueller Stadtführer für die sächsische Landeshauptstadt Dresden. Gezeigt werden verschiedene Sehenswürdigkeiten und unterschiedlciher medialer Darstellung. ">
	<meta name="page-topic" content="Kultur">
	<meta name="page-type" content="Bericht Reportage">
	<meta name="audience" content="Alle">
	<meta http-equiv="content-language" content="de">
	<meta name="robots" content="index, follow">
	<meta name="DC.Creator" content="Emimafia">
	<meta name="DC.Publisher" content="Emimafia">
	<meta name="DC.Rights" content="Emimafia">
	<meta name="DC.Description" content="Ein virtueller Stadtführer für die sächsische Landeshauptstadt Dresden. Gezeigt werden verschiedene Sehenswürdigkeiten und unterschiedlciher medialer Darstellung. ">
	<meta name="DC.Language" content="de">
  <meta name="viewport" content="width=device-width; initial-scale=1.0" />

  <link rel="shortcut icon" href="css/images/favicon.ico" />
  
  <!-- Stylesheets -->
  <link rel="stylesheet" href="css/include.css" id="style" />
  <link rel="stylesheet" href="css/include_lib.css" />
  
  <!-- Scripts -->
  <script type="text/javascript" src="lib/html5shiv.js"></script>
  <script type="text/javascript" src="lib/jquery-2.0.3.min.js"></script>
	<script type="text/javascript" src="lib/jquery.flexslider-min.js"></script>
	<script type="text/javascript" src="lib/modernizr.custom.js"></script>
	<script type="text/javascript" src="lib/lightbox-2.6.min.js"></script>
  <script type="text/javascript" src="scripts/js/ajax.js"></script>
  <script type="text/javascript" src="scripts/js/general.js"></script> 
	<noscript>
		<div id="greybox">
			<div id="alert">
				JavaScript ist nicht aktiviert. Bitte aktivieren Sie JavaScript, um den vollen Funktionsumfang der Seite nutzen zu können.
			</div>
		</div>
	</noscript>
  
  <!-- von Lukas hinzugefügt -->
  
<!--[if IE]>
<link rel="stylesheet" type="text/css" href="ie_map.css"></link>
<![endif]-->
<script type="text/javascript" src="http://www.openlayers.org/api/OpenLayers.js"></script>
<script type="text/javascript" src="http://www.openstreetmap.org/openlayers/OpenStreetMap.js"></script>
<script type="text/javascript" src="scripts/js/mapscr.js"></script>
 
<script type="text/javascript">
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
    var textfraukirch="<a href=\"linkzumphpscript.php?irgendwas\"><font color=\"black\"><b>Frauenkirche<br></b></font></a>";
    var textaltmarkt="<a href=\"linkzumphpscript.php?irgendwas\"><font color=\"black\"><b>Altmarkt<br></b></font></a>";
    var textgrossgart="<a href=\"linkzumphpscript.php?irgendwas\"><font color=\"black\"><b>Großer Garten<br></b></font></a>";
    var textsemper="<a href=\"linkzumphpscript.php?irgendwas\"><font color=\"black\"><b>Semperoper</b></font></a>";
    var textwaldschl="<a href=\"linkzumphpscript.php?irgendwas\"><font color=\"black\"><b>Waldschlößchenbrücke</b></font></a>";

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
    </script>

</head>

<body onload="drawmap()">
	<nav>
	<div id="nav-inner">
		<h3>Navigation</h3>
		<a href="/">Home</a>
		<a href="scripts/templates/poi.php?p=1">Frauenkirche</a>
		<a href="scripts/templates/poi.php?p=2">Semperoper</a>
		<a href="scripts/templates/poi.php?p=3">Großer Garten</a>
		<a href="scripts/templates/poi.php?p=4">Altmarkt</a>
		<a href="scripts/templates/poi.php?p=5">Waldschlösschen Brücke</a>
	</div>
<!-- 	@TODO maybe '▶' is a better marker -->
	<div id="nav-switch">=></div>
	</nav>
  <div id="wrapper">
    <header>
      <h1>Emimafia Dresden Guide</h1>
      <div id="styleswitch">
	      <div class="stylebuttons" onclick="styleswitch('plus')">+</div>
	      <div class="stylebuttons" onclick="styleswitch('minus')">-</div>
	      <div class="stylebuttons" onclick="styleswitch('contrast')">
	      	<div id="contrast-y" class="contrast"></div>
	      	<div id="contrast-c" class="contrast"></div>
	      	<div id="contrast-b" class="contrast"></div>
	      </div>
      </div>
      <div id="map"></div> <!-- Hier wird die Map eingebunden -->
      <div id="osm">©<a href="http://www.openstreetmap.org">OpenStreetMap</a>
   		und <a href="http://www.openstreetmap.org/copyright">Mitwirkende</a>,
   		<a href="http://creativecommons.org/licenses/by-sa/2.0/deed.de">CC-BY-SA</a>
 	</div>
    </header>
    <div id="subheader"></div>
    <div id='content'>
      <div id="description">
      	<h2>Poi</h2>
      	<p>Lorem Ipsum fick dich in den Arsch. Ass Ass Bitch Hureeeeeee. Ich ficke dich beim Fußball, ich ficke dich beim Tennis, denn ich hab einen - Penis. Lorem Lorem lorem Lorem Lorem Lorem Lorek Lorem lorem  Lorem Lorem lorem Lorem Lorem Lorem Lorek Lorem lorem  Lorem Lorem lorem Lorem Lorem Lorem Lorek Lorem lorem  Lorem Lorem lorem Lorem Lorem Lorem Lorek Lorem lorem  Lorem Lorem lorem Lorem Lorem Lorem Lorek Lorem lorem  Lorem Lorem lorem Lorem Lorem Lorem Lorek Lorem lorem  Lorem Lorem lorem Lorem Lorem Lorem Lorek Lorem lorem  Lorem Lorem lorem Lorem Lorem Lorem Lorek Lorem lorem  Lorem Lorem lorem Lorem Lorem Lorem Lorek Lorem lorem  Lorem Lorem lorem Lorem Lorem Lorem Lorek Lorem lorem </p>
       	<p>Hier soll dann mal der Beschreibungtext rein<br />
       	Lorem Ipsum<br />
       	Dolor Et<br />
       	</p>
       	<p>
       	Ich werde Dir Punkte von Dresden zeigen, die Du nicht ablehnen kannst.<br />
       	</p>
       	<p>
       	Bart Bart Bart Bart<br />
       	Gandalf-/Weberstyle<br />
       	</p>
       	<p>
       	Das wird auch noch besser durchgestylt.<br />
       	</p>
       	<p>
       	Grundfarben würde ich antrahzit/gelb nehmen.<br />
       	</p>
      </div>
      <div id="audio">
      	Playa
      </div>
      <div id="video">
      	Youtube
      </div>
      <div class="clearfix"></div>
      <div id="gallery">
      <div class="flexslider">
			  	<ul class="slides">
			  	<?php
								$dir = 'media/images';
								if(!is_dir($dir)){
								mkdir($dir,0755);
								}
			  		$tmp = opendir($dir);
			      while($file=readdir($tmp)){
			        $fname = $dir . '/' . $file;
			        $tnname = $dir . '/tn_' . $file; 
			        if(is_file($fname) && strpos($fname,'tn_')=== FALSE){
			          echo '
			    <li>
			    	<a href="' . $fname . '" data-lightbox="gallery" title="<a id=\'link-to-point\'>The Specific Point of Interest</a>"><img class="thumb" src="' . $tnname . '"  /></a>
			    </li>';
			        }
			      }
			      closedir($tmp);
			    ?>
			 	 </ul>
				</div>
      </div>
      <div class="clearfix"></div>
    </div>
    <footer>
    <div id="additional-links"><a>Impressum</a> | <a>Contact</a> | <a>FAQ</a></div>
    </footer>
  </div>
  
  
</body>
</html>