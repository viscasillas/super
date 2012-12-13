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
	border: thick solid #EEE;
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
	border-top-color: #EEE;
	border-right-color: #EEE;
	border-bottom-color: #CCC;
	border-left-color: #EEE;
}
.previewWindow {
	top:0;
	right:0;	
	width:300px;
	height:100%;
	background-color:#333333;
	background-image:url(System/img/previewWindow.png);
	position:fixed;
	z-index:800;
}
.previewImage {
	width: 250px;
	margin-top: 27px;
	margin-left: 20px;
	border: thick solid #FFF;
}
.galleryView {
	width: 437px;
	height: 200px;
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
.copyBtn {
	margin-top:10px;
	margin-left: 20px;
	background-color:#4387CE;
	color:#fff;
	font-family:arial;
	font-size:18px;
	width:260px;
	border: thick solid #FFF;
	outline:none;	
}
</style>
</head>

<body>
<script type="text/javascript" src="System/zeroclipboard/ZeroClipboard.js"></script>
<?php

  if(isset($_POST['makePageFromPhoto'])){
	   $newtitleforphotowithimage = preg_replace('/[^A-Za-z]/', '', $_GET['img']);
	   $xml = new SimpleXMLElement('<ls></ls>');
	   $xml->addChild('permissions', 'full');
	   $xml->addChild('content', '');
	   $xml->addChild('title', 'img');
  	   $xml->addChild('cpage', 'dpg');
	   $xml->addChild('onmenu', 'yes');
	   $xml->addChild('docname', $newtitleforphotowithimage);
	   $xml->asXML('Pages/pg/' . $newtitleforphotowithimage . '.xml');
	   $string = '<img src="'.$_GET['img'].'" width="100%">';
		  $fp = fopen("Pages/dpg/".$newtitleforphotowithimage.".php", "w");
		  fwrite($fp, $string);
		  fclose($fp);
	   header('Location: ?mod=Pages/pages');
   }

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
   <input name='box-content' id='box-content' type='text' value='".$siteURL.$_GET['img']."'  class='imgURLbox'/>
   <input type='button' id='copy' name='copy' value='Copy' class='copyBtn' /><form method='post'><input type='submit' name='makePageFromPhoto' value='Make Page' class='copyBtn'></form></div>
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
  '<a href="admin.php?mod=Photos/thumbs&img=Photos'.$bigImage.'"><img src="'.$thumbImage.'"/ width="60px" height="60px;" class="animage"></a>';}
  ;}

function dir_is_empty($dir) {
  if (!is_readable($dir)) return NULL;
  return (count(scandir($dir)) == 2);
}
;?>




<script type="text/javascript">
//set path
ZeroClipboard.setMoviePath('http://localhost/xpanel/System/zeroclipboard/ZeroClipboard.swf');
//create client
var clip = new ZeroClipboard.Client();
//event
clip.addEventListener('mousedown',function() {
  clip.setText(document.getElementById('box-content').value);
});
clip.addEventListener('complete',function(client,text) {
  alert('super: ' + text);
});
//glue it to the button
clip.glue('copy');
</script>

</div>
</body>
</html>