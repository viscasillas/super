<?php
$error = false;
if(isset($_POST['login'])){
	$username = preg_replace('/[^A-Za-z]/', '', $_POST['username']);
	$password = md5($_POST['password']);
	if(file_exists('People/users/' . $username . '.xml')){
		$xml = new SimpleXMLElement('People/users/' . $username . '.xml', 0, true);
		if($password == $xml->password){
			session_start();
			$_SESSION['username'] = $username;
			header('Location: ?p=Homepage#success');
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
	<title>super: login</title>
</head>
<body>
<div style="background-image:url(System/img/loginDlg.png);width:265px;text-align:center;height:300px;margin-right:auto;margin-left:auto;padding-top:25px;background-repeat:no-repeat;">
	<img src="System/img/loginSign.png" />
	<form method="post" action="">
		<p><span style="font-family:ebrima; font-style:normal; font-size:13px; color:#0099ff;">Username:</span> <input type="text" name="username" size="20" style="padding-left:10px;background-repeat:no-repeat;width:212px;height:30px;background-image:url(System/img/txtInput.png);outline:none;border:none;" /></p>
		<p><span style="font-family:ebrima; font-style:normal; font-size:13px; color:#0099ff;">Password:</span> <input type="password" name="password" size="20" style="padding-left:10px;background-repeat:no-repeat;width:212px;height:30px;background-image:url(System/img/txtInput.png);outline:none;border:none;" /></p>
		<?php
		if($error){
			echo '<p style="color:#aaa;font-style:italic;">Invalid username and/or password</p>';
		}
		?>
		<p><input type="submit" value="" name="login" style=" color:transparent; background-image:url(System/img/ok_75x25.png);width:75px;height:25px;border:none;" /></p>
	</form>
</div>
</body>
</html>