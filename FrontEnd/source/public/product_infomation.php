<?php

    session_start();
    require_once("checkLogin.php");
checkLogin(array(0,1,2));
	require_once('connect_db.php');
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

        <?php
            require_once("connect_db.php");
            $sql = "SELECT * FROM flower WHERE id = '".$_GET['id']."'";
                $result = connect_db()->query($sql);

                while ($row = $result->fetch_assoc()) {
                    $id = $row["id"];
                    $name = $row['name'];
                    $number = $row['number'];
                    $price = $row['price'];
                    $desc = $row['description'];
                    $status = $row['status'];

                    
                    echo "
                    <form method='post' action='' enctype='multipart/form-data' validate>
                        <h2 class='text-center'>Thông tin sản phẩm</h2>
                        <div class='form-group'>
                            <label for='nameProduct'>Tên sản phẩm</label>
                            <input type='text' class='form-control' id='nameProduct' name='name' value='$name'>
                        </div>
                        <div class='d-flex justify-content-around'>

                            <div class='form-group'>
                                <label for='numberProduct'>Số lượng</label>
                                <input type='number' class='form-control' id='numberProduct' name='number' value=$number placeholder='Number'>
                            </div>
                            <div class='form-group'>
                                <label for='priceProduct'>Giá</label>
                                <input type='number' class='form-control' id='priceProduct' name='price' value=$price placeholder='Price'>
                            </div>
                            <div class='form-group'>
                                <label for='status' class='control-label'>Tình trạng</label>
                                <div class=''>
                                    <select class='form-control' id='status' value=$status name='status'>
                                        <option value='' disabled selected>Status</option>
                                        <option value='new'>new</option>
                                        <option value='old'>old</option>
                                    </select>          
                                
                                </div>
                            </div>       

                        </div>
                        <div class='form-group'>
                            <label for='descProduct'>Mô tả</label>
                            <textarea class='form-control' id='descProduct' name='desc' rows='3'>$desc</textarea>
                        </div>
                        <div class='errorMess'> $message </div>

                        <button type='submit' name='update' class='btn btn-success'>Update</button>
                        <button type='submit' name='delete' class='btn btn-danger'>Delete</button>
                    </form>       
                    ";
                }

        ?>

        
        </div>
    </div>

    <script src="js/main.js"></script>

</body>
</html>