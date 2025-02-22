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
    <title>Ice Cream Shop | About Us</title>
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
    <!-- Banner Section Start -->
    <div class="banner">
        <div class="detail">
            <h1>About Us</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur enim erat, vehicula vel vestibulum at, egestas interdum ante. <br>
            In luctus non justo ultricies porttitor. Etiam vehicula blandit accumsan.</p>
            <span><a href="home.php">Home</a><i class="bx bx-right-arrow-alt"></i>About Us</span>
        </div>
    </div>
    <!-- Banner Section End -->

    <!-- Chef Section Start -->
    <div class="chef">
        <div class="box-container">
            <div class="box">
                <div class="heading">
                    <span>Alex Doe</span>
                    <h1>Masterchef</h1>
                    <img src="image/separator-img.png" >
                </div>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur enim erat, vehicula vel vestibulum at, egestas interdum ante. In luctus non justo ultricies porttitor. Etiam vehicula blandit accumsan.</p>
                <div class="flex-btn">
                    <a href="#" class="btn">Explore Our Menu</a>
                    <a href="#" class="btn">Visit Our Shop</a>
                </div>
            </div>
            <div class="box">
                <img src="image/chef.png" class="img" >
            </div>
        </div>
    </div>
    <!-- Chef Section End -->

    <!-- Story Section Start -->
    <div class="story">
        <div class="heading">
            <h1>Our Story</h1>
            <img src="image/separator-img.png" >
        </div>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
            <br>Curabitur enim erat, vehicula vel vestibulum at, egestas interdum ante. 
            <br>In luctus non justo ultricies porttitor. Etiam vehicula blandit accumsan. 
            <br> Etiam quis libero commodo, maximus magna ac, lobortis dui. In at felis laoreet, posuere metus eget, dictum ex. 
            <br> Nam pulvinar vestibulum dolor vel dignissim. Quisque pellentesque dapibus leo, a efficitur eros ullamcorper eu. 
            <br> Quisque faucibus libero quis libero lobortis facilisis. Morbi ac neque lacinia, iaculis orci at, eleifend nisl. Aenean congue ex vestibulum nibh euismod interdum
        </p>
        <a href="menu.php" class="btn">Our Services</a>
    </div>
    <!-- Story Section End -->

    <!-- Container Section Start -->
    <div class="container">
        <div class="box-container">
            <div class="img-box">
                <img src="image/about.png" >
            </div>
            <div class="box">
                <div class="heading">
                    <h1>Taking Ice Cream To New Heights</h1>
                    <img src="image/separator-img.png" >
                </div>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur enim erat, vehicula vel vestibulum at, egestas interdum ante. In luctus non justo ultricies porttitor. Etiam vehicula blandit accumsan. Etiam quis libero commodo, maximus magna ac, lobortis dui. In at felis laoreet, posuere metus eget, dictum ex. Nam pulvinar vestibulum dolor vel dignissim. Quisque pellentesque dapibus leo, a efficitur eros ullamcorper eu. Quisque faucibus libero quis libero lobortis facilisis. Morbi ac neque lacinia, iaculis orci at, eleifend nisl. Aenean congue ex vestibulum nibh euismod interdum.</p>
                <a href="#" class="btn">Learn More</a>
            </div>
        </div>
    </div>
    <!-- Container Section End -->

    <!-- Team Section Start -->
    <div class="team">
        <div class="heading">
            <span>Our Team</span>
            <h1>Quality & Passion With Our Servies</h1>
            <img src="image/separator-img.png" alt="" >
        </div>
        <div class="box-container">
            <div class="box">
                <img src="image/team-1.jpg" class="img" >
                <div class="content">
                    <img src="image/shape-19.png" alt="" class="shap" >
                    <h2>John Doe</h2>
                    <p>Coffee Chef</p>
                </div>
            </div>
            <div class="box">
                <img src="image/team-2.jpg" class="img" >
                <div class="content">
                    <img src="image/shape-19.png" alt="" class="shap" >
                    <h2>Jane Doe</h2>
                    <p>Pastry Chef</p>
                </div>
            </div>
            <div class="box">
                <img src="image/team-3.jpg" class="img" >
                <div class="content">
                    <img src="image/shape-19.png" alt="" class="shap" >
                    <h2>Jay Dee</h2>
                    <p>Coffee Chef</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Team Section End -->

    <!-- Standards Section Start -->
    <div class="standards">
        <div class="detail">
            <div>
                <div class="heading">
                    <h1>Our Standards</h1>
                    <img src="image/separator-img.png" >
                </div>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
                <i class="bx bxs-heart"></i>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
                <i class="bx bxs-heart"></i>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
                <i class="bx bxs-heart"></i>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
                <i class="bx bxs-heart"></i>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
                <i class="bx bxs-heart"></i>
            </div>
        </div>
    </div>  
    <!-- Standards Section End -->

    <!-- Testimonial Section Start -->
    <div class="testimonial">
        <div class="heading">
            <h1>Testimonials</h1>
            <img src="image/separator-img.png" >
        </div>
        <div class="testimonial-container">
            <div class="slide-row" id="slide">
                <div class="slide-col">
                    <div class="user-text">
                        <p>Zen Doan is a business analyst, entrepreneur, media proprietor and investor. She is also known as the best selling book author. </p>
                        <h2>Zen</h2>
                        <p>Author</p>
                    </div>
                    <div class="user-img">
                        <img src="image/testimonial-1.jpg" >
                    </div>
                </div>
                <div class="slide-col">
                    <div class="user-text">
                        <p>Yusef Malik is a top footballer in the region. He happens to be the man. </p>
                        <h2>Yusef</h2>
                        <p>Footballer</p>
                    </div>
                    <div class="user-img">
                        <img src="image/testimonial-2.jpg" >
                    </div>
                </div>
                <div class="slide-col">
                    <div class="user-text">
                        <p>Elaine Smith is an actress and model. She is best known to be the woman and the myth of them all. </p>
                        <h2>Elaine</h2>
                        <p>Actress</p>
                    </div>
                    <div class="user-img">
                        <img src="image/testimonial-3.jpg" >
                    </div>
                </div>
                <div class="slide-col">
                    <div class="user-text">
                        <p>Wright Philips is a business mogul. He is the chief investor of the biggest stocks and stakes ever known.</p>
                        <h2>Wright</h2>
                        <p>Business Man</p>
                    </div>
                    <div class="user-img">
                        <img src="image/testimonial-4.jpg" >
                    </div>
                </div>
            </div>
        </div>
        <div class="indicator">
            <span class="btn1 active"></span>
            <span class="btn1"></span>
            <span class="btn1"></span>
            <span class="btn1"></span>
        </div>
    </div>
    <!-- Testimonial Section End -->

    <!-- Mission Section Start -->
    <div class="mission">
        <div class="box-container">
            <div class="box">
                <div class="heading">
                    <h1>Our Mission</h1>
                    <img src="separator-img.png" >
                </div>
                <div class="detail">
                    <div class="img-box">
                        <img src="image/mission-1.webp" >
                    </div>
                    <div>
                        <h2>Meican Chocolate</h2>
                        <p>Layers of shaped marshmallow candies - bunnies, chicks and simple flowers - make a memorable gift in a beribonned box.</p>
                    </div>
                </div>
                <div class="detail">
                    <div class="img-box">
                        <img src="image/mission-2.webp" >
                    </div>
                    <div>
                        <h2>Vanilla with Honey</h2>
                        <p>Layers of shaped marshmallow candies - bunnies, chicks and simple flowers - make a memorable gift in a beribonned box.</p>
                    </div>
                </div>
                <div class="detail">
                    <div class="img-box">
                        <img src="image/mission-3.jpg" >
                    </div>
                    <div>
                        <h2>Peppermint Chip</h2>
                        <p>Layers of shaped marshmallow candies - bunnies, chicks and simple flowers - make a memorable gift in a beribonned box.</p>
                    </div>
                </div>
                <div class="detail">
                    <div class="img-box">
                        <img src="image/mission-4.webp" >
                    </div>
                    <div>
                        <h2>Raspeberry Sorbat</h2>
                        <p>Layers of shaped marshmallow candies - bunnies, chicks and simple flowers - make a memorable gift in a beribonned box.</p>
                    </div>
                </div>
            </div>
            <div class="box">
                <img src="image/form.png" alt="" class="img">
            </div>
        </div>
    </div>
    <!-- Mission Section End -->


    
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
