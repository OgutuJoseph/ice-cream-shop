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
                        <img src="image/services-1-black.png" class="img1" >
                        <img src="image/services-1-white.png" class="img2" >
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
                        <img src="image/services-2-black.png" class="img1" >
                        <img src="image/services-2-white.png" class="img2" >
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
                        <img src="image/services-3-black.png" class="img1" >
                        <img src="image/services-3-white.png" class="img2" >
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
                        <img src="image/services-4-black.png" class="img1" >
                        <img src="image/services-4-white.png" class="img2" >
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
                        <img src="image/services-5-black.png" class="img1" >
                        <img src="image/services-5-white.png" class="img2" >
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
                        <img src="image/services-1-black.png" class="img1" >
                        <img src="image/services-1-white.png" class="img2" >
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

    <!-- Categories Section Start -->
     <div class="categories">
        <div class="heading">
            <h1>Categories Featured</h1>
            <img src="image/separator-img.png" >
        </div>
        <div class="box-container">
            <div class="box">
                <img src="image/categories-1.jpg" >
                <a href="menu.php" class="btn">Coconut</a>
            </div>
            <div class="box">
                <img src="image/categories-2.jpg" >
                <a href="menu.php" class="btn">Chocolate</a>
            </div>
            <div class="box">
                <img src="image/categories-3.jpg" >
                <a href="menu.php" class="btn">Corn</a>
            </div>
            <div class="box">
                <img src="image/categories-4.jpg" >
                <a href="menu.php" class="btn">Strawberry</a>
            </div>
        </div>
     </div>
    <!-- Categories Section End -->

    <img src="image/menu-banner.jpg" class="menu-banner" >

    <!-- Taste Section Start -->
     <div class="taste">
        <div class="heading">
            <span>Taste</span>
            <h1>Buy any ice cream and get one free</h1>
            <img src="image/separator-img.png" >
        </div>
        <div class="box-container">
            <div class="box">
                <img src="image/taste-1.webp" >
                <div class="detail">
                    <h2>Natural Sweetness</h2>
                    <h1>Vanilla</h1>
                </div>
            </div>
            <div class="box">
                <img src="image/taste-2.webp" >
                <div class="detail">
                    <h2>Natural Sweetness</h2>
                    <h1>Matcha</h1>
                </div>
            </div>
            <div class="box">
                <img src="image/taste-3.webp" >
                <div class="detail">
                    <h2>Natural Sweetness</h2>
                    <h1>Blue Berry</h1>
                </div>
            </div>
        </div>
     </div>
    <!-- Taste Section End -->

    <!-- Container Section Start -->
    <div class="ice-container">
        <div class="overlay"></div>
        <div class="detail">
            <h1>Ice Cream is cheaper than <br> therapy for stress</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur enim erat, vehicula vel vestibulum at, egestas interdum ante. In luctus non justo ultricies porttitor. Etiam vehicula blandit accumsan. Etiam quis libero commodo, maximus magna ac, lobortis dui. In at felis laoreet, posuere metus eget, dictum ex. Nam pulvinar vestibulum dolor vel dignissim. Quisque pellentesque dapibus leo, a efficitur eros ullamcorper eu. Quisque faucibus libero quis libero lobortis facilisis. Morbi ac neque lacinia, iaculis orci at, eleifend nisl. Aenean congue ex vestibulum nibh euismod interdum</p>
            <a href="menu.php" class="btn">Shop Now</a>
        </div>
    </div>
    <!-- Container Section End -->

    <!-- Taste2 Section Start -->
    <div class="taste2">
        <div class="t-banner">
            <div class="overlay"></div>
            <div class="detail">                
                <h1>Find your taste of desserts</h1>
                <p>Treat them to a delicious treat and send some Luck o' the Kenya too!</p>
                <a href="menu.php" class="btn">Shop Now</a>
            </div>
        </div>
        <div class="box-container">
            <div class="box">
                <div class="box-overlay"></div>
                <img src="image/type-1.jpg" >
                <div class="box-details fadeIn-bottom">
                    <h1>Strawberry</h1>
                    <p>Find your taste of desserts</p>
                    <a href="menu.php" class="btn">Explore more</a>
                </div>
            </div>
            <div class="box">
                <div class="box-overlay"></div>
                <img src="image/type-2.avif" >
                <div class="box-details fadeIn-bottom">
                    <h1>Strawberry</h1>
                    <p>Find your taste of desserts</p>
                    <a href="menu.php" class="btn">Explore more</a>
                </div>
            </div>
            <div class="box">
                <div class="box-overlay"></div>
                <img src="image/type-3.png" >
                <div class="box-details fadeIn-bottom">
                    <h1>Strawberry</h1>
                    <p>Find your taste of desserts</p>
                    <a href="menu.php" class="btn">Explore more</a>
                </div>
            </div>
            <div class="box">
                <div class="box-overlay"></div>
                <img src="image/type-4.png" >
                <div class="box-details fadeIn-bottom">
                    <h1>Strawberry</h1>
                    <p>Find your taste of desserts</p>
                    <a href="menu.php" class="btn">Explore more</a>
                </div>
            </div>
            <div class="box">
                <div class="box-overlay"></div>
                <img src="image/type-5.avif" >
                <div class="box-details fadeIn-bottom">
                    <h1>Strawberry</h1>
                    <p>Find your taste of desserts</p>
                    <a href="menu.php" class="btn">Explore more</a>
                </div>
            </div>
            <div class="box">
                <div class="box-overlay"></div>
                <img src="image/type-1.jpg" >
                <div class="box-details fadeIn-bottom">
                    <h1>Strawberry</h1>
                    <p>Find your taste of desserts</p>
                    <a href="menu.php" class="btn">Explore more</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Taste2 Section End -->

    <!-- Flavour Section Start -->
    <div class="flavour">
        <div class="box-container">
            <img src="image/left-banner2.webp" >
            <div class="detail">
                <h1>Hot Deal ! Sale Up To <span>20% Off</span></h1>
                <p>Expired</p>
                <a href="menu.php" class="btn">Shop Now</a>
            </div>
        </div>
    </div>
    <!-- Flavour Section End -->

    <!-- Usage Section Start -->
    <div class="usage">
        <div class="heading">
            <h1>How it works</h1>
            <img src="image/separator-img.png">
        </div>
        <div class="row">
            <div class="box-container">
                <div class="box">
                    <img src="image/icon-1.avif" >
                    <div class="detail">
                        <h3>Scoop Ice Cream</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur enim erat, vehicula vel vestibulum at, egestas interdum ante. In luctus non justo ultricies porttitor. Etiam vehicula blandit accumsan.</p>
                    </div>
                </div>
                <div class="box">
                    <img src="image/icon-2.avif" >
                    <div class="detail">
                        <h3>Scoop Ice Cream</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur enim erat, vehicula vel vestibulum at, egestas interdum ante. In luctus non justo ultricies porttitor. Etiam vehicula blandit accumsan.</p>
                    </div>
                </div>
                <div class="box">
                    <img src="image/icon-3.avif" >
                    <div class="detail">
                        <h3>Scoop Ice Cream</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur enim erat, vehicula vel vestibulum at, egestas interdum ante. In luctus non justo ultricies porttitor. Etiam vehicula blandit accumsan.</p>
                    </div>
                </div>
                <div class="box">
                    <img src="image/icon-4.avif" >
                    <div class="detail">
                        <h3>Scoop Ice Cream</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur enim erat, vehicula vel vestibulum at, egestas interdum ante. In luctus non justo ultricies porttitor. Etiam vehicula blandit accumsan.</p>
                    </div>
                </div>
                <div class="box">
                    <img src="image/icon-5.avif" >
                    <div class="detail">
                        <h3>Scoop Ice Cream</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur enim erat, vehicula vel vestibulum at, egestas interdum ante. In luctus non justo ultricies porttitor. Etiam vehicula blandit accumsan.</p>
                    </div>
                </div>
                <div class="box">
                    <img src="image/icon-6.avif" >
                    <div class="detail">
                        <h3>Scoop Ice Cream</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur enim erat, vehicula vel vestibulum at, egestas interdum ante. In luctus non justo ultricies porttitor. Etiam vehicula blandit accumsan.</p>
                    </div>
                </div>
            </div>
            <img src="image/sub-banner.png" class="divider" >
        </div>
    </div>
    <!-- Usage Section End -->

    <!-- Sweet Alert CDN Link -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <!-- Custom JS Link -->
    <script src="js/user_script.js"></script>
    <?php
        include 'components/alert.php';
    ?>
</body>
</html>
