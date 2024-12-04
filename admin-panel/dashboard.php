<?php 
    include '../components/connect.php';

    if (isset($_POST['submit'])) {
        $email = $_POST['email'];
        $email = filter_var($email, FILTER_SANITIZE_SPECIAL_CHARS);    

        $pass = sha1($_POST['pass']);
        $pass = filter_var($pass, FILTER_SANITIZE_SPECIAL_CHARS);   
        
        $select_seller = $conn->prepare("SELECT * FROM `sellers` WHERE email = ? AND password = ?");
        $select_seller->execute([$email, $pass]);
        $row = $select_seller->fetch(PDO::FETCH_ASSOC);

        if ($select_seller->rowCount() > 0) {
            setcookie('seller_id', $row['id'], time() + 60*60*24*30, '/');
            header('location:dashboard.php');
        } else {
            $info_msg[] = 'Incorrect username or password.';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ice Cream Shop - Seller Dashboard</title>
    <link rel="stylesheet" type="text/css" href="../css/admin_style.css" >
    <!-- Font Awesome CDN Link -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" >
</head>
<body>

    <?php
        include '../components/admin_header.php';
    ?>
   
    
    <!-- Sweet Alert CDN Link -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <!-- Custom JS Link -->
    <script src="../js/script.js"></script>
    <?php
        include '../components/alert.php';
    ?>
</body>
</html>
