<?php
    session_start();
    $_SESSION['login'] = false;
    $_SESSION["type"] = -1;
    header("Location: login.php");
?>