
<span style="font-family:arial;font-size:20px;color:#333;font-style:italic;">Creating Thumnails for all Images.</span><br><br>
<?php
/*
 Generate thumbnails from current images folder to the thumbs folder.
*/


function createThumbs( $pathToImages, $pathToThumbs, $thumbWidth ) 
{
  // open the directory
  $dir = opendir( $pathToImages );

  // loop through it, looking for any/all JPG files:
  while (false !== ($fname = readdir( $dir ))) {
    // parse path for the extension
    $info = pathinfo($pathToImages . $fname);
    // continue only if this is a JPEG image
    if ( strtolower($info['extension']) == 'jpg') 
    {
      echo "Creating thumbnail for {$fname} <br />";

      // load image and get image size
      $img = imagecreatefromjpeg( "{$pathToImages}{$fname}" );
      $width = imagesx( $img );
      $height = imagesy( $img );

      // calculate thumbnail size
      $new_width = $thumbWidth;
      $new_height = floor( $height * ( $thumbWidth / $width ) );

      // create a new tempopary image
      $tmp_img = imagecreatetruecolor( $new_width, $new_height );

      // copy and resize old image into new image 
      imagecopyresized( $tmp_img, $img, 0, 0, 0, 0, $new_width, $new_height, $width, $height );

      // save thumbnail into a file
      imagejpeg( $tmp_img, "{$pathToThumbs}{$fname}" );
    }
	
  }
  // close the directory
  closedir( $dir );
}


// call createThumb function and pass to it as parameters the path 
// to the directory that contains images, the path to the directory
// in which thumbnails will be placed and the thumbnail's width. 
// We are assuming that the path will be a relative path working 
// both in the filesystem, and through the web for links


createThumbs("Photos/images/","Photos/thumbs/",100);
header("refresh: 3; url=admin.php?mod=Photos/thumbs");
?>
<html>
<head>
<style type="text/css">
.dimmer1 {
	height:100%;
	background-color:white;
	z-index:9999;
	width:145px;
	position:fixed;
	top:46px;
	left:0;
	opacity:0.4;
	filter:alpha(opacity=40);
}
</style>
</head>
<body>
<br /><br />
<small>Window will refresh in (3) seconds.</small>
<div class="dimmer1">
</div>
</body>
</html>
