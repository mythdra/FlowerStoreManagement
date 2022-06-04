<?php

    session_start();

	require_once('../connect_db.php');
	$message = '';

    if (isset($_POST['addToCart'])) {

        $id = $_GET['id'];
        $name = $_POST['name'];
        $number = $_POST['number'];
        $price = $_POST['price'];
        $desc = $_POST['desc'];
    
        $sql = "INSERT INTO cart(idProduct, name, number, price, description) VALUES (?, ?, ?, ?, ?) ";
        // $result = connect_db()->query($sql);
        $conn = connect_db();
        $stm = $conn->prepare($sql);
        $stm->bind_param('isids', $id, $name, $number, $price, $desc);
        $stm->execute();
    
        // echo $name;
        // echo $number;
        // echo $price;
        if ($stm->affected_rows == 1) {
            $message = "Thêm thành công";
            // header("Location: product_infomation_cus.php?id=$id'.php");
        } else {
            $message = "Thêm thất bại";
        }
    
    }

    
    $message = '';

    if (isset($_POST['removeFromLike'])) {

        $id = $_GET['id'];
    
        $sql = "DELETE FROM `likeProduct` WHERE id = ?";
        $conn = connect_db();
        $stm = $conn->prepare($sql);
        $stm -> bind_param("i", $id);
        $stm -> execute();

        header("Location : home.php");
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
		background-image: url(../images/bg.jpg)
	}

</style>
<body>
    
    <?php
        require_once("navbar_cus.php");
        ?>


    <div class="row">
        <?php
            require_once('sidebar_cus.php');
        ?>

        <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10 col-11 rounded border border-left-0 border-right-0 border-bottom-0">

        <?php
            require_once("../connect_db.php");
            $sql = "SELECT * FROM likeProduct WHERE id = '".$_GET['id']."'";
                $result = connect_db()->query($sql);

                while ($row = $result->fetch_assoc()) {
                    $id = $row["id"];
                    $name = $row['name'];
                    $number = $row['number'];
                    $price = $row['price'];
                    $desc = $row['description'];

                    echo "
                    <form method='post' action='' enctype='multipart/form-data' validate>
                        <h2 class='text-center'>Product Infomation</h2>
                        <div class='form-group'>
                            <label for='nameProduct'>Name</label>
                            <input type='text' class='form-control' id='nameProduct' name='name' value='$name'>
                        </div>
                        <div class='form-group'>
                            <label for='numberProduct'>Number</label>
                            <input type='number' class='form-control' id='numberProduct' name='number' value= $number>
                        </div>
                        <div class='form-group'>
                            <label for='priceProduct'>Price</label>
                            <input type='number' class='form-control' id='priceProduct' name='price' value=$price>
                        </div>
                        <div class='form-group'>
                            <label for='descProduct'>Description</label>
                            <textarea class='form-control' id='descProduct' name='desc' rows='3'>$desc</textarea>
                        </div>
                        <div class='errorMess'> $message </div>

                        <button type='submit' name='addToCart' class='btn btn-primary'>Add to cart</button>
                        <button type='submit' name='removeFromLike' class='btn btn-primary'>DisLike</button>
                    </form>       
                    ";
                }

        ?>

        
        </div>
    </div>

    <script src="js/main.js"></script>

</body>
</html>