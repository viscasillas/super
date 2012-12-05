<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<div class="dimTools">
</div>
<span style="font-family:arial;font-size:20px;color:#333;font-style:italic;">Deleting all images and thumbnails</span><br><br>
<?php
$dir   = 'Photos/images/';
if (dir_is_empty($dir)) {
  echo "<br><br><br><br><h1><center>There are no images in your account. =(</center></h1>"; 
}else{
  $files = glob('Photos/images/*');
  foreach($files as $file){
  $imageName = substr($file, 14);
  $bigImage = substr($file, 6);
  $thumbImage = "Photos/thumbs/".substr($file, 14);
 // echo $bigImage.'&nbsp;'.$thumbImage.'<br>';}
  echo "Deleting thumbnail and image for ".$imageName.'<br>';
  unlink("Photos".$bigImage); unlink($thumbImage);}
  ;}

function dir_is_empty($dir) {
  if (!is_readable($dir)) return NULL;
  return (count(scandir($dir)) == 2);
}
  header("refresh: 3; url=admin.php?mod=Photos/thumbs");
//if(isset($_POST['deleteIMG'])) 
//    echo ""; 

//   else 
 //  echo "";
?>
<br /><br />
<small>Window will refresh in (3) seconds.</small>
</body>
</html>