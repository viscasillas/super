  <?php
		if (empty($_GET['p']))
  		{
  		$files = glob('Pages/pg/'.$siteHomepage.'.xml');
			foreach($files as $file){
			$xml = new SimpleXMLElement($file, 0, true);
			echo $xml->content;}
  		}
		else
  		{
  		$files = glob('Pages/pg/'.$_GET['p'].'.xml');
			foreach($files as $file){
			$xml = new SimpleXMLElement($file, 0, true);
			echo $xml->content;}
  		}
		
			?>