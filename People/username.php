<?php
if(isset($_POST['change'])){
	rename('People/users/'.$_GET['username'].'.xml','People/users/'.$_POST['newusername'].'.xml');
	header('Location: admin.php?mod=People/users');
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>username</title>
</head>

<body>
<span style="font-family:arial;font-size:20px;color:#333;font-style:italic;">Change Username (<?php echo $_GET['username'];?>)</span>
<form method="post" action="">
		<p style="font-family:arial;font-size:14px;">Username: <input type="text" name="newusername" /></p>
        
        <input accesskey="s" type="submit" name="change" style="border:0;outline:none;width:26px;height:38px;background-image:url(System/img/save.png);color:transparent;position:fixed;top:70px;left:650px;">
	</form>
        
        
	</form>
</body>
</html>