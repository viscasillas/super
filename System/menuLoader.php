<?php
		// This scans creates a menuLink for each page in the Pages module
		$files = glob('Pages/pg/*.xml');
			foreach($files as $file){
			$xml = new SimpleXMLElement($file, 0, true);
			$genlink = substr($file, 9, -4);
			if($xml->onmenu == "yes"){
					echo '<a href="index.php?p='.$genlink.'" id="'.$xml->cpage.'" class="menuLinks">'.$xml->title.'</a>';
				};
		    if($xml->onmenu == "no"){
					echo '';
				};
			}
			?>