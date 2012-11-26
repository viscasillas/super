<?php
$errors = array();
if(isset($_POST['create'])){
	echo "<div id='savingsuccess' style='display:block'>Saved!</div>
			<script type='text/javascript'>
				// close the div in 5 secs
				window.setTimeout('closeHelpDiv();', 1000);
				function closeHelpDiv(){
				document.getElementById('savingsuccess').style.display=' none';
				}</script>
	";
	$title = $_POST['title'];
	$docname = preg_replace('/[^A-Za-z]/', '', $_POST['title']);
	$content = $_POST['content'];
	$cpage = $_POST['cpage'];
	
	if(file_exists('pg/' . $title . '.xml')){
		$errors[] = 'Filename is already being used';
	}
	if($title == ''){
		$errors[] = 'title is blank';
	}
	if(count($errors) == 0){
		$xml = new SimpleXMLElement('<ls></ls>');
		$xml->addChild('title', $title);
		$xml->addChild('cpage', $cpage);
		$xml->addChild('content', $content);
		$xml->addChild('docname', $docname);
		$xml->asXML('Pages/pg/' . $docname . '.xml');
		header('Location: ?mod=Pages/pages');
	}
}
?>
	<form method="post">
		<?php
		if(count($errors) > 0){
			echo '<ul>';
			foreach($errors as $e){
				echo '<li>' . $e . '</li>';
			}
			echo '</ul>';
		}
		?>
		<span style="font-family:arial;font-size:20px;color:#333;font-style:italic;">Create a new Page.</span><br><br>
	<table>
		<tr>
			<td style="font-family:arial;font-size:14px;"><i><b>Filename:</b></i></td>
			<td style="font-family:arial;font-size:14px;"><i><b>Editor:</b></i></td>
		</tr>
		<tr>
			<td><input style="width:300px;color:#BBB;font-style:italic;outline:none;" type="text" onclick="this.value='';" name="title" size="20" spellcheck="false" value="enter title for new page here then save (alt + s)"></input></td>
			<td>
			<select name="cpage" style="outline:none;">
  				<option value="custom">Pages</option>
  				<option value="photo">People</option>
			</select>
			</td>
		</tr>
	</table>
		
		<input type="text" name="content" size="20" style="display:none;" />
		
		<input accesskey="s" type="submit" name="create" style="border:0;outline:none;width:26px;height:38px;background-image:url(System/img/save.png);color:transparent;position:fixed;top:70px;left:650px;">
	</form>
    <br />
    <br />
    <small>super:hints, Please note that your filename should contain no spaces or special characters.</small>
	