<!DOCTYPE html>
<html>
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	
	<!-- Bootstrap Stylesheet -->
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">

	<!-- Fontawesome -->
	<link rel="stylesheet" type="text/css" href="fontawesome/css/all.css">

	<!-- Internal CSS -->
	<style type="text/css">
		
/*Header Navbar styling*/
		body{
			background-color: #FFFFFA;
			height: 0px;
		}

		a{
			text-decoration: none;
			color: white;
		}

		#btnsignup{
			color: white;
			width: 120px;
		}

		.wrapper1{
			border: 0px solid white;
			height: 80px;
		}

		.navbg{
			border-bottom: 0px solid white;
			background-color: purple;
			height: inherit;
		}

		.dropdown-menu{
			background-color: orange;
			color: black;
		}

	</style>
</head>
<body>
	<!-- Header Navbar-->
	<div class="container-fluid">
		<div class="wrapper1">
					<nav class="navbar navbar-expand-lg navbar-dark navbg fixed-top">
			  <div class="container-fluid">
			    <a class="navbar-brand" href="index.php"><b><i>BXM</i></b><br> <b><i>CREDITS</i></b></a>
			    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			      <span class="navbar-toggler-icon"></span>
			    </button>
			    <div class="collapse navbar-collapse" id="navbarSupportedContent">
			      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
			        <li class="nav-item">
			          <a class="nav-link active" aria-current="page" href="index.php"><b>Home</b></a>
			        </li>
			        <li class="nav-item">
			          <a class="nav-link active" aria-current="page" href="loancategory.php"><b>Loans</b></a>
			        </li>
			      </ul>
			      <form class="d-flex">
			        <input class="nav-link active form-control me-2" type="search" placeholder="Search" aria-label="Search">
					<a href="signup.php" class="btn btn-warning form-control ms-2" type="button" id="btnsignup"><b>Sign Up</b></a>
			      </form>
			    </div>
			  </div>
			</nav>
		</div>
	</div>

</body>
</html>