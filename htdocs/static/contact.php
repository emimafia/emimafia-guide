<?php
if(isset($_POST) && count($_POST)>0) {
	$fehler = 0;
	$fehlerstyle = 'style="color:#FF1F00;"';
	$pflicht = array('name','email','text');
	foreach($_POST as $k=>$v) {
		$v = trim($v);
		$v = strip_tags($v);
		$v = utf8_decode($v);
		$v = htmlentities($v);
		$v = str_replace("~","&#126",$v);
		$v = str_replace("\n","<br />",$v);
		$v = str_replace("\r","",$v);
		$$k = $v;
	}
	foreach($pflicht as $k){
		if(empty($$k)) {
			$fehler++;
			$tmp = $k."style";
			$$tmp = $fehlerstyle;
		}
	}
                 
	if(!empty($plz) && ($plz<=0 || strlen($plz)<5)) {
		$fehler++; 
		$plzstyle = $fehlerstyle;                
	}
                 
	if(!isset($codestyle) && $_POST['code']!=$_SESSION['captchacode'] && strlen($_POST['code'])!=6){
		$fehler++;
		$codestyle = $fehlerstyle;
	}

	if(!isset($emailstyle)){
		list($acc,$dom) = $tmp = explode("@",$email);

		if(is_int($dom*1)) {
			$ip=gethostbyname($dom);
		}
		else{
			if(!@gethostbyaddr($dom)) {
				$ip=$dom;
			}
			else {
				$ip=gethostbyaddr($dom);
			}
		}

		if(empty($dom) || $ip==$dom || empty($acc) || count($tmp)!=2){
			$fehler++;
			$emailstyle = $fehlerstyle;
		}
	}
	if($fehler==0) {
		$to = 'newuser@localhost';
		$subject = 'E-Mail von ' . $_SERVER['HTTP_HOST'];
		
		/*
		//----------------------------------[+] VERSAND IN ASCII -------------------------------------
                                
			$mailbody = "Am " . date("d.m.Y \u\m H:i:s") . " Uhr wurden folgende Daten gesendet:\r\n\r\n";
			$mailbody .= "Name:     \t " . $name . "\r\n";
			$mailbody .= "PLZ, Ort: \t " . $plz . " " . $ort . "\r\n";
			$mailbody .= "Strasse:  \t " . $strasse . "\r\n";
			$mailbody .= "E-Mail:   \t " . $email . "\r\n";
			$mailbody .= "Nachricht:\t " . $text . "\r\n";
                                
		//----------------------------------[-] VERSAND IN ASCII -------------------------------------
		*/
                                
		$mailbody = file_get_contents('../scripts/template/mail.html');
		foreach($_POST as $k=>$v){
			$mailbody = str_replace('~' . $k . '~',$$k,$mailbody);
		}
		$mailbody = str_replace('~domain~',$_SERVER['HTTP_HOST'],$mailbody);
		$mailbody = str_replace('~datum~',date('d.m.Y \u\m H:i:s'),$mailbody);
                                
		$header = 'MIME-Version: 1.0' . "\r\n";
		$header .= 'Content-Type: text/html /charset-iso-8859-1' . "\r\n";
		$header .= 'From: ' . $mail . '(' . $name . ')' . "\r\n";
		$header .= 'Reply-To: mirdoch@egal.com' . "\r\n";
		$header .= 'X-Mailer: PHP ' . phpversion();
                                
		if(mail($to,$subject,$mailbody,$header)) {
			echo '<script>top.location.href="' . $_SERVER['REQUEST_URI'] . '?erfolg=1</script>';
		}
	}
	else {
		$ausgabe="Fehler gefunden!";
	}
}
?>
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

  <link rel="shortcut icon" href="../css/images/favicon.ico" />
  
  <!-- Stylesheets -->
  <link rel="stylesheet" href="../../css/include.css" id="style" />
  <link rel="stylesheet" href="../../css/include_lib.css" />
  
  <!-- Scripts -->
  <!-- Libraries -->
  <script type="text/javascript" src="../../lib/html5shiv.js"></script>
  <script type="text/javascript" src="../../lib/jquery-2.0.3.min.js"></script>
	<script type="text/javascript" src="../../lib/jquery.flexslider-min.js"></script>
	<script type="text/javascript" src="../../lib/modernizr.custom.js"></script>
	<script type="text/javascript" src="../../lib/lightbox-2.6.min.js"></script>
	<!--[if IE]>
	<link rel="stylesheet" type="text/css" href="ie_map.css"></link>
	<![endif]-->
	<script type="text/javascript" src="http://www.openlayers.org/api/OpenLayers.js"></script>
	<script type="text/javascript" src="http://www.openstreetmap.org/openlayers/OpenStreetMap.js"></script>
	<script type="text/javascript" src="../../scripts/js/mapscr.js"></script>
	
  <!-- Selfcoded -->
	<script type="text/javascript" src="../../scripts/js/drawmap.js"></script>		<!-- Needed before ajax.js is included !!!! -->
  <script type="text/javascript" src="../../scripts/js/ajax.js"></script>
  <script type="text/javascript" src="../../scripts/js/general.js"></script> 
	<noscript>
		<div id="greybox">
			<div id="alert">
				JavaScript ist nicht aktiviert. Bitte aktivieren Sie JavaScript, um den vollen Funktionsumfang der Seite nutzen zu können.
			</div>
		</div>
	</noscript>
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
	      <div class="stylebuttons" onclick="styleswitch('contrast-landing')">
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
		<div id="full-description">
  		<h2>Contact</h2>
      <form action="<?php echo $_SERVER['REQUEST_URI'] ?>" method="post">
	      <p>
	        <?php if(isset($_GET['erfolg']) && $_GET['erfolg']==1) die('<p>Vielen Dank f&uuml;r Deine Mail</p><p><a href="./">Zur&uuml;ck</a></p>'); ?> &nbsp; 
	      </p>
	      <p>
	        <label for="name" <?php if(isset($namestyle)) echo $namestyle; ?> class="contactlabel">Name</label>
	        <input id="name" type="Text" required="required" size="45" value="<?php if(isset($_POST['name'])) echo $_POST['name']; ?>" name="name" />
	      </p>
	      <p>
	        <label <?php if(isset($plzstyle) || isset($ortstyle)) echo $plzstyle; ?> class="contactlabel">PLZ / Ort</label>
	        <input type="text" maxlenght="5" size="5" value="<?php if(isset($_POST['plz'])) echo $_POST['plz'] ?>" name="plz" />
	        <input type="text" size="33" value="<?php if(isset($_POST['ort'])) echo $_POST['ort'] ?>" name="ort" />
	      </p>
	      <p>
	        <label class="contactlabel" for="strasse">Strasse</label>
	        <input id="strasse" type="text" size="45" value="<?php if(isset($_POST['strasse'])) echo $_POST['strasse'] ?>" name="strasse" />
	      </p>
	      <p>
	        <label <?php if(isset($emailstyle)) echo $emailstyle; ?> class="contactlabel" for="email">E-Mail</label>
	        <input id="email" type="email" required="required" size="45" value="<?php if(isset($_POST['email'])) echo $_POST['email'] ?>" name="email" />
	      </p>
	      <p>
	        <label <?php if(isset($textstyle)) echo $textstyle; ?> class="contactlabel" for="text">Nachricht</label>
	        <textarea id="text" required="required" cols="48" name="text" rows="10"><?php if(isset($_POST['text']))echo $_POST['text'] ?></textarea>
	      </p>
	      <p>
	        <label <?php if(isset($codestyle)) echo $codestyle; ?>class="contactlabel" for="code">Code</label>
	        <input id="code" type="text" size="45" name="code" required="required" />
	      </p>
	      <p>
	      <label class="contactlabel">Sicherheitscode</label>
	      <img id="captcha" src="../scripts/templates/capture.php" />
	      <a onclick="newcapture()" href="#">
	        Refresh
	      </a>
	      </p>
	      <p>
		      <label class="contactlabel">&nbsp;</label>
		      <input id="contactsubmit" type="Submit" value="Senden" name="" />
		      <input type="reset" value="Zur&uuml;cksetzen" />
	      </p>
      </form>
      <div class="clearfix"></div>
      </div>
    </div>
    <footer>
    <div id="additional-links" class="sw"><a href="impressum.html">Impressum</a> | <a href="contact.php">Contact</a></div>
    </footer>
  </div>
</body>
</html>