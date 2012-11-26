<?php
		// This scans creates a menuLink for each page in the Pages module
		$files = glob('Pages/pg/*.xml');
			foreach($files as $file){
			$xml = new SimpleXMLElement($file, 0, true);
			$genlink = substr($file, 9, -4);;
			echo '<a href="?p='.$genlink.'" id="'.$xml->title.'" class="menuLinks">'.$xml->title.'</a>';}
			?>