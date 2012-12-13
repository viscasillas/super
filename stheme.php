<?php
$hidden_files = array(".","..","config.php","headers.php","settings.php");

if ($handle = opendir('Site')) {
while (false !== ($file = readdir($handle))) {
if (!in_array($file, $hidden_files)) {
echo "$file<br>";
}
}
closedir($handle);
}
?>