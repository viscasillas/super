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
header('Location: admin.php?mod=Site/settings','5');
}



?>
<script src="System/SpryTabbedPanels.js" type="text/javascript"></script>
<link href="System/SpryTabbedPanels.css" rel="stylesheet" type="text/css" />
<form action="" method="post" name="install" id="install">
<span style="font-family:arial;font-size:20px;color:#333;font-style:italic;">Sitewide Settings</span><br><br />
<div id="TabbedPanels1" class="TabbedPanels">
  <ul class="TabbedPanelsTabGroup">
    <li class="TabbedPanelsTab" tabindex="1">Configuration</li>
    <li class="TabbedPanelsTab" tabindex="2">Theme</li>
    <li class="TabbedPanelsTab" tabindex="3">Advanced</li>
    <li class="TabbedPanelsTab" tabindex="4">Tools</li>
  </ul>
  <div class="TabbedPanelsContentGroup">
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
  
  <p>
    Favicon:
    <input name="siteFavicon" type="text" id="siteFavicon" value="<?php echo $siteFavicon;?>">
    
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
    <div class="TabbedPanelsContent">
      <p>
    Menu Loader Script **
    <input name="menuLoader" type="text" id="menuLoader" value="<?php echo $menuLoader;?>">
    
  </p>
  
  <p>
    Page Loader Script**
    <input name="pageLoader" type="text" id="pageLoader" value="<?php echo $pageLoader;?>">
    
   </p>
    
    </div>
    <div class="TabbedPanelsContent">
    <p><a href="admin.php?mod=System/gitfix">System / GitFix</a></p>
    <p><a href="admin.php?mod=System/chainlog/full">System / Chainlog</a></p>
    <p><a href="admin.php?mod=Photos/purge">Photos / Purge All</a></p>
    <p><a href="admin.php?mod=Photos/thumber">Photos / ReThumb</a></p>
    <p><a href="admin.php?mod=System/backup">System / Download backup</a></p>
    </div>
  </div>
  <input type="submit" name="ReconfigureBTN" value="Save to 'Site/config.php'">
</div>
</form>

  <br /><br /><small>** Be very careful with these switches, they power your livesite navigation.</small>
<script type="text/javascript">
var TabbedPanels1 = new Spry.Widget.TabbedPanels("TabbedPanels1");
</script>
