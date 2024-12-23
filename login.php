<?php 
    include 'components/connect.php';

    if (isset($_COOKIE['user_id'])) {
        $user_id = $_COOKIE['user_id'];
    } else {
        $user_id = '';
    }

    if (isset($_POST['submit'])) {
        $email = $_POST['email'];
        $email = filter_var($email, FILTER_SANITIZE_SPECIAL_CHARS);    

        $pass = sha1($_POST['pass']);
        $pass = filter_var($pass, FILTER_SANITIZE_SPECIAL_CHARS);   
        
        $select_user = $conn->prepare("SELECT * FROM `users` WHERE email = ? AND password = ?");
        $select_user->execute([$email, $pass]);
        $row = $select_user->fetch(PDO::FETCH_ASSOC);

        if ($select_user->rowCount() > 0) {
            setcookie('user_id', $row['id'], time() + 60*60*24*30, '/');
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
    <title>Ice Cream Shop | User Login</title>
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

    <div class="form-container">
        <form action="" method="post" enctype="multipart/form-data" class="login">
            <h3>Login</h3>
            <div class="flex">
                <div class="col">
                    <div class="input-field">
                        <p>Your Email <span>*</span></p>
                        <input type="email" name="email" placeholder="Enter Your Email" maxLength="50" required class="box" >
                    </div>
                    <div class="input-field">
                        <p>Your Password <span>*</span></p>
                        <input type="password" name="pass" placeholder="Enter Your Password" maxLength="50" required class="box" >
                    </div>
                </div>              
            </div>
            <p class="link">Don't have an Account? <a href="register.php">Register Here</a></p>
            <input type="submit" name="submit" value="Login" class="btn" >
        </form>
    </div>

 


    
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
