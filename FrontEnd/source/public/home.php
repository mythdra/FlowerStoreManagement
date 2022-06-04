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
		background-image: url(images/bg.jpg)
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
            <div class="border border-left-0 border-right-0">
                <div class="scrollable-task">
                    <div class="e__task__heading">
                        <div class="d-flex">
                            <div class='task-id__heading col-xl-4 col-lg-2 col-md-2 col-sm-3 col-3 border border-top-0 border-left-0'>
                                <p class="mb-0 p-1 e__check-font-style">Tên sản phẩm</p>
                            </div>
                            <div class='task-name__heading col-xl-1 col-sm-5 col-5 border border-top-0 border-left-0'>
                                <p class="mb-0 p-1 e__check-font-style">Số lượng</p>
                            </div>
                            <div class='task-description__heading col-xl-1 col-lg-6 col-md-6 border border-top-0 border-left-0'>
                                <p class="mb-0 p-1 e__check-font-style">Giá</p>
                            </div>
                            <div class='task-time__heading col-xl-4 border border-top-0 border-left-0'>
                                <p class="mb-0 p-1 e__check-font-style">Mô tả</p>
                            </div>		
                            <div class='col-xl-2 border border-top-0 border-left-0'>
                                <p class="mb-0 p-1 e__check-font-style">Tình trạng</p>
                            </div>						
                        </div>
                    </div>	
                    <div class="e__task__infomation">
                    <?php
                        
                        require_once("connect_db.php");
                        $sql = "SELECT * FROM flower";
                            $result = connect_db()->query($sql);

                            while ($row = $result->fetch_assoc()) {
                                $id = $row["id"];
                                $name = $row['name'];
                                $number = $row['number'];
                                $price = $row['price'];
                                $desc = $row['description'];
                                $status = $row['status'];

                                if ($number > 0) {
                                    echo	"
                                            <div class='d-flex task-list'>
                                                <div class='task-name__heading col-xl-4 col-sm-5 col-5 border border-top-0 border-left-0'>
                                                    <p class='task-name e__check-font-style mb-0 p-1'> <a class='text-dark' href='product_infomation.php?id=$id'> $name </a></p>
                                                </div>
                                                <div class='task-description__heading col-xl-1 col-lg-6 col-md-6 border border-top-0 border-left-0'>
                                                    <p class='task-description e__check-font-style mb-0 p-1'><a class='text-dark' href='product_infomation.php?id=$id'> $number </a></p>
                                                </div>
                                                <div class='task-time__heading col-xl-1 border border-top-0 border-left-0'>
                                                    <p class='badge badge-success mb-0 p-1 e__check-font-style'>$price</p>
                                                </div>
                                                <div class='task-rate__heading col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 border border-top-0 border-left-0'>
                                                    <p class='badge badge-primary mb-0 p-1 e__check-font-style'>$desc</p>
                                                </div>		
                                                <div class='col-xl-2 col-lg-4 col-md-4 col-sm-4 col-4 border border-top-0 border-left-0'>
                                                    <p class='badge badge-success mb-0 p-1 e__check-font-style'>$status</p>
                                                </div>									
                                            </div>
                                            ";

                                } else if ($number == 0) {
                                    echo	"
                                            <div class='d-flex task-list'>
                                                <div class='task-name__heading col-xl-4 col-sm-5 col-5 border border-top-0 border-left-0'>
                                                    <p class='task-name e__check-font-style mb-0 p-1'> <a class='text-dark' href='product_infomation.php?id=$id'> $name </a></p>
                                                </div>
                                                <div class='task-description__heading col-xl-1 col-lg-6 col-md-6 border border-top-0 border-left-0'>
                                                    <p class='task-description e__check-font-style mb-0 p-1'><a class='text-dark' href='product_infomation.php?id=$id'> $number </a></p>
                                                </div>
                                                <div class='task-time__heading col-xl-1 border border-top-0 border-left-0'>
                                                    <p class='badge badge-danger mb-0 p-1 e__check-font-style'>$price</p>
                                                </div>
                                                <div class='task-rate__heading col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 border border-top-0 border-left-0'>
                                                    <p class='badge badge-warning mb-0 p-1 e__check-font-style'>$desc</p>
                                                </div>		
                                                <div class='col-xl-2 col-lg-4 col-md-4 col-sm-4 col-4 border border-top-0 border-left-0'>
                                                    <p class='badge badge-danger mb-0 p-1 e__check-font-style'>$status</p>
                                                </div>									
                                            </div>
                                            ";

                                }

                            }

                    ?>		      
                        
                    </div>
                </div>
            </div>
        </div>

    </div>


    

    <script src="js/main.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


</body>
</html>