<?php
    // session_start(); 

    // Tạo kết nối đến database
    function connect_db() {
        $host = 'localhost';
        $user = 'root';
        $pass = '';
        $db = 'flower_management_store';

        $conn = new mysqli($host, $user, $pass, $db);
        $conn->set_charset("utf8");
        if ($conn -> connect_error) {
            die("Không thể kết nối đến database: " . $conn -> connect_error);
        }
        
        return $conn;
    }
?>