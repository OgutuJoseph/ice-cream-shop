<?php 
    include 'components/connect.php';

    if (isset($_COOKIE['user_id'])) {
        $user_id = $_COOKIE['user_id'];
    } else {
        $user_id = '';
        header('location:login.php');
    }

    $select_orders = $conn->prepare("SELECT * FROM `orders` WHERE user_id = ?");
    $select_orders->execute([$user_id]);
    $ttoal_orders = $select_orders->rowCount();

    $select_messages = $conn->prepare("SELECT * FROM `message` WHERE user_id = ?");
    $select_messages->execute([$user_id]);
    $ttoal_messages = $select_messages->rowCount();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ice Cream Shop | User Profile</title>
    <link rel="stylesheet" type="text/css" href="css/user_style.css" >
    <!-- Font Awesome CDN Link -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" >
     <!-- Box Icon CDN Link -->
     <!-- <link href="https://cdn.jsdelivr.net/npm/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet"> -->
     <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" >
</head>
<body>
    <?php
        include 'components/user_header.php';
    ?>

    <section class="profile">
        <div class="heading">
            <h1>Profile Detail</h1>
            <img src="image/separator-img.png" >
        </div>
        <div class="details">
            <div class="user">
                <img src="uploaded_files/<?= $fetch_profile['image']; ?>" >
                <h3><?= $fetch_profile['name']; ?></h3>
                <p>User</p>
                <a href="update.php" class="btn">Update Profile</a>
            </div>
            <div class="box-container">
                <div class="box">
                    <div class="flex">
                        <i class="bx bxs-folder-minus"></i>
                        <h3><?= $ttoal_orders; ?></h3>
                    </div>
                    <a href="orders.php" class="btn">View Orders</a>
                </div>
                <div class="box">
                    <div class="flex">
                        <i class="bx bxs-chat"></i>
                        <h3><?= $ttoal_messages; ?></h3>
                    </div>
                    <a href="messages.php" class="btn">View Messages</a>
                </div>
            </div>
        </div>
    </section>
    
    <?php
        include 'components/user_footer.php';
    ?>

    <!-- Sweet Alert CDN Link -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <!-- Custom JS Link -->
    <script src="js/user_script.js"></script>
    <?php
        include 'components/alert.php';
    ?>
</body>
</html>
