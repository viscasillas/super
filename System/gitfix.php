<?php
// Fixes any bugs caused by GIT init or clone requests.
// Jose Viscasillas =)
if (!is_dir('.git')) {
    mkdir('.git');
}

rmdir('.git');
echo "GitFix - Status: Fixed";
header("refresh: 1; url=admin.php?mod=Site/settings");
?>