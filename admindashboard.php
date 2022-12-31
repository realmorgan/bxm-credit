<!DOCTYPE html>
<html>
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>BXM Credits - Admin Dashboard</title>

	<!-- Bootstrap Stylesheet -->
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">

	<!-- Fontawesome -->
	<link rel="stylesheet" type="text/css" href="fontawesome/css/all.css">

	<!-- Internal CSS -->
	<style type="text/css">
	
	</style>

</head>
<body>

<?php include_once("headeradmin.php"); ?>

<div class="container-fluid">
		<div class="row mt-4">
			<h2><b><span style="color: purple;">BXM</span><span style="color: orange;">Credits</span> ADMIN</b></h2>
		</div>


	   <!-- Icon Cards-->
<div class="row mt-3" id="tabs">

	<div class="col-md-2">
			<div class="row-md-2 mt-2">
			    <div class="card text-black bg-warning o-hidden h-100">
			      <div class="card-body">
			        <div>
			          <i class="fa fa-users" style='font-size:20px'></i>
			        </div>
			        <div class="mr-5"><b>Customers</b></div>
			      </div>
			      <a class="card-footer text-black clearfix small z-1" href="#" id="showcust">
			        <span class="float-left">View</span>
			        <span class="float-right">
			          <i class="fa fa-angle-right"></i>
			        </span>
			      </a>
			    </div>
				</div>

				<div class="row-md-2 mt-2">
			    <div class="card text-black bg-warning o-hidden h-100">
			      <div class="card-body">
			        <div>
			          <i class="fa-solid fa-layer-group" style='font-size:20px'></i>
			        </div>
			        <div class="mr-5"><b>Loan Requests</b></div>
			      </div>
			      <a class="card-footer text-black clearfix small z-1" href="#" id="">
			        <span class="float-left">View</span>
			        <span class="float-right">
			          <i class="fa fa-angle-right"></i>
			        </span>
			      </a>
			    </div>
				</div>

				<div class="row-md-2 mt-2">
			    <div class="card text-black bg-warning o-hidden h-100">
			      <div class="card-body">
			        <div>
			          <i class="fa-solid fa-sack-dollar" style='font-size:20px'></i>
			        </div>
			        <div class="mr-5"><b>Loan Disbursed</b></div>
			      </div>
			      <a class="card-footer text-black clearfix small z-1" href="#" id="">
			        <span class="float-left">View</span>
			        <span class="float-right">
			          <i class="fa fa-angle-right"></i>
			        </span>
			      </a>
			    </div>
				</div>


				<div class="row-md-2 mt-2">
			    <div class="card text-black bg-warning o-hidden h-100">
			      <div class="card-body">
			        <div>
			          <i class="fa-solid fa-sack-dollar" style='font-size:20px'></i>
			        </div>
			        <div class="mr-5"><b>Paybacks</b></div>
			      </div>
			      <a class="card-footer text-black clearfix small z-1" href="#" id="">
			        <span class="float-left">View</span>
			        <span class="float-right">
			          <i class="fa fa-angle-right"></i>
			        </span>
			      </a>
			    </div>
				</div>


				<div class="row-md-2 mt-2">
			    <div class="card text-black bg-warning o-hidden h-100">
			      <div class="card-body">
			        <div>
			          <i class="fa-solid fa-sack-dollar" style='font-size:20px'></i>
			        </div>
			        <div class="mr-5"><b>Paybacks</b></div>
			      </div>
			      <a class="card-footer text-black clearfix small z-1" href="#" id="">
			        <span class="float-left">View</span>
			        <span class="float-right">
			          <i class="fa fa-angle-right"></i>
			        </span>
			      </a>
			    </div>
				</div>

		</div>



		<div class="col-md-6">
			<div id="custlist">
				<img src="images/boardpics.jpg" alt="adminpix" width="900px" class="ms-5" />
			</div>
		</div>


	</div>



</div>





<script type="text/javascript" src="jquery/jquery.min.js"></script>

<script type="text/javascript" language="javascript">
	$(document).ready(function(){
		$("#showcust").click(function(){
			$.ajax({
				url:"customers.php",
				type:"POST",
				success:function(data){
					$('#custlist').html(data);
				},
			})
		})
	});

</script>

<?php include_once("footer.php"); ?>

</body>
</html>