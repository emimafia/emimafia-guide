<?php
/** 
 * Author: emimafia
 *
 */
?>
<div id="homepage-wrapper">
	<div id="homepage" class="sw">
	<h2>Der Emimafia Guide</h2>
	<p>
		Dresden wird wegen seiner barocken Architektur, berühmten Bauwerken wie der Frauenkirche oder der Semperoper, als auch durch seine Lage das deutsche bzw. Elbflorenz genannt. Aber dies sind nicht alle Sehenswürdigkeiten in der Landeshauptstadt. Bei uns entdecken sie noch weitere Orte und erleben Dresden aus einem anderen Blickwinkel. 
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
			/**
			 * We lookup all folders that are in /media/images
			 * add them to an array so that the next loop can
			 * use it to lookup the content of every folder
			 */
				($isinclude === TRUE) ? $dir = 'media/images' : $dir = '../../media/images'; //switch of paths for php include or ajax-request
				if(!is_dir($dir)){
					mkdir($dir,0755);
				}
				$tmp = opendir($dir);
				while($file=readdir($tmp)) {
					/**
					 * Skip . and ..
					 * Loop adds folder content to $dir_arr array
					 */
					if($file != '.' && $file != '..') {
						$dir_arr[] .= $file;
					}
				}
				closedir($tmp);
				foreach($dir_arr as &$dir_arr_entry) {
					$tmp = opendir($dir . '/' . $dir_arr_entry);
					while($file=readdir($tmp)){
						/**
						 * Define filename and thumbnail filename for the pictures
						 */
						$fname = $dir . '/' . $dir_arr_entry . '/' . $file;
						$tnname = $dir . '/' . $dir_arr_entry . '/tn_' . $file;
						/** 
						 * Here we have to sort out the thumbnails so that they won't be shown twice
						 * Loop shows the slide list elements
						 */
						if(is_file($fname) && strpos($fname,'tn_')=== FALSE){
							echo '
			<li>
				<a href="' . $fname . '" data-lightbox="gallery">
					<img class="thumb" src="' . $tnname . '"  />
				</a>
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