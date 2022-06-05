<?php
    require_once("connect_db.php");

        if (isset($_POST['username']) && isset($_POST['password'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $sql = "INSERT INTO account(email, password, type) VALUES('$username', '$password', 1)";
            $conn = connect_db();
            // $stm = $conn->prepare($sql);
            // $stm -> bind_param("ss", $username, $password);
            // $stm -> execute();
			echo "Asdasd";
            $result = connect_db()->query($sql);

            // if ($stm->affected_rows == 1) {
                header("Location: /login.php");
            // }
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
					<h2 class="heading-section">Register Form</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap p-0">
						<form action="/register.php" class="signin-form" method="post">
							<div class="form-group">
								<input type="text" id="username-field" name="username" class="form-control username" placeholder="Username">
							</div>
							<div class="form-group">
								<input id="password-field" type="password" class="form-control password" placeholder="Password">
								<span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
							</div>
                            <div class="form-group">
								<input id="confirm_password-field" type="password" name="password" class="form-control confirm_password" placeholder="Confirm Password">
								<span toggle="#confirm_password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
							</div>
							<div class="form-group">
								<button type="submit" id="btnSubmit" class="form-control btn btn-primary btn-submit px-3">Register</button>
							</div>
                            <div class="form-group">
                                <a href="login.php"><button class="form-control btn btn-primary btn-submit px-3">Return login page</button></a>
							</div>
						</form>
    
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