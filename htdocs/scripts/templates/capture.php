<?php
  session_start();
  $random_dots = 15;
  $random_lines = 7;
  $image_width = 140;
  $image_height = 70;
  $handle = imagecreate($image_width,$image_height);
  $bgcol = imagecolorallocate($handle,0,0,0);
  $_SESSION['captchacode']='';
  for($i=1;$i<7;$i++){
    $char = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $ranchar = substr($char,mt_rand(0,62),1);
    $txtcol = imagecolorallocate($handle,mt_rand(50,255),mt_rand(50,255),mt_rand(50,255));
    imagettftext($handle,mt_rand(12,20),mt_rand(-50,50),$i*20,mt_rand(20,50),$txtcol,'../../css/fonts/aaargh.ttf',$ranchar);
    $_SESSION['captchacode'] .= $ranchar;
  }
  for( $i=0; $i<$random_dots; $i++ ) {
    $noisecol = imagecolorallocate($handle,mt_rand(50,255),mt_rand(50,255),mt_rand(50,255));
    imagefilledellipse($handle, mt_rand(0,$image_width),
    mt_rand(0,$image_height), 2, 3, $noisecol);
  }
  for( $i=0; $i<$random_lines; $i++ ) {
    $noisecol = imagecolorallocate($handle,mt_rand(50,255),mt_rand(50,255),mt_rand(50,255));
    imageline($handle, mt_rand(0,$image_width), mt_rand(0,$image_height),
    mt_rand(0,$image_width), mt_rand(0,$image_height), $noisecol);
  }
  header('content-type: image/gif');
  imagegif($handle);
  imagedestroy($handle);
?>