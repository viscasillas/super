<!-- Stylesheet for the xPanel warning in the if statement down below, triggered when external source try to run this script -->
<style type="text/css">
body {
	background-color:#333333;
}
h4 {
	color:#FFF;
}
a:link,a:visited,a:hover,a:active {
	color:#CCC;
}
</style>
<!-- end of stylesheet -->
<?php
			$previouspage = htmlspecialchars($_SERVER['HTTP_REFERER']);
			if(isset($_POST['delete'])){
				$dlt = $_POST['chosenFile'];
				unlink('pg/'.$dlt.'.xml');
				header('Location: ../admin.php?mod=Pages/pages');
			} else {
				echo "
				<center>
				<img src='../logo.fw.png' width='143' height='46' />
				<h4>Error: You do not have permission to access this page =(</h4>
				<a href='$previouspage'>Go Back!</a>
				</center>";
				// header('Location: ../?mod=Pages/pages', '50000');
			;}
?>