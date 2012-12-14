	<span style="font-family:arial;font-size:20px;color:#333;font-style:italic;">Groups</span><br /><br />
    <?php
$loadCurrentUsers = glob('Security/groups/*.xml');
  foreach($loadCurrentUsers as $loadCurrentUser){
	  $currentUserTrim = substr($loadCurrentUser, 16, -4);
  echo
   '<small>('.$currentUserTrim.')</small>';};	
	?>