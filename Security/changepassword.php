<?php
//session_start();
if(!file_exists('Security/users/' . $_SESSION['username'] . '.xml')){
	header('Location: admin.php?mod=Security/login');
	die;
}
$error = false;
if(isset($_POST['change'])){
	$old = md5($_POST['o_password']);
	$new = md5($_POST['n_password']);
	$c_new = md5($_POST['c_n_password']);
	$xml = new SimpleXMLElement('Security/users/' . $_SESSION['username'] . '.xml', 0, true);
	if($old == $xml->password){
		if($new == $c_new){
			$xml->password = $new;
			$xml->asXML('Security/users/' . $_SESSION['username'] . '.xml');
			header('Location: admin.php?mod=Security/logout');
			die;
		}
	}
	$error = true;
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>User Page</title>
</head>
<body>
	<span style="font-family:arial;font-size:20px;color:#333;font-style:italic;">Change password (<?php echo $_SESSION['username']; ?>)</span>
	<form method="post" action="">
		<?php 
		if($error){
			echo '<p>Some of the passwords do not match</p>';
		}
		?>
		<p style="font-family:arial;font-size:14px;">Old password <input type="password" name="o_password" /></p>
		<p style="font-family:arial;font-size:14px;">New password <input type="password" name="n_password" /></p>
		<p style="font-family:arial;font-size:14px;">Confirm new password <input type="password" name="c_n_password" /></p>
        
        <input accesskey="s" type="submit" name="change" style="border:0;outline:none;width:26px;height:38px;background-image:url(System/img/save.png);color:transparent;position:fixed;top:70px;left:650px;">
	</form>
</body>
</html>