<?php 
    include '../components/connect.php';

    if (isset($_COOKIE['seller_id'])) {
        $seller_id = $_COOKIE['seller_id'];
    } else {
        $seller_id = '';
        header('location:login.php');
    }

    // Update Order
    if (isset($_POST['update_order'])){
        $order_id = $_POST['order_id'];
        $order_id = filter_var($order_id, FILTER_SANITIZE_SPECIAL_CHARS);
        
        $payment_status = $_POST['payment_status'];
        $payment_status = filter_var($payment_status, FILTER_SANITIZE_SPECIAL_CHARS);

        $update_payment = $conn->prepare("UPDATE `orders` SET payment_status = ? WHERE id = ?");
        $update_payment->execute([$payment_status, $order_id]);
        $success_msg[] = "Order Details Updated Successfully.";
    }

    // Delete Order
    if (isset($_POST['delete_order'])){
        $order_id = $_POST['order_id'];
        $order_id = filter_var($order_id, FILTER_SANITIZE_SPECIAL_CHARS);
        
        $verify_delete = $conn->prepare("SELECT * FROM `orders` WHERE id = ?");
        $verify_delete->execute([$order_id]);

        if ($verify_delete->rowCount() > 0){
            $delete_order = $conn->prepare("DELETE FROM `orders` WHERE id = ?");
            $delete_order->execute([$order_id]);
            $success_msg[] = "Order Deleted Successfully.";
        } else {
            $warning_msg[] = "Order Already Deleted.";
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
                            $total_price = $fetch_order['price'] * $fetch_order['qty'];

                ?>  
                <div class="box">
                    <div class="status" style="color: <?php if($fetch_order['status'] == 'In Progress') {echo "limegreen";} else {echo "red";} ?>"><?= $fetch_order['status']; ?></div>
                    <div class="details">
                        <p>User Name : <span><?= $fetch_order['name'] ?></span></p>
                        <p>User ID : <span><?= $fetch_order['user_id'] ?></span></p>
                        <p>User Number : <span><?= $fetch_order['number'] ?></span></p>
                        <p>User Email : <span><?= $fetch_order['email'] ?></span></p>
                        <p>User Address : <span><?= $fetch_order['address'] ?></span></p>
                        <p>Order Date : <span><?= $fetch_order['date'] ?></span></p>                    
                        <p>Product Price : <span><?= $fetch_order['price'] ?></span></p>
                        <p>Product Qty : <span><?= $fetch_order['qty'] ?></span></p>
                        <p>Total Price : <span><?= $total_price ?></span></p>
                        <p>Payment Method : <span><?= $fetch_order['method'] ?></span></p>
                    </div>
                    <form action="" method="post">
                        <input type="hidden" name="order_id" value="<?= $fetch_order['id'] ?>" >
                        <select name="payment_status" class="box" style="width: 90%;">
                            <option disabled selected><?= $fetch_order['payment_status'] ?></option>
                            <option value="Pending">Pending</option>
                            <option value="Order Delivered">Order Delivered</option>
                        </select>
                        <div class="flex-btn">
                            <input type="submit" name="update_order" value="Update Order" class="btn">
                            <input type="submit" name="delete_order" value="Delete Order" class="btn" onclick="return confirm('Are you sure you want to delete this order?');>
                        </div>
                    </form>
                </div>
                <?php
                        }
                    }else {
                        echo '
                            <div class="empty">
                                <p>
                                    No orders. 
                                </p>
                            </div> 
                        ';
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
