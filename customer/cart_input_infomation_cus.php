<?php

    session_start();

	require_once('../connect_db.php');
	$message = '';

    if (isset($_POST['addToBill'])) {
        if (!isset($_POST['nameCustomer'])  || !isset($_POST['addressCustomer']) || !isset($_POST['numberCustomer'])){
            $message = 'vui lòng nhập đầy đủ thông tin!!';
            
          }else if (empty($_POST['nameCustomer']) || empty($_POST['addressCustomer']) || empty($_POST['numberCustomer'])){
            $message = 'Không được để trống thông tin';
          }
            else {
                $id = $_GET['id'];
                $nameCustomer = $_POST['nameCustomer'];
                $addressCustomer = $_POST['addressCustomer'];
                $numberCustomer = $_POST['numberCustomer'];     
                
                // echo $name;
                // echo $number;
                // echo $price;
                // echo $status;
                // echo $desc;

                $sql = "UPDATE bill SET nameCustomer = ?, addressCustomer = ?, numberCustomer = ? WHERE id = ?";
                // $result = connect_db()->query($sql);
                $conn = connect_db();
                $stm = $conn->prepare($sql);
                $stm->bind_param('sssi', $nameCustomer, $addressCustomer, $numberCustomer, $id);
                $stm->execute();
        
                if ($stm->affected_rows == 1) {
                    header('Location: productHistory.php');
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
            <form method='post' action='' enctype='multipart/form-data' validate>
                <h2 class='text-center'>Cart Input Product Infomation</h2>
                <div class='form-group'>
                    <label for='nameCustomer'>Name customer</label>
                    <input type='text' class='form-control' id='nameCustomer' name='nameCustomer' placeholder='Name' required>
                </div>
                <div class='form-group'>
                    <label for='addressCustomer'>Address</label>
                    <input type='text' class='form-control' id='addressCustomer' name='addressCustomer' placeholder='Address' required>
                </div>
                <div class='form-group'>
                    <label for='numberCustomer'>Number</label>
                    <input type='tel' class='form-control' id='numberCustomer' name='numberCustomer' placeholder="0123-456-789" pattern="[0-9]{4}-[0-9]{3}-[0-9]{3}" required>
                </div>
                
                <div class='errorMess'><?= $message ?></div>

                <button type='submit' name='addToBill' class='btn btn-primary'>Confirm</button>
            </form>       

        
        </div>
    </div>

    <script src="js/main.js"></script>

</body>
</html>