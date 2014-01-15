<?php
/** 
 * Author: emimafia
 */

require('calc_size.php');
/**
 * You need to give the right directory
 */
$title = ''; //Give the title as lowerstring here
$dir = '../../media/images/' . $title;

if($title == '') {
	/**
	 * Prevent unauthorized upload
	 * The title must be empty on live
	 */
	die('Keep the change you filthy animal.');
}

if(!is_dir($dir)){
  mkdir($dir,0755);
}
/**
 * Upload for Images given through the form
 * Renaming and creation of thumbnail
 * Security relevant processing
 */
if(isset($_FILES) && count($_FILES)>0){
  $file = $_FILES["upload"];
  $info = pathinfo($file['name']);
  $extensions = array('jpg','jpeg','png','gif');
  $ext = strtolower($info['extension']);
  $time = time();
  if(in_array($ext,$extensions)) {
    do{
      $name = $time . "." . $ext;
      $time--;
    }
    while(is_file($dir . '/' . $name));
    copy($file['tmp_name'],$dir . '/' . $name);
    
    require('thumbnail.php');
		/**
		 * 
		 */
    thumbnailing($dir . '/' . $name,$dir . '/tn_' . $name,100,100,70); 
    
    echo '<script>top.location.href="' . $_SERVER['REQUEST_URI'] . '"</script>';
  }
}
/**
 * Live file deletion
 * Not needed for current project
 */
// if(isset($_GET["delfile"]) && !empty($_GET['delfile']) && base64_decode($_GET['check'])==$_GET['delfile']) {
  // if (strpos($_GET['delfile'],'tn_')===0) {
    // $exploded_del = explode('_',$_GET['delfile']);
    // unlink($dir . '/' . $_GET["delfile"]);
    // unlink($dir . '/' . $exploded_del['1']);
  // }
  // else {
    // unlink($dir . '/' . $_GET["delfile"]);
    // unlink($dir . '/tn_' . $_GET["delfile"]);
  // } 
//   
    // echo '<script>top.location.href="./upload.php"</script>';
// }

?>
    <p>
      <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post" enctype="multipart/form-data">
	      <label class="adminlabel" for="upload">
	        Bild ausw&auml;hlen: 
	      </label>
      	<input id="upload" name="upload" type="file" accept="image/*" />
      	<input type="submit" value="Datei hochladen" />
      </form>
    </p> 
    <table>
    <?php
    /**
		 * Print a nice table with picture information
		 */
      $tmp = opendir($dir);
      while($file=readdir($tmp)){
        $fname = $dir . '/' . $file;
        $tnname = $dir . '/tn_' . $file; 
        if(is_file($fname) && strpos($fname,'tn_')=== FALSE){
          $size = filesize($fname);
          $size = calc_size($size);
          $info = pathinfo($file);
          echo '<tr>
                  <td> 
                   <img class="full" src="' . $tnname . '"  />
                 </td>
                 <td>
                  ' . $size . '
                 </td>
                 <td>
                  ' . date('H:i:s \- d.m.Y',filemtime($fname)) . '
                 </td>
                 <td>
                  <a href="./upload.html?check=' . base64_encode($file)  .'&delfile=' . $file . '" onclick="return confirm(\'Datei wirklich l&ouml;schen?\')">L&ouml;schen</a>
                 </td>
               </tr>';
        }
      }
      closedir($tmp);
    ?>
    </table>