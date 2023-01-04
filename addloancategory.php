<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>BXM Credit - Add Loan</title>

	<!-- Bootstrap Stylesheet -->
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">

	<!-- Fontawesome -->
	<link rel="stylesheet" type="text/css" href="fontawesome/css/all.css">

	<!-- Internal CSS -->
	<style type="text/css">
		
	</style>

</head>
<body>

<?php
		// include the class file
		include_once("shared/admin.php");

		// create object of Admin class
		$obj = new Admin();

		// access listCustomers method
		$output = $obj->insertLoanCat(); 

		// echo "<pre>";
		// print_r($output);
		// echo "</pre>";
?>