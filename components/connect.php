<?php
    $db_name        =   'mysql:host=localhost;dbname=icecream';
    $user_name      =   'root';
    $user_password  =   'Admin@123';

    $conn = new PDO($db_name, $user_name, $user_password);

    if ($conn) {
        echo "Connected";
    }
?>
