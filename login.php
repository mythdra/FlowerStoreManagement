<?php
session_start();
require_once("connect_db.php");

if (isset($_SESSION["login"])) {
	if ($_SESSION['login']){
		if ($_SESSION['type'] == 0){
			header("Location: home.php");
		} else if ($_SESSION['type'] == 1) {
			header("Location: customer/home.php");
		}
	}
}
if (isset($_POST["password"]) && isset($_POST["username"])) {
	$pass = $_POST['password'];
	$user = $_POST['username'];
	$sql = "SELECT * FROM account where email='$user' AND password='$pass'";
	$result = connect_db()->query($sql);
	if ($result->num_rows > 0) {
		$_SESSION['login'] = true;
		$row = $result->fetch_assoc();

		$_SESSION['type'] = $row["type"];
		$_SESSION['username'] = $user;
		
		if ($_SESSION['type'] == 0){
			header("Location: home.php");
		} else if ($_SESSION['type'] == 1) {
			header("Location: customer/home.php");
		}
	  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/main.css">
</head>
<style>
	body {
		background-image: url(images/bg.jpg)
	}
</style>

<body class="img js-fullheight">

	<section class="d-flex justify-content-center align-items-center mt-5">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Login Form</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap p-0">
						<h3 class="mb-4 text-center">Have an account?</h3>
						<form action="" class="signin-form" method="post">
							<div class="form-group">
								<input type="text" id="username-field" name="username" class="form-control username" placeholder="Username">
							</div>
							<div class="form-group">
								<input id="password-field" type="password" name="password" class="form-control password" placeholder="Password">
								<span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
							</div>
							<div class="form-group">
								<button type="submit" id="btnSubmit" class="form-control btn btn-primary btn-submit px-3">Sign In</button>
							</div>
							<div class="form-group d-md-flex">
								<div class="w-50">
									<a href="register.php" style="color: #fff">Register</a>
								</div>
								<div class="w-50 text-md-right">
									<a href="#" style="color: #fff">Forgot Password</a>
								</div>
							</div>
						</form>
						<p class="w-100 text-center">&mdash; Or Sign In With &mdash;</p>
						<div class="social d-flex text-center justify-content-center">
							<a href="#" class="px-2 py-2 mr-md-1 rounded"><span class="ion-logo-facebook mr-2"></span> Facebook</a>
							<a href="#" class="px-2 py-2 ml-md-1 rounded"><span class="ion-logo-twitter mr-2"></span> Twitter</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>


	<script src="js/main.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>