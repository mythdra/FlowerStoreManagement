<?php

    session_start();

	require_once('../connect_db.php');
	$message = '';
    
    if (isset($_POST['removeFromCart'])) {

        $id = $_GET['id'];
    
        $sql = "DELETE FROM `cart` WHERE id = ?";
        $conn = connect_db();
        $stm = $conn->prepare($sql);
        $stm -> bind_param("i", $id);
        $stm -> execute();

        header("Location: home.php");
    }


    if (isset($_POST['liquidate'])) {
        if (!isset($_POST['nameCustomer'])  || !isset($_POST['addressCustomer']) || !isset($_POST['numberCustomer'])){
            $message = 'vui lòng nhập đầy đủ thông tin!!';
            
          }else if (empty($_POST['nameCustomer']) || empty($_POST['addressCustomer']) || empty($_POST['numberCustomer'])){
            $message = 'Không được để trống thông tin';
          }
            else {
                $idCus = $_SESSION['username'];
                $name = $_POST['name'];
                $numberBuy = $_POST['numberBuy'];
                $price = $_POST['price'];

                $nameCustomer = $_POST['nameCustomer'];
                $addressCustomer = $_POST['addressCustomer'];
                $numberCustomer = $_POST['numberCustomer'];
                
                // echo $idCus;
                // echo $numberBuy;
                // echo $number;
                // echo $price;
                // echo $status;
                // echo $desc;


                $sql = "INSERT INTO `bill`(`idCustomer`, `nameFlower`, `numberFlower`, `priceFlower`, `nameCustomer`, `addressCustomer`, `numberCustomer`)   
                VALUES (?, ?, ?, ?, ?, ?, ?)";
                // $result = connect_db()->query($sql);
                $conn = connect_db();
                $stm = $conn->prepare($sql);
                $stm->bind_param('ssidsss', $idCus, $name, $numberBuy, $price, $nameCustomer, $addressCustomer, $numberCustomer);
                $stm->execute();
        
                $id = $_GET['id'];
            //     // DELETE FROM `cart` WHERE 0
                $sql1 = "DELETE FROM `cart` WHERE id =  ?";
                $conn1 = connect_db();
                $stm1 = $conn1->prepare($sql1);
                $stm1 -> bind_param('i', $id);
                $stm1 -> execute();


            //     // UPDATE `flower` SET `id`='[value-1]',`name`='[value-2]',`number`='[value-3]',`price`='[value-4]',`description`='[value-5]',`status`='[value-6]' WHERE 1
                $sql2 = "UPDATE flower SET number = number - ? WHERE id = ?";


                $idProduct = $_GET['idProduct'];

                $conn2 = connect_db();
                $stm2 = $conn2->prepare($sql2);
                $stm2 -> bind_param('ii', $numberBuy, $idProduct);
                $stm2->execute();

                if ($stm->affected_rows == 1 && $stm1->affected_rows == 1 && $stm2->affected_rows == 1) {
                    header('Location: historyView.php');
                } else {
                    $message = "Cập nhật thất bại";
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
            $sql = "SELECT * FROM cart WHERE idProduct = '".$_GET['idProduct']."' and id = '".$_GET['id']."' ";
                $result = connect_db()->query($sql);

                while ($row = $result->fetch_assoc()) {
                    $id = $row["id"];
                    $name = $row['name'];
                    $number = $row['number'];
                    $price = $row['price'];
                    $desc = $row['description'];

                    echo "
                    <form method='post' action='' enctype='multipart/form-data' validate>
                        <h2 class='text-center mb-0'>Product Infomation</h2>
                        <div class='form-group'>
                            <label for='nameProduct'>Tên sản phẩm</label>
                            <input type='text' class='form-control' id='nameProduct' name='name' value='$name' readonly>
                        </div>
                        <div class='d-flex justify-content-around'>
                            <div class='form-group'>
                                <label for='numberBuyProduct'>Số lượng mua</label>
                                <input type='number' class='form-control' id='numberBuyProduct' value=$number name='numberBuy' readonly>
                            </div>
                            <div class='form-group'>
                                <label for='priceProduct'>Giá</label>
                                <input type='number' class='form-control' id='priceProduct' name='price' value=$price readonly>
                            </div>
                        </div>
                        <div class='form-group'>
                            <label for='descProduct'>Mô tả</label>
                            <textarea class='form-control' id='descProduct' name='desc' rows='2' readonly>$desc</textarea>
                        </div>
                        <div class='form-group'>
                            <label for='nameCustomer'>Tên người nhậnr</label>
                            <input type='text' class='form-control' id='nameCustomer' name='nameCustomer' placeholder='Enter your name' required>
                        </div>
                        <div class='form-group'>
                            <label for='addressCustomer'>Địa chỉ</label>
                            <input type='text' class='form-control' id='addressCustomer' name='addressCustomer' placeholder='Enter your address' required>
                        </div>
                        <div class='form-group'>
                            <label for='numberCustomer'>Số điện thoại</label>
                            <input type='text' class='form-control' id='numberCustomer' name='numberCustomer' placeholder='0123-456-789' pattern='[0-9]{4}-[0-9]{3}-[0-9]{3}' required>
                        </div>
                        <div class='errorMess'> $message </div>

                        <button type='submit' name='removeFromCart' class='btn btn-primary'>Remove from cart</button>
                        <button type='submit' name='liquidate' class='btn btn-primary'>Liquidate ( Thanh toán )</button>
                    </form>       
                    ";
                }

        ?>

        
        </div>
    </div>

    <script src="js/main.js"></script>

</body>
</html>