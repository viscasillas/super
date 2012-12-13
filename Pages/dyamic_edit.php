<style type="text/css">

.editableWithStaticLook:hover {
	background-color: #FFC;
}
</style>

<?php
//supercode libary (beta)
include('System/supercode/supercode.php');



//created/overwrites file.

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
	<span class="editableWithStaticLook" style="font-family:arial;font-size:30px;color:#333;font-style:italic;" onClick="window.open('?mod=Pages/title&filename=<?php echo $filename;?>','_self');">&nbsp;<?php echo $title;?></span>
    <?php echo '<form method="post" action="?mod=Pages/dyamic">
				<input type="text" name="dpgFile" value="'.$docname.'" style="display:none;">
                <input type="submit" value="Code/Design toggle" style="position:fixed;top:70px;left:500px;"/></input>
                </form>';?>
    
    <br />
	<input type="text" disabled="disabled" value="<?php echo $siteURL."?p=".$docname;?>" style="margin-left:5px;width:400px;font-size:10px;">	
</div>
<form action="" method="post" name="install" id="install"><br /><br /><br /><br />
    <textarea name="pageContent" id="pageContent" style="width:70%;height:500px;"><?php include('Pages/dpg/'.$_POST['dpgFile'].'.php');?></textarea> 
<br>
<input type="text" name="dpgFile" value="<?php echo $_POST["dpgFile"];?>" style="display:none;">
<?php
if($xml->permissions == "edit"){
						echo "<input type='submit' name='ReconfigureBTN' value='Save to Pages/dpg/".$_POST["dpgFile"].".php' style='border:0;outline:none;width:26px;height:38px;background-image:url(System/img/save.png);color:transparent;position:fixed;top:65px;left:850px;'>";}
		if($xml->permissions == "full"){
						echo "<input type='submit' name='ReconfigureBTN' value='Save to Pages/dpg/".$_POST["dpgFile"].".php' style='border:0;outline:none;width:26px;height:38px;background-image:url(System/img/save.png);color:transparent;position:fixed;top:65px;left:850px;'>";}
		if($xml->permissions == "read"){
						echo 'Not Edit';}
?>
</form>
<script type="text/javascript">
	CKEDITOR.replace( 'pageContent',
      {

        toolbar :
            [
                { name: 'toolbar', items : [ 'Preview','Undo','Redo','Find','Replace','-','SelectAll','-','Scayt' ] },
                { name: 'insert', items : [ 'Image','Table','Smiley','SpecialChar'] },
                { name: 'styles', items : [ 'Styles','Format' ] },
                { name: 'basicstyles', items : [ 'Bold','Italic','Strike','-','RemoveFormat' ] },
                { name: 'paragraph', items : [ 'NumberedList','BulletedList','-','Outdent','Indent','-','Blockquote' ] },
                { name: 'tools', items : [ 'Link','Unlink','Anchor','Maximize' ] }
            ],
        width: "80%",
        height: "450px"
        });
</script>
  <br /><br /><small>** Be very careful with these switches, they power your livesite navigation.</small>

