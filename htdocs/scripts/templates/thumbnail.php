<?php
  function thumbnailing($orig,$filename,$maxwidth,$maxheight,$quali=100){
  
    list($width,$height,$type) = getimagesize($orig);
    
    $widthfactor = $width/$maxwidth;
    $heightfactor = $height/$maxheight;
    
    if($widthfactor > 1 || $heightfactor > 1){
      if ($widthfactor>=$heightfactor){
        $newwidth = $width/$widthfactor;
        $newheight = $height/$widthfactor;
      }
      else{
        $newwidth = $width/$heightfactor;
        $newheight = $height/$heightfactor;
      }
    }
    else{
      $newwidth = $width;
      $newheight = $height;
    }
    
    switch($type){
      case 1 :
        $handle=imagecreate($newwidth,$newheight);
        $image = imagecreatefromgif($orig);
        imagecopyresampled($handle,$image,0,0,0,0,$newwidth,$newheight,$width,$height);
        imagegif($handle,$filename);
        break;
      case 2 :
        $handle=imagecreatetruecolor($newwidth,$newheight);
        $image = imagecreatefromjpeg($orig);
        imagecopyresampled($handle,$image,0,0,0,0,$newwidth,$newheight,$width,$height);
        imagejpeg($handle,$filename,$quali);
        break;
      case 3 :
        $handle=imagecreatetruecolor($newwidth,$newheight);
        $image = imagecreatefrompng($orig);
        imagecopyresampled($handle,$image,0,0,0,0,$newwidth,$newheight,$width,$height);
        imagepng($handle,$filename);
        break;
    }
    imagedestroy($handle);
  }
  
?>