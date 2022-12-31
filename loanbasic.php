<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>BXM Credits - Basic Loan</title>

	<!-- Bootstrap Stylesheet -->
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">

	<!-- Fontawesome -->
	<link rel="stylesheet" type="text/css" href="fontawesome/css/all.css">

	<!-- Internal CSS -->
	<style type="text/css">

		h6 {
			color: black;
		}

	</style>

</head>
<body>

	<div class="row mt-3">
		<form action="" method="post" >

			<h6><b>Basic Loan Amount:</b></h6>
			<select name="loanamount" id="loanamount" class="form-control" style="border: 2px solid purple; width: 30%;">
				<option value="">Select Amount</option>
				<option value="5000">5000</option>
				<option value="10000">10000</option>
				<option value="15000">15000</option>
				<option value="20000">20000</option>
			</select>

			<h6><b>Loan Duration</b></h6>
			<select name="days" id="days" class="form-control" style="border: 2px solid purple; width: 30%;">
				<option value="">Select Days</option>
				<option value="15days">15 Days</option>
				<option value="21days">21 Days</option>
				<option value="30days">30 Days</option>
			</select>
			<br>

			<div>
			<b>Interest Rate: 5%</b>

			<button type="submit" name="btnProceed" class="btn btn-warning mt-2" id="btnProceed" style="width: 100px;">Proceed</button>
			</div>

			<h5 class="mt-3">LOAN SUMMARY:-</h5>

		</form>
	</div>

</body>
</html>