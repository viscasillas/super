<?php
$error = false;
if(isset($_POST['change'])){
	$newsort = $_POST['newsort'];
	$xml = new SimpleXMLElement('Pages/pg/' . $_GET['filename'] . '.xml', 0, true);
	
			$xml->sorting = $newsort;
			$xml->asXML('Pages/pg/' . $_GET['filename'] . '.xml');
			header('Location: admin.php?mod=Pages/pages');
			die;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Title</title>
</head>
<body>
	<span style="font-family:arial;font-size:20px;color:#333;font-style:italic;">Change Menu Sorting: (<?php echo $_GET['filename'];?>)</span>
	<form method="post" action="">
		<?php 
		if($error){
			echo '<p>Some of the passwords do not match</p>';
		}
		?>
		<p style="font-family:arial;font-size:14px;">Sorting: <input type="text" name="newsort" value="<?php $files = glob('Pages/pg/'.$_GET['filename'].'.xml');foreach($files as $file){$gettitle = new SimpleXMLElement($file, 0, true);echo $gettitle->sorting;};?>"/></p>
        
        <input accesskey="s" type="submit" name="change" style="border:0;outline:none;width:26px;height:38px;background-image:url(System/img/save.png);color:transparent;position:fixed;top:70px;left:650px;">
	</form>
        
        
	</form>
</body>
</html>