<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/main.css">

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
            <div class="border border-left-0 border-right-0">
                <div class="scrollable-task">
                    <div class="e__task__heading">
                        <div class="d-flex">
                            <div class='task-id__heading col-xl-5 col-lg-2 col-md-2 col-sm-3 col-3 border border-top-0 border-left-0'>
                                <p class="mb-0 p-1 e__check-font-style">Mã giao dịch</p>
                            </div>
                            
                            <div class='task-description__heading col-xl-2 col-lg-6 col-md-6 border border-top-0 border-left-0'>
                                <p class="mb-0 p-1 e__check-font-style">Giá</p>
                            </div>
                            <div class='task-time__heading col-xl-5 border border-top-0 border-left-0'>
                                <p class="mb-0 p-1 e__check-font-style">Ngày mua</p>
                            </div>		
                            					
                        </div>
                    </div>	
                    <div class="e__task__infomation">
                    <?php
                        
                        require_once("../connect_db.php");
                        $sql = "SELECT * FROM bill";
                            $result = connect_db()->query($sql);

                            while ($row = $result->fetch_assoc()) {
                                $id = $row["id"];
                                $name = $row['flowerName'];
                                $number = $row['flowerNumber'];
                                $price = $row['flowerPrice'];
                                $date = $row['date'];

                                echo	"
                                        <div class='d-flex task-list'>
                                            <div class='productChange col-xl-5 col-sm-5 col-5 border border-top-0 border-left-0'>
                                                <p class='mb-0 p-1'> <a class='text-dark' href='product_history_cus.php?id=$id'> $id </a></p>
                                            </div>
                                            
                                            <div class='productChange col-xl-2 border border-top-0 border-left-0'>
                                                <p class='badge badge-success mb-0 p-1'>$price</p>
                                            </div>
                                            <div class='productChange col-xl-5 col-lg-5 col-md-4 col-sm-4 col-4 border border-top-0 border-left-0'>
                                                <p class='badge badge-primary mb-0 p-1'>$date</p>
                                            </div>		
                                                                                
                                        </div>
                                        ";

                                

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