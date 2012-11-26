<?php
if(isset($_POST['remove'])){
	unlink($_POST['deleteAccount']);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>User Page</title>
    <style type="text/css">
	.userhover:hover {
		cursor:default;
	}
	</style>
</head>
<body>
	<span style="font-family:arial;font-size:20px;color:#333;font-style:italic;">Users</span><br /><br />
	<table width="600px" border="0">
		<tr>
			<th style="font-family:arial;font-size:14px;text-align:left;"><i><b>Username:</b></i></th>
			<th style="font-family:arial;font-size:14px;text-align:left;"><i><b>Email:</b></i></th>
            <th style="font-family:arial;font-size:14px;text-align:left;"><i><b>Password <small>(md5)</small>:</b></i></th>
            <th style="font-family:arial;font-size:14px;text-align:left;"><i><b>Delete:</b></i></th>
		</tr>
		<?php
		$files = glob('People/users/*.xml');
		foreach($files as $file){
			$xml = new SimpleXMLElement($file, 0, true);
			echo '
			<tr class="fileList" style="text-align:left;">
				<td class="userhover" style="font-family:arial;color:black;font-size:12px;" onClick="window.open(\'?mod=People/username&username='. basename($file, '.xml') .'\',\'_self\');">'. basename($file, '.xml') .'</td>
				<td class="userhover" style="font-family:arial;color:black;font-size:12px;" onClick="window.open(\'?mod=People/email&username='. basename($file, '.xml') .'\',\'_self\');">'. $xml->email .'</td>
				<td class="userhover" style="font-family:arial;color:black;font-size:12px;" onClick="window.open(\'?mod=People/pw&username='. basename($file, '.xml') .'\',\'_self\');">'. $xml->password .'</td>
				<td>
					<form method="post" action="">
					<input type="text" name="deleteAccount" value="People/users/'. basename($file) .'" style="display:none;">
					<input type="submit" name="remove" value="Delete">
					</form>
				</td>
			</tr>';
		}
		?>
	</table>
        <small>super:hints, Edit any field of any user by simply clicking on it.</small>
</body>
</html>