<?php
require_once('connect.php');
mysql_query('set names utf8');

    $poi = $_GET['p'];
	$query = "SELECT * FROM `POI` WHERE ID=\"$poi\"";
	$result = mysql_query($query);
	if ($result == FALSE){
		echo "Fehler bei der Abfrage!";
	}else{
		while ($row = mysql_fetch_object($result)){
			$title = $row -> Name;
			$desc = $row -> Desc;
		}
	}
?>

<div id="description">
	<h2><?php echo $title; ?></h2>
	<?php echo $desc; ?>
</div>

<div id="audio">
	<audio> <!-- Audio geht noch gar nicht Ursache unbekannt... -->
			<?php echo "<source src=\"media/audio/$title/$title.mp3\" type=\"audio/mpeg\" controls>"; ?>
			<?php echo "<source src=\"media/audio/$title/$title.ogg\" type=\"audio/ogg\" controls>"; ?>
	</audio>
</div>

<div id="video">
	<video>
			<?php echo "<source src=\"media/video/$title/$title.ogv\" type=\"video/ogg\"  width=\"410\" height=\"250\"autobuffer controls>"; // Muss noch ausgebaut werden => Die Controls werden nicht angezeigt, Steuerung nur mit Rechtsklick möglich...?>
	</video>
</div>

<div class="clearfix"></div>

<div id="gallery">
<div class="flexslider">
	<ul class="slides">
	  	<?php
	  		require_once('thumbnail.php');		// Funktion zum tumbnail erzeugen
			$dir = "media/images/$title";		// Achtung Case Sensitiv => Title großgeschrieben => Ordnername großschreiben!
			if(!is_dir($dir)){
			//	mkdir($dir,0755); 			Notwendig das zu erzeugen???? Wird doch eh von uns von Hand angelegt Es sollte reichen zu prüfen ob das ein Ordner ist und wenn ja, dann weiter nach else
							}else {
													
			$tmp = opendir($dir);
		      while($file=readdir($tmp)){
			        $fname = $dir . '/' . $file;
			        $tnname = $dir . '/tn_' . $file; 
					if(!is_file($tnname) && is_file($fname)==FALSE){					// Prüfen ob thumb existiert => Wenn nicht erzeugen!
						thumbnailing($dir . '/' . $fname,$dir . $tnname,80,80,70);
					}
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

