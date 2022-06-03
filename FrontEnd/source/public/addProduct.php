

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
<body>
    
    <?php
        require_once("navbar.php");
    ?>


    <div class="row">
        <?php
            require_once('sidebar.php');
        ?>

        <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10 col-11 rounded border border-left-0 border-right-0 border-bottom-0">
            <form method="post" action="insertProduct.php">
                <h2 class="text-center">Form add product</h2>
                <div class="form-group">
                    <label for="nameProduct">Name</label>
                    <input type="text" class="form-control" id="nameProduct" name="name" placeholder="Enter name">
                </div>
                <div class="form-group">
                    <label for="numberProduct">Number</label>
                    <input type="number" class="form-control" id="numberProduct" name="number" placeholder="Number">
                </div>
                <div class="form-group">
                    <label for="priceProduct">Price</label>
                    <input type="number" class="form-control" id="priceProduct" name="price" placeholder="Price">
                </div>
                
                <button type="submit" class="btn btn-primary">Submit</button>

            </form>
        </div>

    </div>

    <script src="js/main.js"></script>

</body>
</html>