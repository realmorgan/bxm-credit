<!DOCTYPE html>
<html>
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>BXM Credits - Registeration</title>

	<!-- Bootstrap Stylesheet -->
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">

	<!-- Fontawesome -->
	<link rel="stylesheet" type="text/css" href="fontawesome/css/all.css">

	<!-- Internal CSS -->
	<style type="text/css">

		label{
			color: purple;
		}

		h3{
			color: purple;
			font-family: sans-serif;
		}

		#lacc{
			text-decoration: none;
			color: blue;
		}

	</style>

</head>
<body>
	<?php 
		include_once("headersignup.php");


		// check if register button is clicked
		if (isset($_POST['btnReg'])) {
			# validate inputs
			if (empty($_POST['firstname'])) {
				$errors['firstname'] = "Firstname field is required";
			}

			if (empty($_POST['lastname'])) {
				$errors['lastname'] = "Lastname field is required";
			}

			if (empty($_POST['emailaddress'])) {
				$errors['emailaddress'] = "Email Address field is required";
			}

			if (empty($_POST['phonenumber'])) {
				$errors['phonenumber'] = "Phone Number field is required";
			}

			if (empty($_POST['username'])) {
				$errors['username'] = "Username field is required";
			}

			if (empty($_POST['password'])) {
				$errors['password'] = "Password field is required";
			}elseif(strlen($_POST['password']) <5){
				$errors['password'] = "Password must be more than 5 characters";
			}

			if (empty($_POST['bank'])) {
				$errors['bank'] = "Bank field is required";
			}

			if (empty($_POST['accnumber'])) {
				$errors['accnumber'] = "Account number is required";
			}

			if (empty($_POST['bvn'])) {
				$errors['bvn'] = "BVN field is required";
			}


			if (empty($errors)) {
				# code...
			
				// sanitize inputs
				include_once "shared/common.php";
				$cmobj = new Common;

				// make use of sanitizeinput method
				$fname = $cmobj->sanitizeInputs($_POST['firstname']);
				$lname = $cmobj->sanitizeInputs($_POST['lastname']);
				$email = $cmobj->sanitizeInputs($_POST['emailaddress']);
				$phone = $cmobj->sanitizeInputs($_POST['phonenumber']);
				$username = $cmobj->sanitizeInputs($_POST['username']);
				$pswd = $_POST['password'];
				$bank = $cmobj->sanitizeInputs($_POST['bank']);
				$acc = $cmobj->sanitizeInputs($_POST['accnumber']);
				$bvn = $cmobj->sanitizeInputs($_POST['bvn']);

				// create object of user class & pass parameter to signup method
				include_once "shared/user.php";
				$userobj = new User();

				// store what it return in output variable
				$output = $userobj->signUp($fname, $lname, $email, $phone, $username, $pswd, $bank, $acc, $bvn);

				if ($output == true) {
					// redirect to success page
					header("Location: signup_success.php");
				}else{
					$errors[] = "Oops! something happened. Please try again.";
				}
			}


		}
	?>

	<div class="container-fluid">
		<div class="row mt-5">
				<div class="col-md-5 mt-5">
					<img src="images/reggif.gif" alt="reggif" class="img-fluid" id="reggif">
				</div>
				<div class="col-md-6">
					<h3>Proceed To Register</h3>
					<p>Please fill correctly the form below</p>
						<?php  
							if (!empty($errors)) {
								echo "<ul class='alert alert-danger'>";
								foreach ($errors as $key => $value) {
									echo "<li>$value</li>";
								}
								echo "</ul>";
							
							}
						?>
				<form action="" method="post" >
					<label>First Name</label>
					<input type="text" name="firstname" id="firstname" class="form-control" style="border-left: 5px solid purple;" />

					<label>Last Name</label>
					<input type="text" name="lastname" id="lastname" class="form-control" style="border-left: 5px solid purple;"/>

					<label>Email Address</label>
					<input type="text" name="emailaddress" id="emailaddress" class="form-control" style="border-left: 5px solid purple;"/>

					<label>Phone Number</label>
					<input type="text" name="phonenumber" id="phonenumber" placeholder="+234" class="form-control" style="border-left: 5px solid purple;"/>

					<label>Username</label>
					<input type="text" name="username" id="username" class="form-control" style="border-left: 5px solid purple;"/>

					<label>Password</label>
					<input type="password" name="password" id="password" placeholder="**********" class="form-control" style="border-left: 5px solid purple;"/>

					<label>Bank</label>
					<select name="bank" id="bank" class="form-control" style="border-left: 5px solid purple;">
						<option value="">Select Bank</option>
						<option value="zenithbank">ZENITH BANK</option>
						<option value="accessbank">ACCESS BANK</option>
						<option value="firstbank">FIRST BANK</option>
						<option value="gtbank">GUARANTY TRUST BANK</option>
						<option value="unionbank">UNION BANK</option>
						<option value="kudamfb">KUDA MICROFINANCE BANK</option>
						<option value="ecobank">ECOBANK</option>
						<option value="fidelitybank">FIDELITY BANK</option>
						<option value="polarisbank">POLARIS BANK</option>
						<option value="uba">UNITED BANK FOR AFRICA</option>
						<option value="wemabank">WEMA BANK</option>
					</select>

					<label>Account Number</label>
					<input type="text" name="accnumber" id="accnumber" class="form-control" style="border-left: 5px solid purple;"/>

					<label>Bank Verification Number</label>
					<input type="text" name="bvn" id="bvn" class="form-control" style="border-left: 5px solid purple;"/>
					
					<button type="submit" name="btnReg" class="btn btn-warning mt-5" id="btnReg" style="width: 130px;"><b>Sign Up</b></button>

					<p class="mt-3">Already have an account? <a href="login.php" id="lacc">Login Here</a></p>

				</form>	
			</div>
		</div>
	</div>

<?php include_once('footer.php'); ?>

</body>
</html>