<?php



if (isset($_POST["ReconfigureBTN"])) {



$string = '
<?php 
// File: config.php
// Purpose: Edit dynamic configurations within the default theme for the your super: site.
// By: Jose Viscasillas


// Sitewide configurations

// URL
$siteURL = "'. $_POST["siteURL"]. '";

// Theme
$siteTheme = "'. $_POST["siteTheme"]. '";

// Title
$siteTitle = "'. $_POST["siteTitle"]. '";

// Homepage
$siteHomepage = "'. $_POST["siteHomepage"]. '";

// Favicon
$siteFavicon = "'. $_POST["siteFavicon"]. '";

// Menu loader
$menuLoader = "'. $_POST["menuLoader"]. '";

// Page Loader
$pageLoader = "'. $_POST["pageLoader"]. '";

?>';



$fp = fopen("Site/config.php", "w");

fwrite($fp, $string);

fclose($fp);

echo "<div id='savingsuccess' style='display:block'>Saved!</div>
			<script type='text/javascript'>
				// close the div in 5 secs
				window.setTimeout('closeHelpDiv();', 1000);
				function closeHelpDiv(){
				document.getElementById('savingsuccess').style.display=' none';
				}</script>";
}


?>

<form action="" method="post" name="install" id="install">
<span style="font-family:arial;font-size:20px;color:#333;font-style:italic;">Sitewide Configuration</span><br>
  <p>
 siteURL
    <input name="siteURL" type="text" id="siteURL" value="<?php echo $siteURL;?>"> 

   

</p>

  <p>
siteTheme
    <input name="siteTheme" type="text" id="siteTheme" value="<?php echo $siteTheme;?>"> 

    

</p>

  <p>
siteTitle
    <input name="siteTitle" type="text" id="siteTitle" value="<?php echo $siteTitle;?>">

   </p>

  <p>
siteHomepage
    <input name="siteHomepage" type="text" id="siteHomepage" value="<?php echo $siteHomepage;?>">

   </p>

  <p>
siteFavicon
    <input name="siteFavicon" type="text" id="siteFavicon" value="<?php echo $siteFavicon;?>">

  </p>

  <p>
menuLoader
    <input name="menuLoader" type="text" id="menuLoader" value="<?php echo $menuLoader;?>">

  </p>

  <p>
pageLoader
    <input name="pageLoader" type="text" id="pageLoader" value="<?php echo $pageLoader;?>">

   </p>

  <p>

    <input type="submit" name="ReconfigureBTN" value="Save to 'Site/config.php'">

  </p>

</form>
