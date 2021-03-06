<?php

    session_start();

	require_once('../connect_db.php');

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
            $sql = "SELECT * FROM bill WHERE id = '".$_GET['id']."'";
                $result = connect_db()->query($sql);

                while ($row = $result->fetch_assoc()) {
                    $id = $row["id"];
                    $name = $row['nameFlower'];
                    $number = $row['numberFlower'];
                    $price = $row['priceFlower'];
                    $nameCustomer = $row['nameCustomer'];
                    $addressCustomer = $row['addressCustomer'];
                    $numberCustomer = $row['numberCustomer'];
                    
                    echo "
                    <form method='post' action='' enctype='multipart/form-data' validate>
                        <h2 class='text-center'>Thông tin đơn hàng</h2>
                        <div class='form-group'>
                            <label for='nameProduct'>Tên đơn hàng</label>
                            <input type='text' class='form-control' id='nameProduct' name='name' value='$name' readonly>
                        </div>
                        <div class='d-flex justify-content-around'>

                            <div class='form-group'>
                                <label for='numberProduct'>Số lượng mua</label>
                                <input type='number' class='form-control' id='numberProduct' name='number' value=$number placeholder='Number' readonly>
                            </div>
                            
                            <div class='form-group'>
                                <label for='priceProduct'>Giá</label>
                                <input type='number' class='form-control' id='priceProduct' name='price' value=$price placeholder='Price' readonly>
                            </div>
                        </div>
                        <div class='form-group'>
                            <label for='nameCustomer'>Tên người nhận</label>
                            <input type='text' class='form-control' id='nameCustomer' name='nameCustomer' value='$nameCustomer' readonly>
                        </div>
                        <div class='form-group'>
                            <label for='addressCustomer'>Địa chỉ</label>
                            <input type='text' class='form-control' id='addressCustomer' name='addressCustomer' value='$addressCustomer' readonly>
                        </div>
                        <div class='form-group'>
                            <label for='numberCustomer'>Số điện thoại</label>
                            <input type='text' class='form-control' id='numberCustomer' name='numberCustomer' value='$numberCustomer' readonly>
                        </div>
        
                    </form>       
                    ";
                

                }

        ?>

        
        </div>
    </div>

    <script src="js/main.js"></script>

</body>
</html>