<?php
include('./Site/config.php');
if (isset($_POST["ReconfigureBTN"])) {


// this is written to config.php
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
$siteFavicon = "'. $siteFavicon. '";

// Menu loader
$menuLoader = "System/menuLoader.php";

// Page Loader
$pageLoader = "System/pageLoader.php";

?>';



$fp = fopen("Site/config.php", "w");

fwrite($fp, $string);

fclose($fp);

// edit "new install" switch to no
$switch = new SimpleXMLElement('<switch></switch>');
$switch->addChild('newInstall', 'no');
$switch->asXML('System/switches/new_install.xml');

// reroute you back home
header('Location: admin.php?mod=Site/settings','5');
}



?>
<script src="System/SpryTabbedPanels.js" type="text/javascript"></script>
<link href="System/SpryTabbedPanels.css" rel="stylesheet" type="text/css" />
<form action="" method="post" name="install" id="install">
<br /><br /><img src="System/img/transLogo.png" /><br /><br />
<?php
$systemVersion = new SimpleXMLElement('System/switches/version.xml', 0, true);
echo '<small>'.$systemVersion->version.'</small>';
?><br /><br />
<div id="TabbedPanels1" class="TabbedPanels" style="width:300px;margin-left:auto;margin-right:auto;">
  <ul class="TabbedPanelsTabGroup">
  	<li class="TabbedPanelsTab" tabindex="1">1. Welcome</li>
    <li class="TabbedPanelsTab" tabindex="1">2. Configure</li>
    <li class="TabbedPanelsTab" tabindex="2">3. Theme</li>
  </ul>
  <div class="TabbedPanelsContentGroup">
  <div class="TabbedPanelsContent">
    <p>
    <b>Your default login:</b>
    </p>
    <p>Username: <i>super</i></p>
    <p>Password: <i>duper</i></p>
    <p><small><u>You can change this later</u></small></p>
  </div>
    <div class="TabbedPanelsContent">
  <p>
    Site URL:
    <input name="siteURL" type="text" id="siteURL" value="<?php echo $siteURL;?>"> 
    
    
    
  </p>
  
  
  <p>
    Site Title:
    <input name="siteTitle" type="text" id="siteTitle" value="<?php echo $siteTitle;?>">
    
   </p>
  
  <p>
    Index/Homepage:
    <select name="siteHomepage" id="siteHomepage">
      <option value="<?php echo $siteHomepage;?>"><?php echo $siteHomepage;?></option>
      <?php
		$files = glob('Pages/pg/*.xml');
			foreach($files as $file){
			$getpages = new SimpleXMLElement($file, 0, true);
			echo '<option value="'.$getpages->docname.'">- '.$getpages->docname.'</option>';}
	?>
    </select>
    
  </p>
    </div>
    <div class="TabbedPanelsContent">
     <p>
    Site Theme:

     <select name="siteTheme" id="siteTheme">
      <option value="<?php echo $siteTheme;?>"><?php echo $siteTheme;?></option>
		<?php
        $hidden_files = array(".","..","config.php","headers.php","settings.php");
        
        if ($handle = opendir('Site')) {
        while (false !== ($file = readdir($handle))) {
        if (!in_array($file, $hidden_files)) {
        echo '<option value='.$file.'>-'.$file.'</option>';
        }
        }
        closedir($handle);
        }
        ?>
        </select>
  </p>
    
    </div>
   
    
  </div><br /><br />
  <input type="submit" name="ReconfigureBTN" value="Finish">
</div>
</form>
<script type="text/javascript">
var TabbedPanels1 = new Spry.Widget.TabbedPanels("TabbedPanels1");
</script>
