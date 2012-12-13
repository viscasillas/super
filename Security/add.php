<?php
$errors = array();
if(isset($_POST['login'])){
	$username = preg_replace('/[^A-Za-z]/', '', $_POST['username']);
	$email = $_POST['email'];
	$password = $_POST['password'];
	$c_password = $_POST['c_password'];
	$usertype = $_POST['usertype'];
	$delete = 'allow';
	
	if(file_exists('Security/users/' . $username . '.xml')){
		$errors[] = 'Username already exists';
	}
	if($username == ''){
		$errors[] = 'Username is blank';
	}
	if($email == ''){
		$errors[] = 'Email is blank';
	}
	if($password == '' || $c_password == ''){
		$errors[] = 'Passwords are blank';
	}
	if($password != $c_password){
		$errors[] = 'Passwords do not match';
	}
	if(count($errors) == 0){
		$xml = new SimpleXMLElement('<user></user>');
		$xml->addChild('password', md5($password));
		$xml->addChild('email', $email);
		$xml->addChild('delete', $delete);
		$xml->addChild('group', $usertype);
		$xml->asXML('Security/users/' . $username . '.xml');
		header('Location: admin.php?mod=Security/users');
		die;
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Register</title>
</head>
<body>
	<span style="font-family:arial;font-size:20px;color:#333;font-style:italic;">Add User</span>
	<form method="post" action="">
		<?php
		if(count($errors) > 0){
			echo '<ul>';
			foreach($errors as $e){
				echo '<li>' . $e . '</li>';
			}
			echo '</ul>';
		}
		?>
		<p style="font-family:arial;font-size:14px;">Username <input type="text" name="username" size="20" /></p>
		<p style="font-family:arial;font-size:14px;">Email <input type="text" name="email" size="20" /></p>
		<p style="font-family:arial;font-size:14px;">Password <input type="password" name="password" size="20" /></p>
		<p style="font-family:arial;font-size:14px;">Confirm Password <input type="password" name="c_password" size="20" /></p>
		<p style="font-family:arial;font-size:14px;">User Type: 
        	<select name="usertype">
            	<option value="admin">-admin</option>
            	<option value="user">-user</option>
            </select>
        </p>
         <input accesskey="s" type="submit" name="login" style="border:0;outline:none;width:26px;height:38px;background-image:url(System/img/save.png);color:transparent;position:fixed;top:70px;left:650px;">
	</form>
</body>
</html>