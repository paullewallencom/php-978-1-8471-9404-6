<?php
  $usernames = array('neb', 'lkovacev10', 'emuns','ena5','dado17','lara', 'amela12', 'zozo','sri');

  if(in_array($_GET['username'], $usernames))
  	echo "Username Not Available";
  else
    echo "Username Available";
?>
