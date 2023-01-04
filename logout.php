<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>BXM Credit - Sign Out Page</title>

	<!-- Bootstrap Stylesheet -->
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">

	<!-- Fontawesome -->
	<link rel="stylesheet" type="text/css" href="fontawesome/css/all.css">

	<!-- Internal CSS -->
	<style type="text/css">
		
	</style>

</head>
<body>

<?php 
	include_once("shared/user.php");

	// create object of User class
	$obj = new User();

	// make reference to logout
	$obj->logout();
?>

</body>
</html>