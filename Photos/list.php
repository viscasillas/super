<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
.deleteBTNBig {
	width:49px;
	height:49px;
	background-image:url(System/img/deleteBGbig.png);
	background-color:transparent;
	border:none;
	color:transparent;
	outline:none;
	position:fixed;
	right:5;
	top:20;
}
.deleteBTNBig:hover {
	background-image:url(System/img/deleteBGbig_hover.png);
}
.animage {
	border: thick solid #FFF;
}
.animage:hover {
	border-top-width: thick;
	border-right-width: thick;
	border-bottom-width: thick;
	border-left-width: thick;
	border-top-style: solid;
	border-right-style: solid;
	border-bottom-style: solid;
	border-left-style: solid;
	border-top-color: #FFF;
	border-right-color: #FFF;
	border-bottom-color: #CCC;
	border-left-color: #FFF;
}
.previewWindow {
	top:0;
	right:0;	
	width:300px;
	height:100%;
	background-color:#333333;
	position:fixed;
}
.previewImage {
	width: 250px;
	margin-top: 27px;
	margin-left: 20px;
	border: thick solid #FFF;
}
.galleryView {
	width: 60%;
	height: 60%;
	background-color: #EEE;
	overflow: scroll;
	border: medium solid #666;
	padding:15px;
	resize: both;
	-webkit-border-radius: 10px;
	-webkit-border-bottom-right-radius: 0;
	-moz-border-radius: 10px;
	-moz-border-radius-bottomright: 0;
	border-radius: 10px;
	border-bottom-right-radius: 0;
}
.imgURLbox {
	margin-top:10px;
	margin-left: 20px;
	background-color:#CCC;
	color:#333;
	font-family:arial;
	font-size:18px;
	width:250px;
	border: thick solid #FFF;
	outline:none;
}
.imgURLbox:hover {
	background-color:#F2F0C8;
	color:#333;
}
</style>
</head>

<body>
<?php
if(isset($_POST['deleteIMG'])){
	unlink($_GET['img']);
	header('Location: admin.php?mod=Photos/thumbs');
}
if(empty($_GET['img'])) 
    echo ""; 

   else 
   echo "
   <div class='previewWindow'>
   <form method='post'>
   <input type='text' name='imagetodelete' value='".$_GET['img']."' style='display:none;'>
   <input class='deleteBTNBig' name='deleteIMG' type='submit'>
   </form>
   <img class='previewImage' src='".$_GET['img']."'/>
   <br />
   <input type='text' value='".$siteURL.$_GET['img']."'  class='imgURLbox'/>
   </div>
   " ;
?>
<span style="font-family:arial;font-size:20px;color:#333;font-style:italic;">Photo Gallery</span><br><br>
<div class="galleryView">
<?php 
$dir   = 'Photos/images/';
if (dir_is_empty($dir)) {
  echo "<br><br><br><br><h1><center>There are no images in your account. =(</center></h1>"; 
}else{
  $files = glob('Photos/images/*');
  foreach($files as $file){
  $bigImage = substr($file, 6);
  $thumbImage = "Photos/thumbs/".substr($file, 14);
  echo
  '<a href="admin.php?mod=Photos/list&img=Photos'.$bigImage.'"><img src="'.$thumbImage.'"/ width="25px" height="25px;" class="animage">&nbsp;&nbsp;'.basename($file).'</a><br>';}
  ;}

function dir_is_empty($dir) {
  if (!is_readable($dir)) return NULL;
  return (count(scandir($dir)) == 2);
}
;?>
</div>
</body>
</html>