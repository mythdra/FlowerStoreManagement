<?php

    session_start();

	require_once('../connect_db.php');
	$message = '';

    $idCus = $_SESSION['username'];

    if (isset($_POST['addToCart'])) {

        $id = $_GET['id'];
        $name = $_POST['name'];
        $number = $_POST['number'];
        $numberBuy = $_POST['numberBuy'];
        $price = $_POST['price'];
        $desc = $_POST['desc'];
        
        if ($numberBuy > $number) {
            $message = "The amount you want to buy is bigger than the amount we have";
            header("product_infomation_cus.php?id=$id");
        }

        // INSERT INTO `cart`(`id`, `name`, `price`, `number`, `description`, `idProduct`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]','[value-6]')
        $sql = "INSERT INTO cart(idProduct, name, number, price, description, idCustomer) VALUES (?, ?, ?, ?, ?, ?) ";
        // $result = connect_db()->query($sql);
        $conn = connect_db();
        $stm = $conn->prepare($sql);
        $stm->bind_param('isidss', $id, $name, $numberBuy, $price, $desc, $idCus);
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
    
    if (isset($_POST['removeFromLike'])) {

        $id = $_GET['id'];
    
        $sql = "DELETE FROM `likeProduct` WHERE id = ?";
        $conn = connect_db();
        $stm = $conn->prepare($sql);
        $stm -> bind_param("i", $id);
        $stm -> execute();

        if ($stm->affected_rows == 1) {
            header("Location: home.php");
        } else {
            $message = "Xóa thất bại";
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
		background-image: url(../images/bg.jpg);
        background-size: cover;
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
                    $price = $row['price'];
                    $desc = $row['description'];

                    echo "
                    <form method='post' action='' enctype='multipart/form-data' validate>
                        <h2 class='text-center'>Thông tin sản phẩm</h2>
                        <div class='form-group'>
                            <label for='nameProduct'>Tên sản phẩm</label>
                            <input type='text' class='form-control' id='nameProduct' name='name' value='$name' readonly>
                        </div>
                        <div class='form-group'>
                            <label for='priceProduct'>Giá</label>
                            <input type='number' class='form-control' id='priceProduct' name='price' value=$price readonly>
                        </div>
                        <div class='form-group'>
                            <label for='descProduct'>Mô tả</label>
                            <textarea class='form-control' id='descProduct' name='desc' rows='3' readonly>$desc</textarea>
                        </div>
                        <div class='errorMess'> $message </div>

                        <button type='submit' name='addToCart' class='btn btn-primary'>Thêm vào giỏ hàng</button>
                        <button type='submit' name='removeFromLike' class='btn btn-primary'>Bỏ yêu thích</button>
                    </form>       
                    ";
                }

        ?>

        
        </div>
    </div>

    <script src="js/main.js"></script>

</body>
</html>