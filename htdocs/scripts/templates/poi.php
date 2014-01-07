<?php
//header('Content-Type: text/html; charset=utf-8');
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
		/*	$dir = 'media/images';
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
			      closedir($tmp); */
		    ?>
		 	 </ul>
			</div>
</div>
<div class="clearfix"></div>

