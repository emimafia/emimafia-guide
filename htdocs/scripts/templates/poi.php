<?php
	require_once('connect.php');
	mysql_query('set names utf8');
    $poi = $_GET['p'];
	$query = "SELECT * FROM `POI` WHERE ID=\"$poi\"";
	$result = mysql_query($query);
	function normalize($str) {
		$normalize_arr = array (
			'ä' => 'ae',
			'ö' => 'oe',
			'ü' => 'ue',
			'ß' => 'ss',
			' ' => '',
		);
		$str = strtolower(strtr($str, $normalize_arr));
		return $str;
	}
	if ($result == FALSE){
		echo "Fehler bei der Abfrage!";
	}
	else {
		while ($row = mysql_fetch_object($result)){
			$title = $row -> Name;
			$lowertitle = normalize($title);
			$desc = $row -> Desc;
			$audiotitle = $row -> AudioTitle;
			$videotitle = $row -> VideoTitle;
		}
	}
?>

<?php
	$mpdrei = '../../media/audio/' . $lowertitle . '/' . $lowertitle . '.mp3';
	$ogg = '../../media/audio/' . $lowertitle . '/' . $lowertitle . '.ogg';
	$mpvier = '../../media/video/' . $lowertitle . '/' . $lowertitle . '.mp4';
	$ogv = '../../media/video/' . $lowertitle . '/' . $lowertitle . '.ogv';
	if((is_file($mpdrei) && is_file($ogg)) || (is_file($ogv) && is_file($mpvier)) || $lowertitle == 'waldschloesschenbruecke') {
?>
<div id="description" class="sw">
	<h2>
		<?php echo $title; ?>
	</h2>
	<?php echo $desc; ?>
</div>
<?php 
	if (is_file($mpdrei) && is_file($ogg)) {
		echo '
<div id="audio">
	<h3>' . $audiotitle . '</h3>
	<audio controls>
		<source src="media/audio/' . $lowertitle . '/' . $lowertitle . '.mp3" type="audio/mpeg" controls>
		<source src="media/audio/' . $lowertitle . '/' . $lowertitle . '.ogg" type="audio/ogg" controls>
	</audio>
</div>';
}
	if (is_file($ogv) && is_file($mpvier)) {
		echo '
<div id="video">
	<h3>' . $videotitle . ' </h3>
	<video width="410" autobuffer controls>
		<source src="media/video/' . $lowertitle . '/' . $lowertitle . '.ogv" type="video/ogg"  >
		<source src="media/video/' . $lowertitle . '/' . $lowertitle . '.mp4" type="video/mp4"  >	
	</video>
</div>';
	}
	if ($lowertitle == 'waldschloesschenbruecke') {
		echo '
<div id="video">
	<iframe width="410" height="310" src="//www.youtube-nocookie.com/embed/t3oGzQSy5T0?rel=0" frameborder="0" allowfullscreen></iframe>
</div>';
	}
?>

<div class="clearfix"></div>
<?php
	}
	else {
?>
<div id="full-description" class="sw">
	<h2>
		<?php echo $title; ?>
	</h2>
	<?php echo $desc; ?>
</div>
<?php
	}
?>

<!-- Here starts the gallery -->
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
				  		if($file != '.' && $file != '..') {
					  	$fname = $dir . '/' . $file;
					    $tnname = $dir . '/tn_' . $file;
							if(!is_file($tnname) && is_file($fname)==FALSE){					// Prüfen ob thumb existiert => Wenn nicht erzeugen!
								//@TODO not needed at first. upload.php works now. and this perfectly!!!
								thumbnailing($dir . '/' . $fname,$dir . $tnname,100,100,70); // @TODO He gets in it but the thumbnailing won't happen. Don't know if you can maybe add some return false for debugging?
							}
					    if(is_file($fname) && strpos($fname,'tn_')=== FALSE){
					    	echo '
					    <li>
					    	<a href="' . $fname . '" data-lightbox="gallery"><img class="thumb" src="' . $tnname . '"  /></a>
					    </li>';
					        }
					      }
							}
						closedir($tmp); 
				}
			?>
		</ul>
	</div>
</div>
<div class="clearfix"></div>