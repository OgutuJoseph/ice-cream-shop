<?php 
    include '../components/connect.php';

    if (isset($_COOKIE['seller_id'])) {
        $seller_id = $_COOKIE['seller_id'];
    } else {
        $seller_id = '';
        header('location:login.php');
    }

    // Add Product
    if(isset($_POST['publish'])) {
        $id = unique_id();
        $name = $_POST['name'];
        $name = filter_var($name, FILTER_SANITIZE_SPECIAL_CHARS);
        
        $price = $_POST['price'];
        $price = filter_var($price, FILTER_SANITIZE_SPECIAL_CHARS);
        
        $description = $_POST['description'];
        $description = filter_var($description, FILTER_SANITIZE_SPECIAL_CHARS);
        
        $stock = $_POST['stock'];
        $stock = filter_var($stock, FILTER_SANITIZE_SPECIAL_CHARS);

        $status = 'active';

        $image = $_FILES['image']['name'];
        $image = filter_var($image, FILTER_SANITIZE_SPECIAL_CHARS);
        // $ext = pathinfo($image, PATHINFO_EXTENSION);;
        // $rename = unique_id().'.'.$ext;
        $image_size = $_FILES['image']['size'];
        $image_tmp_name = $_FILES['image']['tmp_name'];
        $image_folder = '../uploaded_files/'.$image;
        $select_image = $conn->prepare("SELECT * FROM `products` WHERE image = ? AND seller_id = ?");
        $select_image->execute([$image, $seller_id]);
        if (isset($image)) {
            if ($select_image->rowCount() > 0) {
                $warning_msg[] = 'Image name already in use.';
            } elseif ($image_size > 2000000) {
                $warning_msg[] = 'Image size too large.';
            } else {
                move_uploaded_file($image_tmp_name, $image_folder);
            }
        } else {
            $image = '';
        }

        if ($select_image->rowCount() > 0 AND $image != '') {
            $warning_msg[] = 'Please rename your image';
        } else {
            $insert_product = $conn->prepare("INSERT INTO `products` (id, seller_id, name, price, image, stock, product_detail, status) VALUES(?, ?, ?, ?, ?, ?, ?, ?)");
            $insert_product->execute([$id, $seller_id, $name, $price, $image, $stock, $description, $status]);
            $success_msg[] = 'New product created successfully.';
        }
    }

    //
    if(isset($_POST['draft'])) {
        $id = unique_id();
        $name = $_POST['name'];
        $name = filter_var($name, FILTER_SANITIZE_SPECIAL_CHARS);
        
        $price = $_POST['price'];
        $price = filter_var($price, FILTER_SANITIZE_SPECIAL_CHARS);
        
        $description = $_POST['description'];
        $description = filter_var($description, FILTER_SANITIZE_SPECIAL_CHARS);
        
        $stock = $_POST['stock'];
        $stock = filter_var($stock, FILTER_SANITIZE_SPECIAL_CHARS);

        $status = 'inactive';

        $image = $_FILES['image']['name'];
        $image = filter_var($image, FILTER_SANITIZE_SPECIAL_CHARS);
        // $ext = pathinfo($image, PATHINFO_EXTENSION);;
        // $rename = unique_id().'.'.$ext;
        $image_size = $_FILES['image']['size'];
        $image_tmp_name = $_FILES['image']['tmp_name'];
        $image_folder = '../uploaded_files/'.$image;
        $select_image = $conn->prepare("SELECT * FROM `products` WHERE image = ? AND seller_id = ?");
        $select_image->execute([$image, $seller_id]);
        if (isset($image)) {
            if ($select_image->rowCount() > 0) {
                $warning_msg[] = 'Image name already in use.';
            } elseif ($image_size > 2000000) {
                $warning_msg[] = 'Image size too large.';
            } else {
                move_uploaded_file($image_tmp_name, $image_folder);
            }
        } else {
            $image = '';
        }

        if ($select_image->rowCount() > 0 AND $image != '') {
            $warning_msg[] = 'Please rename your image';
        } else {
            $insert_product = $conn->prepare("INSERT INTO `products` (id, seller_id, name, price, image, stock, product_detail, status) VALUES(?, ?, ?, ?, ?, ?, ?, ?)");
            $insert_product->execute([$id, $seller_id, $name, $price, $image, $stock, $description, $status]);
            $success_msg[] = 'Product saved as draft successfully.';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller | Add Product</title>
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
        <section class="post-editor">
            <div class="heading">
                <h1>Add Product</h1>
                <img src="../image/separator-img.png" >
            </div>
            <div class="form-container">
                <form action="" method="post" enctype="multipart/form-data" class="register">
                    <div class="input-field">
                        <p>Product Name <span>*</span></p>
                        <input type="text" name="name" maxLength="100" placeholder="Enter Product Name" required class="box" >
                    </div>
                    <div class="input-field">
                        <p>Product Price <span>*</span></p>
                        <input type="number" name="price" maxLength="100" placeholder="Enter Product Price" required class="box" >
                    </div>
                    <div class="input-field">
                        <p>Product Detail <span>*</span></p>
                        <textarea name="description" maxLength="1000" placeholder="Enter Product Details" required class="box"></textarea>
                     </div>
                    <div class="input-field">
                        <p>Stock <span>*</span></p>
                        <input type="number" name="stock" maxLength="10" min="0" max="9999999999" placeholder="Enter Stock Details" required class="box" >
                    </div>
                    <div class="input-field">
                        <p>Product Image <span>*</span></p>
                        <input type="file" name="image" accept="image/*" required class="box" >
                    </div>
                    <div class="flex-btn">
                        <input type="submit" name="publish" value="Add Product" class="btn" >
                        <input type="submit" name="draft" value="Save as Draft" class="btn" >
                    </div>
                </form> 
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
