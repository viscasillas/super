<style type="text/css">
a.renameLink:link, a.renameLink:active, a.renameLink:visited {
	color:#000;
	font-family:arial;
	font-size:12px;
	text-decoration:none;
}
a.renameLink:hover {
	background-color: #FFC;
	font-family:Arial, Helvetica, sans-serif;
	cursor:default;
}
.specialBtn {
	background-color: #fff;
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
	border-radius: 5px;
	border-top-width: 0px;
	border-right-width: 0px;
	border-bottom-width: 0px;
	border-left-width: 0px;
	border-top-style: none;
	border-right-style: none;
	border-bottom-style: none;
	border-left-style: none;
	}
	.specialBtn:hover {
	background-color: #FA696C;
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
	border-radius: 5px;
	border-top-width: 0px;
	border-right-width: 0px;
	border-bottom-width: 0px;
	border-left-width: 0px;
	border-top-style: none;
	border-right-style: none;
	border-bottom-style: none;
	border-left-style: none;
	}
</style>
<span style="font-family:arial;font-size:20px;color:#333;font-style:italic;cursor:default;">All Pages</span><br><br>
<table width="600px" border="0">
  <tr>
    <td style="font-family:arial;font-size:14px;cursor:default;"><i><b>Title:</b></i></td>
    <td style="font-family:arial;font-size:14px;cursor:default;"><i><b>Filename:</b></i></td>
    <td style="font-family:arial;font-size:14px;cursor:default;"><i><b>Size(b):</b></i></td>
    <td style="font-family:arial;font-size:14px;cursor:default;"><i><b>Module:</b></i></td>
    <td style="font-family:arial;font-size:14px;cursor:default;"><i><b>Delete:</b></i></td>
    <td style="font-family:arial;font-size:14px;cursor:default;"><i><b>Rename:</b></i></td>
  </tr>
<?php
			$files = glob('Pages/pg/*.xml');
			foreach($files as $file){
			$xml = new SimpleXMLElement($file, 0, true);
			$docsize = 'Pages/pg/'.$xml->docname.'.xml';
			echo
			'<tr class="fileList">
				<td><form method="post" action="?mod=Pages/edit">
				<input type="text" name="page" value="'.$xml->docname.'" style="display:none;">
                <input type="submit" value="'.$xml->title.'" style="background-color:transparent;border:none;"/></input>
                </form>
				</td>
				<td><form method="post" action="?mod=Pages/edit">
				<input type="text" name="page" value="'.$xml->docname.'" style="display:none;">
                <input type="submit" value="'.$xml->docname.'.xml" style="background-color:transparent;border:none;"/></input>
                </form>
				</td>
				<td>
					<span style="font-size:12px;font-family:Times New Roman, Times, serif;cursor:default;">'.
					filesize($docsize)
					.'</span>
				</td>
				<td>
				<span style="font-size:12px;font-family:Times New Roman, Times, serif;cursor:default;">'.$xml->cpage.'<span>
				</td>
				<td>
				<form method="post" action="Pages/delete.php">
					<input type="text" name="chosenFile" value="'.$xml->docname.'" style="display:none;">
					<input class="specialBtn" type="submit" name="delete" value="Delete">
				</form>
				<!--<form method="post" action="Pages/delete.php">
					<input type="text" name="chosenFile" value="'.$xml->docname.'" style="display:none;">
					<input type="submit"  value="X">
				</form>-->
				</td>
				<td>
				<a class="renameLink" href="admin.php?mod=Pages/title&filename='.$xml->docname.'">'.$xml->title.'</a>
				</td>
				</tr>
				'
			;
			}
			
			
			?>
</table>