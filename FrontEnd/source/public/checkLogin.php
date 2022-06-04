<?php
    session_start();
    function checkLogin($type)
    {
        // if (!isset($_SESSION["login"])){
        //     $_SESSION["login"] = false;
        // }
        if (!$_SESSION["login"]) {
            header("Location: login.php");
        } 
        if (!in_array($_SESSION['type'], $type)){
            unset($_SESSION['login']);
            header("Location: login.php");
        } 
    }
?>