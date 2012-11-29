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
	.editableWithStaticLook:hover {
		background-color:#FFC;
	}
	.specialBtn {
	background-color: #fff;
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
	border-radius: 5px;
	border-top-width: 0px;
	border-right-width: 0px;
	border-bottom-width: 0px;
	border-left-width: 0px;
	border-top-style: none;
	border-right-style: none;
	border-bottom-style: none;
	border-left-style: none;
	}
	.specialBtn:hover {
	background-color: #FA696C;
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
	border-radius: 5px;
	border-top-width: 0px;
	border-right-width: 0px;
	border-bottom-width: 0px;
	border-left-width: 0px;
	border-top-style: none;
	border-right-style: none;
	border-bottom-style: none;
	border-left-style: none;
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
				<td class="userhover" style="font-family:arial;color:black;font-size:12px;" onClick="window.open(\'?mod=People/username&username='. basename($file, '.xml') .'\',\'_self\');"><span class="editableWithStaticLook">'. basename($file, '.xml') .'</span></td>
				<td class="userhover" style="font-family:arial;color:black;font-size:12px;" onClick="window.open(\'?mod=People/email&username='. basename($file, '.xml') .'\',\'_self\');"><span class="editableWithStaticLook">'. $xml->email .'</span></td>
				<td class="userhover" style="font-family:arial;color:black;font-size:12px;" onClick="window.open(\'?mod=People/pw&username='. basename($file, '.xml') .'\',\'_self\');"><span class="editableWithStaticLook">'. $xml->password .'</span></td>
				<td>
					<form method="post" action="">
					<input type="text" name="deleteAccount" value="People/users/'. basename($file) .'" style="display:none;">
					<input class="specialBtn" type="submit" name="remove" value="Delete">
					</form>
				</td>
			</tr>';
		}
		?>
	</table>
        <small>super:hints, Edit any field of any user by simply clicking on it.</small>
</body>
</html>