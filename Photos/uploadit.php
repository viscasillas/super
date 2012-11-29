<?php
//Enter the path to the file upload location here
$path="images/";
$i = $_POST['file'];
//Move the uploaded file
$path.=basename($_FILES['file']['name']); 
 
if(move_uploaded_file($_FILES['file']['tmp_name'], $path))
{
    echo "File ".basename($_FILES['file']['name'])." has been uploaded.";
}
else
{
    echo "An error has occurred. Please try again later.";
}

header('Location: ../admin.php?mod=Photos/thumber');
die;
?>