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
  <!-- Libraries -->
  <script type="text/javascript" src="lib/html5shiv.js"></script>
  <script type="text/javascript" src="lib/jquery-2.0.3.min.js"></script>
	<script type="text/javascript" src="lib/jquery.flexslider-min.js"></script>
	<script type="text/javascript" src="lib/modernizr.custom.js"></script>
	<script type="text/javascript" src="lib/lightbox-2.6.min.js"></script>
	
  <!-- Selfcoded -->
	<script type="text/javascript" src="scripts/js/drawmap.js"></script>		<!-- Needed before ajax.js is included !!!! -->
  <script type="text/javascript" src="scripts/js/ajax.js"></script>
  <script type="text/javascript" src="scripts/js/general.js"></script> 
	<noscript>
		<div id="greybox">
			<div id="alert">
				JavaScript ist nicht aktiviert. Bitte aktivieren Sie JavaScript, um den vollen Funktionsumfang der Seite nutzen zu können.
			</div>
		</div>
	</noscript>
    
<!--[if IE]>
<link rel="stylesheet" type="text/css" href="ie_map.css"></link>
<![endif]-->
<script type="text/javascript" src="http://www.openlayers.org/api/OpenLayers.js"></script>
<script type="text/javascript" src="http://www.openstreetmap.org/openlayers/OpenStreetMap.js"></script>
<script type="text/javascript" src="scripts/js/mapscr.js"></script>


</head>

<body>
	<nav>
	<div id="nav-inner">
		<h3>Navigation</h3>
		<a href="/">Home</a>
		<a href="scripts/templates/poi.php?p=1" class="ajax-link">Frauenkirche</a>
		<a href="scripts/templates/poi.php?p=2" class="ajax-link">Semperoper</a>
		<a href="scripts/templates/poi.php?p=3" class="ajax-link">Altmarkt</a>
		<a href="scripts/templates/poi.php?p=4" class="ajax-link">Großer Garten</a>
		<a href="scripts/templates/poi.php?p=5" class="ajax-link">Waldschlösschen Brücke</a>
	</div>
<!-- 	@TODO maybe '▶' is a better marker -->
	<div id="nav-switch">=&gt;</div>
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
      <div id="homepage-wrapper">
      	<div id="homepage" class="sw">
	      	<h2>Der Emimafia Guide</h2>
	      	<br />
	      	<p>
	      		Dresden wird wegen seiner barocken Architektur, berühmten Bauwerken wie der Frauenkirche oder der Semperoper, als auch durch seine Lage das deutsche bzw. Elbflorenz genannt. Aber dies sind nicht alle Sehenswürdigkeiten in der Landeshauptstadt. Bei uns entdecken sie noch weitere Orte und und erleben Dresden aus einem anderen Blickwinkel. 
	       	</p>
	       	<br />
	       	<table cellspacing="0" cellpadding="0" border="0">
	       		<thead>
	       			<tr>
	       				<td colspan="2">
	       					Ein paar generelle Fakten über Dresden
	       				</td>
	       			</tr>
	       		</thead>
	       		<tbody>
		       		<tr class="odd">
		       			<td>
		       				Bundesland
		       			</td>
		       			<td>
		       				Sachsen
		       			</td>
		       		</tr>
		       		<tr class="even">
		       			<td>
		       				Fläche
		       			</td>
		       			<td>
		       				328,31 km²
		       			</td>	       			
		       		</tr>
		       		<tr class="odd">
		       			<td>
		       				Höhe
		       			</td>
		       			<td>
		       				112 m ü. NHN
		       			</td>	       			
		       		</tr>
		       		<tr class="even">
		       			<td>
		       				Einwohner
		       			</td>
		       			<td>
		       				525.105
		       			</td>	       			
		       		</tr>
		       		<tr class="odd">
		       			<td>
		       				Bevölkerungsdichte
		       			</td>
		       			<td>
		       				1599 Einwohner je km²
		       			</td>	       			
		       		</tr>
		       	</tbody>
	       	</table>
	      </div>
	      <div id="logo">
	      	<img src="css/images/dresden_stadtwappen.svg" />
	      </div>
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
			  		while($file=readdir($tmp)) {
			  			if($file != '.' && $file != '..') {
			  				$dir_arr[] .= $file;
			  			}
			  		}
			      closedir($tmp);
			  		foreach($dir_arr as &$dir_arr_entry) {
			  			$link = array (
			  				'frauenkirche' => '1',
			  				'semperoper' => '2',
			  				'altmarkt' => '3',
			  				'grossergarten' => '4',
			  				'waldschloesschenbruecke' => '5',
			  			);
			  			$tmp = opendir($dir . '/' . $dir_arr_entry);
			  			while($file=readdir($tmp)){
				        $fname = $dir . '/' . $dir_arr_entry . '/' . $file;
				        $tnname = $dir . '/' . $dir_arr_entry . '/tn_' . $file; 
			        	if(is_file($fname) && strpos($fname,'tn_')=== FALSE){
			          	echo '
			   		<li>
			    		<a href="' . $fname . '" data-lightbox="gallery"><img class="thumb" src="' . $tnname . '"  /></a>
			   		</li>';
			        	}
			      	}
			      	closedir($tmp);
			  		}
			      
			    ?>
					</ul>
				</div>
      </div>
      <div class="clearfix"></div>
    </div>
    <footer>
    <div id="additional-links" class="sw"><a href="static/impressum.html">Impressum</a> | <a href="static/contact.php">Contact</a></div>
    </footer>
  </div>
</body>
</html>