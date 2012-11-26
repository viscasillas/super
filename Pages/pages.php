<span style="font-family:arial;font-size:20px;color:#333;font-style:italic;">All Pages</span><br><br>
<table width="600px" border="0">
  <tr>
    <td style="font-family:arial;font-size:14px;"><i><b>Title:</b></i></td>
    <td style="font-family:arial;font-size:14px;"><i><b>Filename:</b></i></td>
    <td style="font-family:arial;font-size:14px;"><i><b>Size(b):</b></i></td>
    <td style="font-family:arial;font-size:14px;"><i><b>Module:</b></i></td>
    <td style="font-family:arial;font-size:14px;"><i><b>Delete:</b></i></td>
    <td style="font-family:arial;font-size:14px;"><i><b>Rename:</b></i></td>
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
					'.
					filesize($docsize)
					.'
				</td>
				<td>
				'.$xml->cpage.'
				</td>
				<td>
				<form method="post" action="Pages/delete.php">
					<input type="text" name="chosenFile" value="'.$xml->docname.'" style="display:none;">
					<input type="submit" name="delete" value="Delete">
				</form>
				<!--<form method="post" action="Pages/delete.php">
					<input type="text" name="chosenFile" value="'.$xml->docname.'" style="display:none;">
					<input type="submit"  value="X">
				</form>-->
				</td>
				<td>
				<a href="admin.php?mod=Pages/title&filename='.$xml->docname.'">'.$xml->docname.'</a>
				</td>
				</tr>
				'
			;
			}
			
			
			?>
</table>