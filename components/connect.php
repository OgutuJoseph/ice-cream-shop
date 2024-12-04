<?php
    $db_name        =   'mysql:host=localhost;dbname=icecream';
    $user_name      =   'root';
    $user_password  =   'Admin@123';

    $conn = new PDO($db_name, $user_name, $user_password);

    // if ($conn) {
    //     echo "Connected";
    // }

    if (!$conn) {
        echo "Not Connected";
    }

    function unique_id() {
        $chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charLength = strLen($chars);
        $randomString = '';
        for ($i=0; $i<20; $i++) {
            $randomString.=$chars[mt_rand(0, $charLength - 1)];
        }
        return $randomString;
    }
?>
