<?php 
    include 'components/connect.php';

    if (isset($_COOKIE['user_id'])) {
        $user_id = $_COOKIE['user_id'];
    } else {
        $user_id = '';
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ice Cream Shop</title>
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
    <!-- Slider Section Start -->
     <div class="slider-container">
        <div class="slider">
            <div class="slideBox active">
                <div class="textBox">
                    <h1>We pride ourselves in <br>exceptional flavours</h1>
                    <a href="menu.php" class="btn">Shop Now</a>
                </div>
                <div class="imgBox">
                    <img src="image/slider.jpg">
                </div>
            </div>
            <div class="slideBox">
                <div class="textBox">
                    <h1>Cold treats are my kind <br>of comfort food</h1>
                    <a href="menu.php" class="btn">Shop Now</a>
                </div>
                <div class="imgBox">
                    <img src="image/slider0.jpg">
                </div>
            </div>
        </div>
        <ul class="controls"> 
            <li onclick="nextSlide();" class="next"><i class="bx bx-right-arrow-alt"></i></li>
            <li onclick="prevSlide();" class="prev"><i class="bx bx-left-arrow-alt"></i></li>
        </ul>
     </div>
    <!-- Slider Section End -->

    <!-- Service Section Start -->
     <div class="service">
        <div class="box-container">
            <div class="box">
                <div class="icon">
                    <div class="icon-box">
                        <img src="image/services.png" class="img1" >
                        <img src="image/services (1).png" class="img2" >
                    </div>
                </div>
                <div class="detail">
                    <h4>Delivery</h4>
                    <span>100% Secure</span>
                </div>
            </div>
            <div class="box">
                <div class="icon">
                    <div class="icon-box">
                        <img src="image/services (2).png" class="img1" >
                        <img src="image/services (3).png" class="img2" >
                    </div>
                </div>
                <div class="detail">
                    <h4>Payment</h4>
                    <span>100% Secure</span>
                </div>
            </div>
            <div class="box">
                <div class="icon">
                    <div class="icon-box">
                        <img src="image/services (5).png" class="img1" >
                        <img src="image/services (6).png" class="img2" >
                    </div>
                </div>
                <div class="detail">
                    <h4>Support</h4>
                    <span>24/7 Hours</span>
                </div>
            </div>
            <div class="box">
                <div class="icon">
                    <div class="icon-box">
                        <img src="image/service.png" class="img1" >
                        <img src="image/service (1).png" class="img2" >
                    </div>
                </div>
                <div class="detail">
                    <h4>Returns</h4>
                    <span>24/7 Free Returns</span>
                </div>
            </div>
            <div class="box">
                <div class="icon">
                    <div class="icon-box">
                        <img src="image/services (7).png" class="img1" >
                        <img src="image/services (8).png" class="img2" >
                    </div>
                </div>
                <div class="detail">
                    <h4>Gift</h4>
                    <span>Available Gift Services</span>
                </div>
            </div>
            <div class="box">
                <div class="icon">
                    <div class="icon-box">
                        <img src="image/services.png" class="img1" >
                        <img src="image/services (1).png" class="img2" >
                    </div>
                </div>
                <div class="detail">
                    <h4>Delivery</h4>
                    <span>100% Secure</span>
                </div>
            </div>
        </div>
     </div>
    <!-- Service Section End -->


    <!-- Sweet Alert CDN Link -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <!-- Custom JS Link -->
    <script src="js/user_script.js"></script>
    <?php
        include 'components/alert.php';
    ?>
</body>
</html>
