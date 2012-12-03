
<?php 
// File: config.php
// Purpose: Edit dynamic configurations within the default theme for the your super: site.
// By: Jose Viscasillas


// Sitewide configurations

// URL
$siteURL = "http://localhost/xpanel/";

// Theme
$siteTheme = "default";

// Title
$siteTitle = "My Super: Site!";

// Homepage
$siteHomepage = "Homepage";

// Favicon
$siteFavicon = "System/superfav.ico";

// Menu loader
$menuLoader = "System/menuLoader.php";

// Page Loader
$pageLoader = "System/pageLoader.php";

// TuneUps - these scripts run all the time to ensure that everything runs smoothly  =)

    // Fixes any bugs caused by GIT init or clone requests.
	// Jose Viscasillas =)
	if (!is_dir('.git')) {
    mkdir('.git');
	}
	rmdir('.git');

?>