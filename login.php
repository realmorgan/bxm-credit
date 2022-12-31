<!DOCTYPE html>
<html>
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>BXM Credits - Login Page</title>

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

		.loginform{
			justify-content: center;
			justify-content: space-around;
		}

		#cacc{
			text-decoration: none;
			color: blue;
		}

	</style>

</head>
<body>
<?php 
	session_start();
	include_once('headerlogin.php'); ?>

	<div class="container">
		<div class="row mt-5 loginform">
			<div class="col-md-6">
					<h3>LOGIN</h3>	

					<?php  
					if ($_SERVER['REQUEST_METHOD'] == 'POST') {
					
						include_once ("shared/user.php");
						// create user object
						$obj =  new User();
						// make use of login method
						$loginuser = $obj->login($_POST['emailaddress'], $_POST['password']);

						if ($loginuser == true) {
							# redirect user to user dashboard/landing page
							header("Location: userdashboard.php");
							exit();
						}else{
							echo "<div class='alert alert-danger'>Invalid email address or password</div>";
						}



						include_once ("shared/admin.php");
						// create admin object
						$obj = new Admin();
						// make use of login method
						$loginadmin = $obj->adminLogin($_POST['emailaddress'], $_POST['password']);

						if ($loginadmin == true) {
							# redirect admin to admin dashboard/landing page
							header("Location: admindashboard.php");
							exit();
						}else{
							// echo "<div class='alert alert-danger'>Invalid email address or password</div>";
						}

					}


				?>

				<form action="" method="post" >
					<label>Email Address</label>
					<input type="text" name="emailaddress" id="emailaddress" class="form-control mt-2" style="border-left: 5px solid purple;"/>

					<label>Password</label>
					<input type="password" name="password" id="password" placeholder="**********" class="form-control" style="border-left: 5px solid purple;"/>

					<input type="checkbox" name="checkbox" value="remember_me" class="mt-2">
					<label>Remember me</label>

					<div>
					<button type="submit" name="btnLogin" class="btn btn-warning mt-3" id="btnLogin" style="width: 130px;"><b>Login</b></button>
					</div>

					<p class="mt-3">Don't have an account? <a href="signup.php" id="cacc">Create Account</a></p>

				</form>	
			</div>

			

			<div class="col-md-5">
				<img src="images/logingif.gif" alt="logingif" class="img-fluid" id="logingif" />
			</div>
		</div>
	</div>

<?php include_once('footer.php'); ?>

</body>
</html>