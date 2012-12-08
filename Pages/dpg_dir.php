<span style="font-family:arial;font-size:20px;color:#333;font-style:italic;">DPG Log</span><br><br>
<?php
$files = glob('Pages/dpg/*.php');
			foreach($files as $file){
			echo($file).'<br>';
			}
?>