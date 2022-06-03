<?php



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
<body>
    
    <?php
        require_once("navbar.php");
    ?>


    <div class="row">
        <?php
            require_once('sidebar.php');
        ?>

        <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10 col-11 rounded border border-left-0 border-right-0 border-bottom-0">
            <form method="post" action="insert.php">
                <h2 class="text-center">Form change password</h2>
                <div class="form-group">
                    <label for="oldPass">Old Password</label>
                    <input type="password" class="form-control" id="oldPass" name="name" placeholder="Enter old password">
                </div>
                <div class="form-group">
                    <label for="newPass">New password</label>
                    <input type="password" class="form-control" id="newPass" name="number" placeholder="Enter new password">
                </div>
                <div class="form-group">
                    <label for="confirmPass">Confirm password</label>
                    <input type="password" class="form-control" id="confirmPass" name="price" placeholder="Confirm password">
                </div>
                
                <button type="submit" class="btn btn-primary">Submit</button>

            </form>
        </div>

    </div>

    <script src="js/main.js"></script>

</body>
</html>