<?php
session_start();
if(!file_exists('Security/users/' . $_SESSION['username'] . '.xml')){
	header('Location: admin.php?mod=Security/login');
	die;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>User Page</title>
    <link href="Security/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<h1>User Page</h1>
	<h2>Welcome, <?php echo $_SESSION['username']; ?></h2>
	<table>
		<tr>
			<th>Username</th>
			<th>Email</th>
		</tr>
		<?php
		$files = glob('Security/users/*.xml');
		foreach($files as $file){
			$xml = new SimpleXMLElement($file, 0, true);
			echo '
			<tr>
				<td>'. basename($file, '.xml') .'</td>
				<td>'. $xml->email .'</td>
			</tr>';
		}
		?>
	</table>
	<hr />
	<a href="admin.php?mod=Security/changepassword">Change Password</a>
	-
	<a href="admin.php?mod=Security/logout">Logout</a>
</body>
</html>