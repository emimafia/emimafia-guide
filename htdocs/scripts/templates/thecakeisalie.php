<?php
  $handle=imagecreate(400,200);
  $bgcol=imagecolorallocate($handle,0,0,0);
  $txtcol=imagecolorallocate($handle,100,255,100);
  imagestring($handle,5,60,40,'The cake is a lie.',$txtcol);
  $txtcol2=imagecolorallocate($handle,255,255,255);
  imagettftext($handle,40,-20,40,100,$txtcol2,'./FREESCPT.TTF','But also delicious!');
  header('content-type: image/gif');
  imagegif($handle);
  imagedestroy($handle);
?>