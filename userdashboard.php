<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Customer Dashboard</title>

	<!-- Bootstrap Stylesheet -->
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">

	<!-- Fontawesome -->
	<link rel="stylesheet" type="text/css" href="fontawesome/css/all.css">

	<!-- Internal CSS -->
	<style type="text/css">
		
		div {
			border: 0px solid black;
		}

		.fa-solid {
			color: purple;
			font-size: 35px;
		}

		#tabs {
			justify-content: space-between;
		}

		label {
			color: white;
			font-size: 17px;
		}

		#loanbas {
			border: 0px solid black;
			border-radius: 10px;
			background-color: purple;
			width: 450px;
			height: 30px;
		}

		#loancla {
			border: 0px solid black;
			border-radius: 10px;
			background-color: purple;
			width: 450px;
			height: 30px;
		}

		#loanpre {
			border: 0px solid black;
			border-radius: 10px;
			background-color: purple;
			width: 450px;
			height: 30px;
		}

	</style>

</head>
<body>
<?php 
	session_start();
	include_once('headeruser.php');
	?>

<div class="container">
	<div class="row mt-3" id="tabs">
		<div class="col-md-3">

			<h5>Welcome back!</h5> 

			<div>
				<h3>
					<i class="fa-solid fa-id-badge"></i>
				<?php 
					if(isset($_SESSION['fname'], $_SESSION['lname'])){
						echo $_SESSION['fname']." ".$_SESSION['lname'];
						}
					?>
				</h3>
			</div>

			<div>
				<img src="images/contactimg.jfif" alt="avatar" style="width: 170px; height: 150px;" class="" />
			</div>
			<div>
				<b>
					<?php 
						// if(isset($_SESSION['fname'])){
						// 	echo $_SESSION['fname'];
						// 	}
						// 	echo "<br>";

						// if(isset($_SESSION['lname'])){
						// 	echo $_SESSION['lname'];
						// 	}
							
					?>
				</b>
			</div>
		</div>

		<div class="col-md-7">
			<h3 style="color: purple;"><b>Select Loan and Amount</b></h3>

			<form>
				<div class="mt-5">
						<div class="" id="loanbas">
						<input type="radio" name="loans" id="basic" class="form-check-input ms-3" />
						<label for="basic"><b>Basic Loan</b></label>
						</div>

						<div class="mt-3" id="loancla">
						<input type="radio" name="loans" id="classic" class="form-check-input ms-3" />
						<label for="classic"><b>Classic Loan</b></label>
						</div>

						<div class="mt-3" id="loanpre">
						<input type="radio" name="loans" id="premium" class="form-check-input ms-3" />
						<label for="premium"><b>Premium Loan</b></label>
						</div>
				</div>
			</form>
			
			<div>
				<div id="forbasic"></div> 
				<div id="forclassic"></div> 
				<div id="forpremium"></div>
			</div>


		</div>

	</div>


</div>


	<script type="text/javascript" src="jquery/jquery.min.js"></script>

	<script type="text/javascript" language="javascript">
		$(document).ready(function(){
			$("#basic").click(function(){
				$.ajax({
					url:"loanbasic.php",
					type:"POST",
					success:function(data){
						$('#forbasic').html(data);
					},
				})
			})
		});


		$(document).ready(function(){
			$("#classic").click(function(){
				$.ajax({
					url:"loanclassic.php",
					type:"POST",
					success:function(data){
						$('#forclassic').html(data);
					},
				})
			})
		});


		$(document).ready(function(){
			$("#premium").click(function(){
				$.ajax({
					url:"loanpremium.php",
					type:"POST",
					success:function(data){
						$('#forpremium').html(data);
					},
				})
			})
		});


	</script>

<?php 
	include_once("footer.php");
?>
</body>
</html>