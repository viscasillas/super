	<span style="font-family:arial;font-size:20px;color:#333;font-style:italic;">Groups</span><br /><br />
    <?php
	$files = glob('Security/groups/*.xml');
	foreach($files as $file){
	$xml = new SimpleXMLElement($file, 0, true);
	$groupFileName = 'Security/groups/'.$xml->groupTitle.'.xml';
	echo $groupFileName.'<br>';
	};
	?>