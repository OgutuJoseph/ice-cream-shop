<header class="header">
    <section class="flex">
        <a href="home.php" class="logo"><img src="image/logo.png" width="130px"></a>
        <nav class="navbar">
            <a href="home.php">Home</a>
            <a href="abount-us.php">About Us</a>
            <a href="menu.php">Menu</a>
            <a href="order.php">Order</a>
            <a href="contact.php">Contact</a>
        </nav>
        <form action="" method="post">
            <input type="text" name="search_product" placeholder="Search Product..." required maxlength="100" >
            <button type="submit" class="bx bx-search-alt-2" id="search_product_btn"></button>
            <div class="icons">
                <div class="bx bx-list-plus" id="menu-btn"></div>
                <div class="bx bx-search-alt-2" id="search-btn"></div>
                <a href="wishlist.php"><i class="bx bx-heart"></i><sup>0</sup></a>
                <a href="cart.php"><i class="bx bx-cart"></i><sup>0</sup></a>
                <div class="bx bxs-user" id="user-btn"></div>
            </div>
        </form>
    </section>
</header>
