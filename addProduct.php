<?php
    require_once("connect_db.php");
    // require_once("checkLogin.php");
    // checkLogin(array(0));
    $message = "";
    if (isset($_POST['submit'])) {
        if (!isset($_POST['name'])  || !isset($_POST['number']) || !isset($_POST['price']) || !isset($_POST['desc']) || !isset($_POST['status'])){
            $message = 'vui lòng nhập đầy đủ thông tin!!';
            
          }else if (empty($_POST['name']) || empty($_POST['number']) || empty($_POST['price']) || empty($_POST['desc']) ){
            $message = 'Không được để trống thông tin';
          }
            else {
                $name = $_POST['name'];
                $number = $_POST['number'];
                $price = $_POST['price'];
                $desc = $_POST['desc'];
                $status = $_POST['status'];
            
                
                // echo $name;
                // echo $number;
                // echo $price;
                // echo $status;
                // echo $desc;

                $sql = "INSERT INTO flower(name, number, price, description, status) VALUES (?, ?, ?, ?, ?)";
                // $result = connect_db()->query($sql);
                $conn = connect_db();
                $stm = $conn->prepare($sql);
                $stm->bind_param('sidss', $name, $number, $price, $desc, $status);
                $stm->execute();
        
                if ($stm->affected_rows == 1) {
                    header('Location: home.php');
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
            <form method="post" action="" enctype="multipart/form-data" validate>
                <h2 class="text-center">Bảng nhập thông tin</h2>
                <div class="form-group">
                    <label for="nameProduct">Tên sản phẩm</label>
                    <input type="text" class="form-control" id="nameProduct" name="name" placeholder="Enter name" required>
                </div>
                <div class="d-flex justify-content-around">

                    <div class="form-group">
                        <label for="numberProduct">Số lượng</label>
                        <input type="number" class="form-control" id="numberProduct" name="number" placeholder="Number" required>
                    </div>
                    <div class="form-group">
                        <label for="priceProduct">Giá</label>
                        <input type="number" class="form-control" id="priceProduct" name="price" placeholder="Price" required>
                    </div>
                    <div class="form-group">
                        <label for="status" class="control-label">Tình trạng</label>
                        <div class="">
                            <select class="form-control" id="status" name="status">
                                <option value="" disabled selected>Status</option>
                                <option value="new">new</option>
                                <option value="old">old</option>
                            </select>          
                        </div>
                    </div>       

                </div>

                <div class="form-group">
                    <label for="descProduct">Mô tả</label>
                    <textarea class="form-control" id="descProduct" name="desc" rows="3" placeholder="Description"></textarea>
                </div>
                <div class="errorMess"><?= $message ?></div>

                <button type="submit" name="submit" class="btn btn-success">Thêm</button>

            </form>

        </div>

    </div>

    <script src="js/main.js"></script>

</body>
</html>