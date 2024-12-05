<?php 
    include '../components/connect.php';

    if (isset($_COOKIE['seller_id'])) {
        $seller_id = $_COOKIE['seller_id'];
    } else {
        $seller_id = '';
        header('location:login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ice Cream Shop - Dashboard</title>
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
        <section class="dashboard">
            <div class="heading">
                <h1>Dashboard</h1>
                <img src="../image/separator-img.png" >
            </div>
            <div class="box-container">
                <div class="box">
                    <h3>Welcome !</h3>
                    <p><?= $fetch_profile['name'] ?></p>
                    <a href="update.php" class="btn">Update Profile</a>
                </div>
                <div class="box">
                    <?php
                        $select_messages = $conn->prepare("SELECT * FROM `message`");
                        $select_messages->execute();
                        $number_of_messages = $select_messages->rowCount();
                    ?>
                    <h3><?= $number_of_messages ?></h3>
                    <p>Unread mesages</p>
                    <a href="admin_message.php" class="btn">Messages</a>
                </div>
                <div class="box">
                    <?php
                        $select_products = $conn->prepare("SELECT * FROM `products` WHERE seller_id = ?");
                        $select_products->execute([$seller_id]);
                        $number_of_products = $select_products->rowCount();
                    ?>
                    <h3><?= $number_of_products ?></h3>
                    <p>Products Added</p>
                    <a href="add_product.php" class="btn">Add Product</a>
                </div>
                <div class="box">
                    <?php
                        $select_active_products = $conn->prepare("SELECT * FROM `products` WHERE seller_id = ? AND status = ?");
                        $select_active_products->execute([$seller_id, 'active']);
                        $number_of_active_products = $select_active_products->rowCount();
                    ?>
                    <h3><?= $number_of_active_products ?></h3>
                    <p>Active Products</p>
                    <a href="view_products.php" class="btn">Active Products</a>
                </div>
                <div class="box">
                    <?php
                        $select_inactive_products = $conn->prepare("SELECT * FROM `products` WHERE seller_id = ? AND status = ?");
                        $select_inactive_products->execute([$seller_id, 'inactive']);
                        $number_of_inactive_products = $select_inactive_products->rowCount();
                    ?>
                    <h3><?= $number_of_active_products ?></h3>
                    <p>Inactive Products</p>
                    <a href="view_products.php" class="btn">Inactive Products</a>
                </div>
                <div class="box">
                    <?php
                        $select_users = $conn->prepare("SELECT * FROM `users`");
                        $select_users->execute();
                        $number_of_users = $select_users->rowCount();
                    ?>
                    <h3><?= $number_of_users ?></h3>
                    <p>User Accounts</p>
                    <a href="user_accounts.php" class="btn">Users</a>
                </div>
                <div class="box">
                    <?php
                        $select_sellers = $conn->prepare("SELECT * FROM `sellers`");
                        $select_sellers->execute();
                        $number_of_sellers = $select_sellers->rowCount();
                    ?>
                    <h3><?= $number_of_sellers ?></h3>
                    <p>Seller Accounts</p>
                    <a href="user_accounts.php" class="btn">Sellers</a>
                </div>
                <div class="box">
                    <?php
                        $select_orders = $conn->prepare("SELECT * FROM `orders` WHERE seller_id = ?");
                        $select_orders->execute([$seller_id]);
                        $number_of_orders = $select_orders->rowCount();
                    ?>
                    <h3><?= $number_of_orders ?></h3>
                    <p>All Orders Placed</p>
                    <a href="admin_order.php" class="btn">Orders</a>
                </div>
                <div class="box">
                    <?php
                        $select_confirmed_orders = $conn->prepare("SELECT * FROM `orders` WHERE seller_id = ? AND status = ?");
                        $select_confirmed_orders->execute([$seller_id, 'In Progress']);
                        $number_of_confirmed_orders = $select_confirmed_orders->rowCount();
                    ?>
                    <h3><?= $number_of_confirmed_orders ?></h3>
                    <p>All Confirmed Orders</p>
                    <a href="admin_order.php" class="btn">Confirmed Orders</a>
                </div>
                <div class="box">
                    <?php
                        $select_cancelled_orders = $conn->prepare("SELECT * FROM `orders` WHERE seller_id = ? AND status = ?");
                        $select_cancelled_orders->execute([$seller_id, 'Cancelled']);
                        $number_of_cancelled_orders = $select_cancelled_orders->rowCount();
                    ?>
                    <h3><?= $number_of_cancelled_orders ?></h3>
                    <p>All Cancelled Orders</p>
                    <a href="admin_order.php" class="btn">Cancelled Orders</a>
                </div>
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
