	<span style="font-family:arial;font-size:20px;color:#333;font-style:italic;">Users Online</span><br /><br />
    <?php

	$loadCurrentUsers = glob('Security/current/*.xml');
  foreach($loadCurrentUsers as $loadCurrentUser){
	  $currentUserTrim = substr($loadCurrentUser, 17, -4);
  echo
   '<small>('.$currentUserTrim.')</small>';};
	?>