<div id="blanket" style="display:none;" onclick="popup('popUpDiv')"></div>
<div id="popUpDiv" style="display:none;">
<?php include('System/plogin.php');?>
</div>

<div class="mainContainer">
<div class="siteHeader">
	<div class="siteHeaderText" onClick="window.open('<?php echo $siteURL;?>','_self');">
		<span class="siteHeaderTitle"><b>My super: site!</b></span><br>
    	<span class="siteHeaderSlogan"><i>But this one runs on super:!</i></span>
    </div>
</div>
<div class="menuBar">
	<div class="menuBar_linksContainer">
        <?php include($menuLoader);?>
        <!--<a href="#" id="loginbutton" class="menuLinks" onclick="popup('popUpDiv')">Login</a>-->
    </div>
</div>
<div class="contentBox">
	<div class="contentBox_content">
      <?php include($pageLoader);?>
      </div>
      
</div>
</div>

<div class="poweredby" onClick="window.open('admin.php','superpanel')">
</div>

