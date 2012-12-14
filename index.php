<?php
// This puts together the website for us.

include('Site/config.php');

echo "<html><head><title>".$siteTitle."</title>"; include('Site/headers.php'); echo "<link rel='icon' href='".$siteFavicon."' type='image/x-icon'>
<link rel='shortcut icon' href='".$siteFavicon."' type='image/x-icon'><link href='Site/".$siteTheme."/style.css' rel='stylesheet' type='text/css'></head><body>";


include('Site/'.$siteTheme.'/template.php');

//\\\\\\\\\\
echo "<div class=poweredby onClick=window.open('admin.php','superpanel')>
</div>";

echo "</body></html>";
?>