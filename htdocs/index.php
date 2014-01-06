<!DOCTYPE html>
<html lang="de">
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
  <link rel="stylesheet" href="css/style.css" media="screen" id="style" />
  <link rel="stylesheet" href="css/flexslider.css" type="text/css" />
  <link rel="stylesheet" href="css/lightbox.css" />
  
  <!-- Scripts -->
  <script type="text/javascript" src="lib/html5shiv.js"></script>
  <script type="text/javascript" src="lib/jquery-2.0.3.min.js"></script>
	<script type="text/javascript" src="lib/jquery.flexslider-min.js"></script>
	<script type="text/javascript" src="lib/modernizr.custom.js"></script>
	<script type="text/javascript" src="lib/lightbox-2.6.min.js"></script>
  <script type="text/javascript" src="scripts/js/ajax.js"></script>
  <script type="text/javascript" src="scripts/js/general.js"></script>
</head>

<body>
	<nav>
	<div id="nav-inner">
		<h3>Navigation</h3>
		<a href="/">Home</a>
		<a href="scripts/templates/poi.php?p=1">PoI 1</a>
		<a href="scripts/templates/poi.php?p=2">PoI 2</a>
		<a href="scripts/templates/poi.php?p=3">PoI 3</a>
		<a href="scripts/templates/poi.php?p=4">PoI 4</a>
		<a href="scripts/templates/poi.php?p=5">PoI 5</a>
	</div>
	<div id="nav-klapp">=></div>
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
      <object data="svg/svg_arbeitsversion.svg" width="960" height="335" type="image/svg+xml"></object>
    </header>
    <div id="subheader"></div>
    <div id='content'>
      <div id="description">
      	<h2>Ein Point of Interest</h2>
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
			    	<a href="' . $fname . '" data-lightbox="gallery"><img class="thumb" src="' . $tnname . '"  /></a>
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