<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>BXM Credit - All  Customers</title>

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
		$output = $obj->listCustomers(); 

		// echo "<pre>";
		// print_r($output);
		// echo "</pre>";
?>

	<div style="justify-self: center;">
		<h2>Customer List</h2>
	</div>

	<div class="row">
		<div class="col-md-7">
			<table class="table table-bordered table-hover">
				<thread>
					<tr>
						<th>Firstname</th>
						<th>Lastname</th>
						<th>Email Address</th>
						<th>Phone Number</th>
						<th>Username</th>
						<th>Bank</th>
						<th>Account No</th>
						<th>BVN</th>
						<th>Created at</th>
						<th>Action</th>
					</tr>
				</thread>
				<tbody>
					<?php 
						foreach ($output as $key => $value){
							# code...
					?>
					<tr>
						<td><?php echo $value['firstname']?></td>
						<td><?php echo $value['lastname']?></td>
						<td><?php echo $value['emailaddress']?></td>
						<td><?php echo $value['phonenumber']?></td>
						<td><?php echo $value['username']?></td>
						<td><?php echo $value['bank']?></td>
						<td><?php echo $value['accnumber']?></td>
						<td><?php echo $value['bvn']?></td>
						<td><?php echo $value['created_at']?></td>
						<td>
						<a href="editcustomer.php?cust_id=<?php echo $value['cust_id']?>"><button type="button" class="btn btn-primary">Edit</button></a> |
						 <a href="deletecustomer.php?cust_id=<?php echo $value['cust_id']?>"><button type="button" class="btn btn-danger">Delete</button></a>
						</td>
					</tr>
					<?php 
						}
					?>
				</tbody>
			</table>
		</div>
	</div>

</body>
</html>