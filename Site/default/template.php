<div class="mainContainer">
<div class="siteHeader">
	<div class="siteHeaderText" onClick="window.open('<?php echo $siteURL;?>','_self');">
		<span class="siteHeaderTitle"><b><?php echo $siteTitle;?></b></span><br>
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


