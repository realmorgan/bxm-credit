<?php 
	$password = "adminbxmc";

	$pword=password_hash($password, PASSWORD_DEFAULT);
	echo "$pword";

?>