<span style="font-family:arial;font-size:20px;color:#333;font-style:italic;">Latest Backup:</span><br><br>
<?php
/* creates a compressed zip file */
function create_zip($files = array(),$destination = '',$overwrite = false) {
  //if the zip file already exists and overwrite is false, return false
  if(file_exists($destination) && !$overwrite) { return false; }
  //vars
  $valid_files = array();
  //if files were passed in...
  if(is_array($files)) {
    //cycle through each file
    foreach($files as $file) {
      //make sure the file exists
      if(file_exists($file)) {
        $valid_files[] = $file;
      }
    }
  }
  //if we have good files...
  if(count($valid_files)) {
    //create the archive
    $zip = new ZipArchive();
    if($zip->open($destination,$overwrite ? ZIPARCHIVE::OVERWRITE : ZIPARCHIVE::CREATE) !== true) {
      return false;
    }
    //add the files
    foreach($valid_files as $file) {
      $zip->addFile($file,$file);
    }
    //debug
    //echo 'The zip archive contains ',$zip->numFiles,' files with a status of ',$zip->status;
    
    //close the zip -- done!
    $zip->close();
    
    //check to make sure the file exists
    return file_exists($destination);
  }
  else
  {
    return false;
  }
}
//if true, good; if false, zip creation failed
$result = create_zip(glob('Pages/pg/*'),'System/backups/pages.zip');
$result = create_zip(glob('Pages/dpg/*'),'System/backups/pages-dpg.zip');
$result = create_zip(glob('Security/users/*'),'System/backups/users.zip');
$result = create_zip(glob('Security/groups/*'),'System/backups/groups.zip');
$result = create_zip(glob('Site/default/*'),'System/backups/site-template.zip');
$result = create_zip(glob('Site/config.php'),'System/backups/site-config.zip');
$result = create_zip(glob('Photos/images/*.jpg'),'System/backups/photos-images.zip');
$result = create_zip(glob('Photos/thumbs/*.jpg'),'System/backups/photos-thumbs.zip');
//zips all of the zips together
$result = create_zip(glob('System/backups/*'),'System/backups/latest.zip');
//delete all the zips except for the zip containing all of the zips i am about to delete
unlink('System/backups/pages.zip');
unlink('System/backups/pages-dpg.zip');
unlink('System/backups/users.zip');
unlink('System/backups/groups.zip');
unlink('System/backups/site-template.zip');
unlink('System/backups/site-config.zip');
unlink('System/backups/photos-images.zip');
unlink('System/backups/photos-thumbs.zip');
echo "<a href='System/backups/latest.zip'>Download archive</a>";
?><br><br>
  <small>super:hints, Backups are automatically made everytime this page is loaded.</small>
	