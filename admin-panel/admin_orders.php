<?php 
    include '../components/connect.php';

    if (isset($_COOKIE['seller_id'])) {
        $seller_id = $_COOKIE['seller_id'];
    } else {
        $seller_id = '';
        header('location:login.php');
    }

    if (isset($_POST['delete_msg'])) {        
        $delete_id = $_POST['delete_id'];
        $delete_id = filter_var($delete_id, FILTER_SANITIZE_SPECIAL_CHARS);

        $verify_delete = $conn->prepare("SELECT * FROM `message` WHERE id = ?");
        $verify_delete->execute([$delete_id]);

        if ($verify_delete->rowCount() > 0) {
            echo "Id: " . $delete_id;
            $delete_message = $conn->prepare("DELETE FROM `message` WHERE id = ?");
            $delete_message->execute([$delete_id]);
            $success_msg[] = "Message Deleted Successfully.";
        } else {
            $warning_msg[] = "Message Already Deleted.";
        }
    } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Orders</title>
    <link rel="stylesheet" type="text/css" href="../css/admin_style.css" >
    <!-- Font Awesome CDN Link -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" >
     <!-- Box Icon CDN Link -->
     <!-- <link href="https://cdn.jsdelivr.net/npm/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet"> -->
     <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" >

</head>
<body>

    <div class="main-container">
        <?php
            include '../components/admin_header.php';
        ?>
        <section class="order-container">
            <div class="heading">
                <h1>Orders</h1>
                <img src="../image/separator-img.png" >
            </div>
            <div class="box-container">
                <?php
                    $select_orders = $conn->prepare("SELECT * FROM `orders` WHERE seller_id = ?");
                    $select_orders->execute([$seller_id]);

                    if ($select_orders->rowCount() > 0) {
                        while ($fetch_order = $select_orders->fetch(PDO::FETCH_ASSOC)) {

                ?>  
                <div class="box">
                    <div class="status" style="color: <?php  ?>"></div>
                </div>
                <?php
                        }
                    }
                ?>
            </div>
        </section>
    </div>    
   
    
    <!-- Sweet Alert CDN Link -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <!-- Custom JS Link -->
    <script src="../js/admin_script.js"></script>
    <?php
        include '../components/alert.php';
    ?>
</body>
</html>
