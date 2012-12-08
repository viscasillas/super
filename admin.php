<?php
include('Site/config.php');
session_start();
if(!file_exists('Security/users/' . $_SESSION['username'] . '.xml')){
	header('Location: login.php');
	die;
}
// generate api variables for modules to list their names and page
$moduleName = $_GET['mod'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>super:panel</title>
<link rel="icon" href="System/img/superfav.ico" type="image/x-icon">
<link rel="shortcut icon" href="System/img/superfav.ico" type="image/x-icon"> 
<!--
	Jose Viscasillas
	This program is a development beta build of my current version of xPanel, all programs that I (Jose Viscasillas) have put together for a future release of an awesome open-source CMS.
    This build of xPanel will remain propriatary software until the date of January 01 2013. After said date xPanel will be launched as an open-source project along with its sister project, codenamed "super:panel" with "super:panel" being propriatary code served as a paid-for program to be recognized as an upgrade to the xPanel build that will be released on Jaunary 01 2013 with its formal title "xPanel".
-->
<link href="System/style.css" rel="stylesheet" type="text/css" />
<script src="System/xpath.js" type="text/javascript"></script>
<script src="System/spry.js" type="text/javascript"></script>

<script type="text/javascript" src="System/ckeditor/ckeditor.js"></script>

<?php  
// Scans the root directory in xPanel for any installed modules
$dh = opendir(".");
while (($file = readdir($dh)) !== false) {
if (is_dir($file) && ($file != ".") && ($file != "..")) {
echo 
'<script type="text/javascript">
var '.$file.' = new Spry.Data.XMLDataSet("'.$file.'/menu.xml", "moduleMenu/menuItem");
</script>';
}
}
closedir($dh);
?>
<script language=JavaScript>
//    var message='This program is a development beta build of my current version of xPanel, all programs that I (Jose Viscasillas) have put together for a future release of an awesome open-source CMS. This build of xPanel will remain propriatary software until the date of January 01 2013. After said date xPanel will be launched as an open-source project along with its sister project, codenamed "super:panel" with "super:panel" being propriatary code served as a paid-for program to be recognized as an upgrade to the xPanel build that will be released on Jaunary 01 2013 with its formal title xPanel - Jose Viscasillas';         
//    function clickIE4(){
//        if (event.button==2){ alert(message); return false; }
//    }
//    function clickNS4(e){
//        if (document.layers||document.getElementById&&!document.all){ 
//            if (e.which==2||e.which==3){ 
//                alert(message);
//                return false; 
//            } 
//        }
//    }
//    if (document.layers){ 
//        document.captureEvents(Event.MOUSEDOWN);
//        document.onmousedown=clickNS4;
//    } else if (document.all&&!document.getElementById){
//        document.onmousedown=clickIE4; 
//    } 
//    document.oncontextmenu=new Function('alert(message); return false') 
</script>
</head>

<body>
<div class="jumprBrdr"></div>
<div class="jumper" ondragstart="return false" onselectstart="return false">
<?php


if  ($_GET['mod'] == "") {
    header('Location: ?mod=Pages/pages');;
} else {
    include($_GET['mod'].'.php');
}
;?>
<div class="xPanelStatusBar" onClick="window.open('?mod=System/chainlog/full','_self');">super:.(v0.8c)<small>by: <b>vivalavisca</b></small><br />build (000008c)</div>
<div class="xPanelAdminSettingsWidget">
  <div class="xPanelAdminSettingsWidget_link">
  	Administrator (<small><?php echo $_SESSION['username']; ?></small>)
  </div>
  <div class="xPanelAdminSettingsWidget_link" onClick="window.open('admin.php?mod=Site/settings','_self');">
  	Settings
  </div>
  <div class="xPanelAdminSettingsWidget_link" onClick="window.open('?mod=Security/changepassword','_self');">
  	Password
  </div>
  <div class="xPanelAdminSettingsWidget_link" onClick="window.open('?mod=Security/logout','_self');">
  	Logout
  </div>
</div>
</div>

<div class="xPanel_toolbar">
<div class="xPanel_menuList">
<img src="System/img/super_modern.png" onClick="window.open('?mod=Pages/pages','_self');"><br />
<!-- Module menus -->
<?php  
// Scans the root directory in xPanel for any installed modules
$dh = opendir(".");
while (($file = readdir($dh)) !== false) {
if (is_dir($file) && ($file != ".") && ($file != "..")) {
	$page = substr('{location}', 0, -3);
echo 
'<div spry:region="'.$file.'">
      <h3>'.$file.'</h3>
    <div spry:repeat="'.$file.'">
	<a class="mod" href="?mod='.$file.'/{location}">{name}</a>
    </div>
</div>
';
}
}
closedir($dh);
?>
<!-- End of system menus -->


</div>
</div>
</body>
</html>