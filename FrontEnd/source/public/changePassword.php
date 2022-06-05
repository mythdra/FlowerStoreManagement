<?php

    session_start();
    require_once("connect_db.php");
    $message = '';

    if (isset($_POST['oldpass'])) {
        $oldpass = $_POST['oldpass'];
        $newpass = $_POST['newpass'];
        $confpass = $_POST['confpass'];
        $username = $_SESSION['username'];
        if ($newpass != $confpass){
            $message = "Fail to update pass, not match new pass";
        } else {
            $sql = "UPDATE account SET password= ? WHERE email= ? AND password= ?";
            $conn = connect_db();
            $stm = $conn->prepare($sql);
            $stm -> bind_param('sss', $confpass, $username, $oldpass);
            $stm -> execute();
            if ($stm-> affected_rows == 1) {
                header("Location: login.php");
            } else {
                $message = "Đổi mật khẩu thất bại";
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
		background-image: url(images/bg.jpg);
        background-size: cover;
	}

</style>
<body>
    
    <?php
        require_once("navbar.php");
    ?>


    <div class="row">
        <?php
            require_once('sidebar.php');
        ?>

        <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10 col-11 rounded border border-left-0 border-right-0 border-bottom-0">
            <form method="post" action="">
                <h2 class="text-center">Form change password</h2>
                <div class="form-group">
                    <label for="oldPass">Old Password</label>
                    <input type="password" class="form-control" id="oldPass" name="oldpass" placeholder="Enter old password">
                </div>
                <div class="form-group">
                    <label for="newPass">New password</label>
                    <input type="password" class="form-control" id="newPass" name="newpass" placeholder="Enter new password">
                </div>
                <div class="form-group">
                    <label for="confirmPass">Confirm password</label>
                    <input type="password" class="form-control" id="confirmPass" name="confpass" placeholder="Confirm password">
                </div>
                <div class='text-danger'><?= $message ?></div>
                
                <button type="submit" class="btn btn-primary">Submit</button>

            </form>
        </div>

    </div>

    <script src="js/main.js"></script>

</body>
</html>