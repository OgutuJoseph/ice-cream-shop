<?php 
    include '../components/connect.php';

    if (isset($_POST['submit'])) {
        $id = unique_id();
        $name = $_POST['name'];
        $name = filter_var($name, FILTER_SANITIZE_SPECIAL_CHARS);

        $email = $_POST['email'];
        $email = filter_var($email, FILTER_SANITIZE_SPECIAL_CHARS);    

        $pass = sha1($_POST['pass']);
        $pass = filter_var($pass, FILTER_SANITIZE_SPECIAL_CHARS);   
        
        $cpass = sha1($_POST['cpass']);
        $cpass = filter_var($cpass, FILTER_SANITIZE_SPECIAL_CHARS);  

        $image = $_FILES['image']['name'];
        $image = filter_var($image, FILTER_SANITIZE_SPECIAL_CHARS);
        $ext = pathinfo($image, PATHINFO_EXTENSION);;
        $rename = unique_id().'.'.$ext;
        $image_size = $_FILES['image']['size'];
        $image_tmp_name = $_FILES['image']['tmp_name'];
        $image_folder = '../uploaded_files/'.$rename;

        $select_seller = $conn->prepare("SELECT * FROM `sellers` WHERE email = ?");
        $select_seller->execute([$email]);

        if ($select_seller->rowCount() > 0) {
            $warning_msg[] = 'Email already in use.';
        } else {
            if ($pass != $cpass) {
                $warning_msg[] = 'Passwords not matching.';
            } else {
                $insert_seller = $conn->prepare("INSERT INTO `sellers` (id, name, email, password, image) VALUES(?, ?, ?, ?, ?)");
                $insert_seller->execute([$id, $name, $email, $cpass, $rename]);
                move_uploaded_file($image_tmp_name, $image_folder);
                $success_msg[] = 'New seller created successfully.';
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ice Cream Shop - Seller Registration</title>
    <link rel="stylesheet" type="text/css" href="../css/admin_style.css" >
    <!-- Font Awesome CDN Link -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" >
</head>
<body>

    <div class="form-container">
        <form action="" method="post" enctype="multipart/form-data" class="register">
            <h3>Register Now</h3>
            <div class="flex">
                <div class="col">
                    <div class="input-field">
                        <p>Your Name <span>*</span></p>
                        <input type="text" name="name" placeholder="Enter Your Name" maxLength="50" required class="box" >
                    </div>
                    <div class="input-field">
                        <p>Your Email <span>*</span></p>
                        <input type="email" name="email" placeholder="Enter Your Email" maxLength="50" required class="box" >
                    </div>
                </div>
                <div class="col">
                    <div class="input-field">
                        <p>Your Password <span>*</span></p>
                        <input type="password" name="pass" placeholder="Enter Your Password" maxLength="50" required class="box" >
                    </div>
                    <div class="input-field">
                        <p>Confirm Password <span>*</span></p>
                        <input type="password" name="cpass" placeholder="Confirm Your Password" maxLength="50" required class="box" >
                    </div>                    
                </div>                
            </div>
            <div class="input-field">
                <p>Your Photo <span>*</span></p>
                <input type="file" name="image" accept="image/*" required class="box" >
            </div>
            <p class="link">Already have an Account? <a href="login.php">Login Here</a></p>
            <input type="submit" name="submit" value="Register Now" class="btn" >
        </form>
    </div>
    
    <!-- Sweet Alert CDN Link -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <!-- Custom JS Link -->
    <script src="../js/script.js"></script>
    <?php
        include '../components/alert.php';
    ?>
</body>
</html>
