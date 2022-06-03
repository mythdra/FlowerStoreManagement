<?php
    require_once("connect_db.php");

    $name = $_POST['name'];
    $number = $_POST['number'];
    $price = $_POST['price'];


    $sql = "INSERT INTO flower(name, number, price) VALUES ($name, $number, $price)";
    $result = connect_db()->query($sql);
    
    
        // $stm = connect_db()->prepare($sql);
        // $stm->bind_param('sid', $name, $number, $price);
        // $stm->execute();

        echo $name;
        echo $number;
        echo $price;
    

    header('Location: home.php');
  
    
    

?>