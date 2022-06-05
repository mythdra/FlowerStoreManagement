<?php

    session_start();

	require_once('../connect_db.php');
	$message = '';

    if (isset($_POST['update'])) {

        $id = $_GET['id'];
        $name = $_POST['name'];
        $number = $_POST['number'];
        $price = $_POST['price'];
        $desc = $_POST['desc'];
        $status = $_POST['status'];

        $sql = "UPDATE flower SET name = ?, number = ?, price = ?, description = ?, status = ? WHERE id = ?";
        $conn = connect_db();
        $stm = $conn->prepare($sql);
        $stm -> bind_param("sidssi", $name, $number, $price, $desc, $status, $id);
        $stm -> execute();
        if ($stm -> affected_rows == 1) {
            $message = 'Cập nhật trạng thái thành công';
            // header('Location: home.php');
        } else {
            $message = 'Cập nhật trạng thái thất bại';
        }
        
    }


    if (isset($_POST['delete'])) {
        $id = $_GET['id'];

        $sql1 = "DELETE FROM `flower` WHERE id = ?";
        $conn1 = connect_db();
        $stm1 = $conn1->prepare($sql1);
        $stm1 -> bind_param("i", $id);
        $stm1 -> execute();

        header("Location: home.php");
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
            $sql = "SELECT * FROM bill WHERE id = '".$_GET['id']."'";
                $result = connect_db()->query($sql);

                while ($row = $result->fetch_assoc()) {
                    $id = $row["id"];
                    $flowerName = $row['flowerName'];
                    $flowerNumber = $row['flowerNumber'];
                    $flowerPrice = $row['flowerPrice'];
                    $nameCustomer = $row['nameCustomer'];
                    $addressCustomer = $row['addressCustomer'];
                    $numberCustomer = $row['numberCustomer'];

                    echo "
                    <form method='post' action='' enctype='multipart/form-data' validate>
                        <h2 class='text-center'>Cart Input Product Infomation</h2>
                        <div class='form-group'>
                            <label for='nameProduct'>Name</label>
                            <input type='text' class='form-control' id='nameProduct' name='name' value='$flowerName' readonly>
                        </div>
                        <div class='d-flex justify-content-around'>

                            <div class='form-group'>
                                <label for='numberBuyProduct'>Number to buy</label>
                                <input type='number' class='form-control' id='numberBuyProduct' value=$flowerNumber name='numberBuy' readonly>
                            </div>
                            <div class='form-group'>
                                <label for='priceProduct'>Price</label>
                                <input type='number' class='form-control' id='priceProduct' name='price' value=$flowerPrice placeholder='Price' readonly>
                            </div>

                        </div>
                        <div class='form-group'>
                            <label for='nameCustomer'>Name customer</label>
                            <input type='text' class='form-control' id='nameCustomer' name='nameCustomer' value='$nameCustomer' placeholder='Name' required>
                        </div>
                        <div class='form-group'>
                            <label for='addressCustomer'>Address</label>
                            <input type='text' class='form-control' id='addressCustomer' name='addressCustomer' value='$addressCustomer' placeholder='Address' required>
                        </div>
                        <div class='form-group'>
                            <label for='numberCustomer'>Number</label>
                            <input type='tel' class='form-control' id='numberCustomer' name='numberCustomer' value='$numberCustomer' placeholder='0123-456-789' pattern='[0-9]{4}-[0-9]{3}-[0-9]{3}' required>
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