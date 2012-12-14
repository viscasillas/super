<?php
$error = false;
if(isset($_POST['login'])){
	$username = preg_replace('/[^A-Za-z]/', '', $_POST['username']);
	$password = md5($_POST['password']);
	if(file_exists('Security/users/' . $username . '.xml')){
		$xml = new SimpleXMLElement('Security/users/' . $username . '.xml', 0, true);
		if($password == $xml->password){
			if($xml->group == "admin"){
			session_start();
			$_SESSION['username'] = $username;
			// make currentUser file
				$host = @gethostbyaddr($_SERVER["REMOTE_ADDR"]);
		   		$make_currentUser = new SimpleXMLElement('<ls></ls>');
				$make_currentUser->addChild('currentUser', $username);
				$make_currentUser->addChild('host', $host);
				$make_currentUser->asXML('Security/current/' . $host . '.xml');
			header('Location: admin.php?mod=Pages/pages');
			die;
			}else{
				header('Location: index.php');
			}
		}
	}
	$error = true;
}
?>
<script language=JavaScript>
    var message='This program is a development beta build of my current version of xPanel, all programs that I (Jose Viscasillas) have put together for a future release of an awesome open-source CMS. This build of xPanel will remain propriatary software until the date of January 01 2013. After said date xPanel will be launched as an open-source project along with its sister project, codenamed "super:panel" with "super:panel" being propriatary code served as a paid-for program to be recognized as an upgrade to the xPanel build that will be released on Jaunary 01 2013 with its formal title xPanel - Jose Viscasillas';         
    function clickIE4(){
        if (event.button==2){ alert(message); return false; }
    }
    function clickNS4(e){
        if (document.layers||document.getElementById&&!document.all){ 
            if (e.which==2||e.which==3){ 
                alert(message);
                return false; 
            } 
        }
    }
    if (document.layers){ 
        document.captureEvents(Event.MOUSEDOWN);
        document.onmousedown=clickNS4;
    } else if (document.all&&!document.getElementById){
        document.onmousedown=clickIE4; 
    } 
    document.oncontextmenu=new Function('alert(message); return false') 
</script>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>super: login</title>
     <link href="Security/style.css" rel="stylesheet" type="text/css" />
</head>
<body ondragstart="return false" onselectstart="return false" style="background-color:#EEE;width:100%;height:100%;margin:0;padding:0;text-align:center; vertical-align:middle;overflow:hidden;">

<?php
$checkInstall = new SimpleXMLElement('System/switches/new_install.xml', 0, true);
if($checkInstall->newInstall == "yes"){
	include('System/welcome.php');
} else { echo "
<div style=background-image:url(System/img/loginDlg.png);width:265px;height:300px;margin-right:auto;margin-left:auto;margin-top:100px;padding-top:25px;background-repeat:no-repeat;>
	<img src=System/img/loginSign.png />
	<form method=post>
		<p><span style=font-family:ebrima;font-style:normal;font-size:13px;color:#0099ff;>Username:</span> <input type=text name=username size=20 style=padding-left:10px;background-repeat:no-repeat;width:212px;height:30px;background-image:url(System/img/txtInput.png);outline:none;border:none;/></p>
		<p><span style=font-family:ebrima;font-style:normal;font-size:13px;color:#0099ff;>Password:</span> <input type=password name=password size=20 style=padding-left:10px;background-repeat:no-repeat;width:212px;height:30px;background-image:url(System/img/txtInput.png);outline:none;border:none; /></p>";
		if($error){
			echo '<p style="color:#aaa;font-style:italic;">Invalid username and/or password</p>';
		};
		echo "
		<p><input type=submit name=login style=color:transparent;background-image:url(System/img/ok_75x25.png);width:75px;height:25px;border:none; /></p>
	</form></div>";
	}?>
</body>
</html>