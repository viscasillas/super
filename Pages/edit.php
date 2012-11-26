<!-- Save to existing file-->
<?php
$page = $_POST['page'];

$files = glob('Pages/pg/'.$page.'.xml');
foreach($files as $file){
		$xml = new SimpleXMLElement($file, 0, true);
		$docname = $xml->docname;
}

include('Site/config.php');
if(isset($_POST['overwrite'])){
	echo "<div id='savingsuccess' style='display:block'>Saved!</div>
			<script type='text/javascript'>
				// close the div in 5 secs
				window.setTimeout('closeHelpDiv();', 1000);
				function closeHelpDiv(){
				document.getElementById('savingsuccess').style.display=' none';
				}</script>
	";
	$title = $_POST['title'];
	$content = $_POST['content'];
	$cpage = $_POST['cpage'];
	$xml = new SimpleXMLElement('<ls></ls>');
	$xml->addChild('title', $title);
	$xml->addChild('cpage', $cpage);
	$xml->addChild('content', $content);
	$xml->addChild('docname', $docname);
	$xml->asXML('Pages/pg/' . $docname . '.xml');
//	header('Location: ?mod=Pages/pages');
}


		
		foreach($files as $file){
		$xml = new SimpleXMLElement($file, 0, true);
		$titleOfDoc = $xml->title;
		echo
		'<br><br><br>
		<form method="post" action="?mod=Pages/edit">
				<input type="text" name="title" value="'.$xml->title.'" style="display:none;">
				<input type="text" name="cpage" value="'.$xml->cpage.'" style="display:none;">
				<textarea id="content" name="content">'.$xml->content.'</textarea>
				<input type="text" name="page" value="'.$xml->docname.'" style="display:none;">
				<input type="text" name="docname" value="'.$xml->docname.'" style="display:none;">
				<input accesskey="s" type="submit" name="overwrite" style="border:0;outline:none;width:26px;height:38px;background-image:url(System/img/save.png);color:transparent;position:fixed;top:65px;left:850px;">
		</form>
		';}
?>
<script type="text/javascript">

	CKEDITOR.replace( 'content',
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
<!-- Some integration calls -->
<div class="editorTools">
	<span style="font-family:arial;font-size:30px;color:#333;font-style:italic;" onClick="window.open('?mod=Pages/title&filename=<?php echo $docname;?>','_self');">&nbsp;<?php echo $titleOfDoc;?></span><br>
	<!--<a class="mod" target="preview" href="pg.php?v=<?php echo $docname;?>"><u><?php echo $docname;?>.xml</u></a>-->
	<input type="text" disabled="disabled" value="<?php echo $siteURL."?p=".$docname;?>" style="margin-left:5px;width:400px;font-size:10px;">
	
</div>

<!--
<script type="text/javascript">
// close the div in 5 secs
window.setTimeout("closeHelpDiv();", 1000);

function closeHelpDiv(){
document.getElementById("savingsuccess").style.display=" none";
}
</script>-->