<style type="text/css">

.editableWithStaticLook:hover {
	background-color: #FFC;
}
</style>

<?php
$files = glob('Pages/pg/'.$_POST["dpgFile"].'.xml');
			foreach($files as $file){
			$xml = new SimpleXMLElement($file, 0, true);
			$title = $xml->title;
			$docname = $xml->docname;
			$filename = $_POST["dpgFile"];
			};
			
			
if (isset($_POST["ReconfigureBTN"])) {



$string = $_POST["pageContent"];



$fp = fopen("Pages/dpg/".$_POST['dpgFile'].".php", "w");

fwrite($fp, $string);

fclose($fp);

echo "<div id='savingsuccess' style='display:block'>Saved!</div>
			<script type='text/javascript'>
				// close the div in 5 secs
				window.setTimeout('closeHelpDiv();', 1000);
				function closeHelpDiv(){
				document.getElementById('savingsuccess').style.display=' none';
				}</script>";
}



?>
<div class="editorTools">
	<span class="editableWithStaticLook" style="font-family:arial;font-size:30px;color:#333;font-style:italic;" onClick="window.open('?mod=Pages/title&filename=<?php echo $filename;?>','_self');">&nbsp;<?php echo $title;?></span><br />
	<input type="text" disabled="disabled" value="<?php echo $siteURL."?p=".$docname;?>" style="margin-left:5px;width:400px;font-size:10px;">	
</div>
<form action="" method="post" name="install" id="install"><br /><br /><br /><br />
    <textarea name="pageContent" id="pageContent" style="width:70%;height:500px;"><?php include('Pages/dpg/'.$_POST['dpgFile'].'.php');?></textarea> 
<br>
<input type="text" name="dpgFile" value="<?php echo $_POST["dpgFile"];?>" style="display:none;">
 <input type="submit" name="ReconfigureBTN" value="Save to 'Pages/dpg/<?php echo $_POST["dpgFile"];?>.php'" style="border:0;outline:none;width:26px;height:38px;background-image:url(System/img/save.png);color:transparent;position:fixed;top:65px;left:850px;">
</form>

  <br /><br /><small>** Be very careful with these switches, they power your livesite navigation.</small>

