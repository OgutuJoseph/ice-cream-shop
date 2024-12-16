<?php 
    include '../components/connect.php';

    if (isset($_COOKIE['seller_id'])) {
        $seller_id = $_COOKIE['seller_id'];
    } else {
        $seller_id = '';
        header('location:login.php');
    }

    if (isset($_POST['submit'])) {
        $select_seller = $conn->prepare("SELECT * FROM `sellers` WHERE id = ? LIMIT 1");
        $select_seller->execute([$seller_id]);
        $fetch_seller = $select_seller->fetch(PDO::FETCH_ASSOC);

        $prev_pass = $fetch_seller['password'];
        $prev_image = $fetch_seller['image'];

        $name = $_POST['name'];
        $name = filter_var($name, FILTER_SANITIZE_SPECIAL_CHARS);

        $email = $_POST['email'];
        $email = filter_var($email, FILTER_SANITIZE_SPECIAL_CHARS);    

        // Update Name
        if (!empty($name)) {
            $update_name = $conn->prepare("UPDATE `sellers` SET name = ? WHERE id = ?");
            $update_name->execute([$name, $seller_id]);
            $success_msg[] = "Username Updated Successfully.";
        }

        // Update Email
        if (!empty($email)) {
            $select_email = $conn->prepare("SELECT * FROM `sellers` WHERE id = ? AND email = ?");
            $select_email->execute([$seller_id, $email]);
            
            if ($select_email->rowCount() > 0){
                $warning_msg[] = "Email Already in Use.";
            } else {
                $update_email = $conn->prepare("UPDATE `sellers` SET email = ? WHERE id = ?");
                $update_email->execute([$email, $seller_id]);
                $success_msg[] = "User Email Updated Successfully.";
            }
        }

        // Update image
        $image = $_FILES['image']['name'];
        $image = filter_var($image, FILTER_SANITIZE_SPECIAL_CHARS);
        $ext = pathinfo($image, PATHINFO_EXTENSION);
        $rename = unique_id().'.'.$ext;
        $image_size = $_FILES['image']['size'];
        $image_temp_name = $_FILES['image']['tmp_name'];
        $image_folder = '../uploaded_files/'.$rename;

        if (!empty($image)){
            if ($image_size > 2000000) {
                $warning_msg[] = "Image size is too large.";
            } else {
                $update_image = $conn->prepare("UPDATE `sellers` SET `image` = ? WHERE id = ?");
                $update_image->execute([$rename, $seller_id]);
                move_uploaded_file($image_temp_name, $image_folder);

                if ($prev_image != '' AND $prev_image != $rename) {
                    unlink('../uploaded_files/'.$prev_image);
                } 
                $success_msg[] = "Image updated successfully.";
            }
        }

        // Update password
        $empty_pass = 'asng88780wepppoeterooeriei3666688800111asasas';

        $old_pass = sha1($_POST['old_pass']);
        $old_pass = filter_var($old_pass, FILTER_SANITIZE_SPECIAL_CHARS);

        $new_pass = sha1($_POST['new_pass']);
        $new_pass = filter_var($new_pass, FILTER_SANITIZE_SPECIAL_CHARS);
        
        $c_pass = sha1($_POST['c_pass']);
        $c_pass = filter_var($c_pass, FILTER_SANITIZE_SPECIAL_CHARS);

        if ($old_pass != $empty_pass) {
            if ($old_pass != $prev_pass) {
                $warning_msg[] = "Old Password Not Matched.";
            } elseif ($new_pass != $c_pass) {
                $warning_msg[] = "New and Confirmed Passwords Dont Match.";
            } else {
                if ($new_pass != $empty_pass) {
                    $update_pass = $conn->prepare("UPDATE `sellers` SET password = ? WHERE id = ?");
                    $update_pass->execute([$c_pass, $seller_id]);
                    $success_msg[] = "Password Updated Successfully.";
                } else {
                    $warning_msg[] = "Please Enter New Password.";
                }
            }
        }

    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Update Profile</title>
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
        <section class="form-container">
            <div class="heading">
                <h1>Update Profile Details</h1>
                <img src="../image/separator-img.png" >
            </div>
            <form action="" method="post" enctype="multipart/form-data" class="register">
                <div class="img-box">
                    <img src="../uploaded_files/<?= $fetch_profile['image'] ?>">
                </div>
                <h3>Update Profile</h3>
                <div class="flex">
                    <div class="col">                        
                        <div class="input-field">
                            <p>Your Name <span>*</span></p>
                            <input type="text" name="name" placeholder="<?= $fetch_profile['name'] ?>"  class="box">
                        </div>                      
                        <div class="input-field">
                            <p>Your Email <span>*</span></p>
                            <input type="email" name="email" placeholder="<?= $fetch_profile['email'] ?>"  class="box">
                        </div>                      
                        <div class="input-field">
                            <p>Select Photo <span>*</span></p>
                            <input type="file" name="image" accept="image/*"  class="box">
                        </div>
                    </div>
                    <div class="col">                        
                        <div class="input-field">
                            <p>Old Password <span>*</span></p>
                            <input type="password" name="old_pass" placeholder="Enter Your Old Password"  class="box" autocomplete="off">
                        </div>                      
                        <div class="input-field">
                            <p>New Password <span>*</span></p>
                            <input type="password" name="new_pass" placeholder="Enter New Password"  class="box">
                        </div>                        
                        <div class="input-field">
                            <p>Confirm Password <span>*</span></p>
                            <input type="password" name="c_pass" placeholder="Confirm New Password"  class="box">
                        </div>  
                    </div>
                </div>
                <input type="submit" name="submit" value="Update Profile" class="btn">
            </form>
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
