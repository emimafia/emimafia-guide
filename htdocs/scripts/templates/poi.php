<?php
	require_once('connect.php');
	mysql_query('set names utf8');
  $poi = $_GET['p'];
	$query = "SELECT * FROM `POI` WHERE ID=\"$poi\"";
	$result = mysql_query($query);
	if ($result == FALSE){
		echo "Fehler bei der Abfrage!";
	}
	else {
		while ($row = mysql_fetch_object($result)){
			$title = $row -> Name;
			$lowertitle = strtolower($title); //@TODO String to lower Bitches!!!
			$desc = $row -> Desc;
		}
	}
?>

<div id="description">
	<h2>
		<?php echo $title; ?>
	</h2>
	<?php echo $desc; ?>
</div>

<?php
	/**
	 * @TODO Maybe we should do some code cleaning after everything würgs
	 */
?>

<div id="audio">
	<audio <?php 
							/*HERE*/ echo 'src="media/audio/' . $lowertitle . '/' . $lowertitle . '.ogg" type="audio/ogg" controls' 
					?>
	>
			<?php
			/**
			 * @TODO I don't think that's the proper way. Look above for here.
			 */
// 				echo '<source src="media/audio/' . $lowertitle . '/' . $lowertitle . '.mp3" type="audio/mpeg" controls>';
// 				echo '<source src="media/audio/' . $lowertitle . '/' . $lowertitle . '.ogg" type="audio/ogg" controls>';
			?>
	</audio>
</div>

<div id="video">
	<video <?php // @TODO same thing here like audio!!!
				echo '<source src="media/video/' . $lowertitle . '/' . $lowertitle . '.ogv" type="video/ogg"  width="410" height="250" autobuffer controls>'; // Muss noch ausgebaut werden => Die Controls werden nicht angezeigt, Steuerung nur mit Rechtsklick möglich...
					?>
	>
			
	</video>
</div>

<div class="clearfix"></div>

<div id="gallery">
	<div class="flexslider">
		<ul class="slides">
			<?php
				require_once('thumbnail.php');		// Funktion zum tumbnail erzeugen
				$dir = '../../media/images/' . $lowertitle;		// We need to go to the right directory (../..) because this is not in /
				if(!is_dir($dir)){
// 					mkdir($dir,0755); 			Notwendig das zu erzeugen???? Wird doch eh von uns von Hand angelegt Es sollte reichen zu prüfen ob das ein Ordner ist und wenn ja, dann weiter nach else
				}
				else {
					$tmp = opendir($dir);
				  	while($file=readdir($tmp)){
					  	$fname = $dir . '/' . $file;
					    $tnname = $dir . '/tn_' . $file;
							if(!is_file($tnname) && is_file($fname)==FALSE){					// Prüfen ob thumb existiert => Wenn nicht erzeugen!
								thumbnailing($dir . '/' . $fname,$dir . $tnname,80,80,70); // @TODO He gets in it but the thumbnailing won't happen. Don't know if you can maybe add some return false for debugging?
							}
					    if(is_file($fname) && strpos($fname,'tn_')=== FALSE){
					    	var_dump('TOD');
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