
<span style="font-family:arial;font-size:20px;color:#333;font-style:italic;">Creating Thumnails for all Images.</span><br><br>
<?php
/*
	This is the PHP code for the How to Create Thumbnail Images using PHP Tutorial

	This script creates all of the thumbnail images and the gallery.html page.

	Note: Make sure that PHP has permission to read and write 
	to the directory in which .jpg files are stored and the directory 
	in which you're trying to create thumbnails.	
	
	You may use this code in your own projects as long as this 
	copyright is left in place.  All code is provided AS-IS.
	This code is distributed in the hope that it will be useful,
 	but WITHOUT ANY WARRANTY; without even the implied warranty of
 	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
	
	Copyright 2007 WebCheatSheet.com	
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

function createGallery( $pathToImages, $pathToThumbs ) 
{
  echo "Creating gallery.html <br />";

  $output = "<html>";
  $output .= "<head><title>Thumbnails</title></head>";
  $output .= "<body>";
  $output .= "<table cellspacing=\"0\" cellpadding=\"2\" width=\"500\">";
  $output .= "<tr>";

  // open the directory
  $dir = opendir( $pathToThumbs );

  $counter = 0;
  // loop through the directory
  while (false !== ($fname = readdir($dir)))
  {
    // strip the . and .. entries out
    if ($fname != '.' && $fname != '..') 
    {
      $output .= "<td valign=\"middle\" align=\"center\"><a href=\"{$pathToImages}{$fname}\">";
      $output .= "<img src=\"{$pathToThumbs}{$fname}\" border=\"0\" />";
      $output .= "</a></td>";

      $counter += 1;
      if ( $counter % 4 == 0 ) { $output .= "</tr><tr>"; }
    }
  }
  // close the directory
  closedir( $dir );

  $output .= "</tr>";
  $output .= "</table>";
  $output .= "</body>";
  $output .= "</html>";

  // open the file
  $fhandle = fopen( "gallery.html", "w" );
  // write the contents of the $output variable to the file
  fwrite( $fhandle, $output ); 
  // close the file
  fclose( $fhandle );
}

// call createThumb function and pass to it as parameters the path 
// to the directory that contains images, the path to the directory
// in which thumbnails will be placed and the thumbnail's width. 
// We are assuming that the path will be a relative path working 
// both in the filesystem, and through the web for links
createThumbs("Photos/images/","Photos/thumbs/",100);
// header("Location: admin.php?mod=Photos/thumbs");
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
	filter:alpha(opacity=40); /* For IE8 and earlier */
}
</style>
</head>
<body><br /><br />
<small>Window will refresh in (3) seconds.</small>
<div class="dimmer1">
</div>
</body>
</html>