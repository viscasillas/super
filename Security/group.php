<?php	
if(isset($_POST['change'])){
	$new_group = $_POST['new_group'];
	$xml = new SimpleXMLElement('Security/users/' . $_GET['username'] . '.xml', 0, true);
	
			$xml->group = $new_group;
			$xml->asXML('Security/users/' . $_GET['username'] . '.xml');
			header('Location: admin.php?mod=Security/users');
			die;
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>User Page</title>
</head>
<body>
	<span style="font-family:arial;font-size:20px;color:#333;font-style:italic;">Change group (<?php echo $_GET['username'];?>)</span>
	<form method="post" action="">
		<p style="font-family:arial;font-size:14px;">Group: 
        <select name="new_group">
        	<option value="<?php $files = glob('Security/users/'.$_GET['username'].'.xml');foreach($files as $file){$getemail = new SimpleXMLElement($file, 0, true);echo $getemail->group;};?>"><?php $files = glob('Security/users/'.$_GET['username'].'.xml');foreach($files as $file){$getemail = new SimpleXMLElement($file, 0, true);echo $getemail->group;};?></option>
            <option value="admin">-admin</option>
            <option value="user">-user</option>
        </select></p>
        
        <input accesskey="s" type="submit" name="change" style="border:0;outline:none;width:26px;height:38px;background-image:url(System/img/save.png);color:transparent;position:fixed;top:70px;left:650px;">
	</form>
        
        
	</form>
</body>
</html>