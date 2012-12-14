<?php
//delete current user from currentUser list
$host = @gethostbyaddr($_SERVER["REMOTE_ADDR"]);
unlink('Security/current/'.$host.'.xml');

// logout
session_start();
session_destroy();
header('Location: login.php');