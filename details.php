<?php
session_start();
include("includes/db.php");
include("functions/functions.php");
?>

<?php
if (isset($_GET['pro_id'])) {
    $pro_id = $_GET['pro_id'];

    // Query untuk mengambil data produk
    $get_product = "SELECT * FROM products WHERE product_id='$pro_id'";
    $run_product = mysqli_query($con, $get_product);

    // Pastikan data produk ada
    if ($row_product = mysqli_fetch_array($run_product)) {
        $p_cat_id = $row_product['p_cat_id'];
        $p_title = $row_product['product_title'];
        $p_price = $row_product['product_price'];
        $p_desc = $row_product['product_desc'];
        $p_img1 = $row_product['product_img1'];
        $p_img2 = $row_product['product_img2'];
        $p_img3 = $row_product['product_img3'];

        // Query untuk mengambil kategori produk
        $get_p_cat = "SELECT * FROM product_category WHERE p_cat_id='$p_cat_id'";
        $run_p_cat = mysqli_query($con, $get_p_cat);

        // Pastikan data kategori produk ada
        if ($row_p_cat = mysqli_fetch_array($run_p_cat)) {
            $p_cat_title = $row_p_cat['p_cat_title'];
        } else {
            // Jika kategori produk tidak ditemukan
            $p_cat_title = "Unknown Category";
        }
    } else {
        // Jika produk tidak ditemukan
        echo "<h2>Product not found.</h2>";
        exit(); // Hentikan eksekusi jika produk tidak ditemukan
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pensil Ajaib</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link rel="stylesheet" href="style.css">

    <style>
    /* Add any additional custom styles here */
    </style>

</head>

<body>

    <!-- Header section starts -->
    <header>
        <div class="header-1">
            <a href="index.php" class="logo"><img src="website/all/logo5.svg" alt="Logo image" class="hidden-xs"></a>
            <div class="col-md-6 offer">
                <a href="#" class="btn btn-sucess btn-sm">
                    <?php
                if (!isset($_SESSION['customer_email'])) {
                    echo "Welcome Guest";
                } else {
                    echo "Welcome: " . $_SESSION['customer_email'];
                }
                ?>
                </a>
                <a id="pr" href="#"> Shopping Cart Total Price: ₹ <?php totalPrice(); ?>, Total Items
                    <?php item(); ?></a>
            </div>
        </div>

        <div class="header-2">
            <nav class="navbar">
                <ul>
                    <li><a href="index.php">HOME</a></li>
                    <li><a class="active" href="trimer.php">SHOP</a></li>
                    <li><a href="contactus.php">CONTACT</a></li>
                </ul>

                <div class="col-md-6">
                    <ul class="menu">
                        <li>
                            <div class="collapse clearfix" id="search">
                                <form class="navbar-form" method="get" action="result.php">
                                    <div class="input-group">
                                        <input type="text" name="user_query" placeholder="search" class="form-control"
                                            required="">
                                        <button type="submit" value="search" name="search" class="btn btn-primary">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </li>
                        <li>
                            <a href="cart.php" class="">
                                <i class="fa fa-shopping-cart"></i>
                                <span><?php item(); ?> items in cart</span>
                            </a>
                        </li>
                        <li><a href="customer_registration.php"><i class="fa fa-user-plus"></i>Register</a></li>
                        <li><a href="customer/my_account.php"><i class="fa fa-user-circle"></i>My Account</a></li>
                        <li><a href="cart.php"><i class="fa fa-shopping-cart"></i>Goto Cart</a></li>
                        <li>
                            <?php
                        if (!isset($_SESSION['customer_email'])) {
                            echo "<a href='checkout.php'>Login</a>";
                        } else {
                            echo "<a href='logout.php'>Logout</a>";
                        }
                        ?>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    <!-- Header section ends -->

    <section class="content" id="content">
        <div class="container">
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li><span>Product Details</span></li>
                </ul>
            </div>
        </div>
    </section>

    <div class="content1" id="content1">
        <div class="container1">
            <div class="col-md-3">
                <?php include("includes/sidebar.php"); ?>
            </div>
        </div>
    </div>

    <div class="slides">
        <div class="mySlides fade">
            <div class="numbertt"></div>
            <img src="admin_area/product_images/<?php echo $p_img1 ?>" width="400" height="300">
        </div>

        <div class="mySlides fade">
            <div class="numbertt"></div>
            <img src="admin_area/product_images/<?php echo $p_img2 ?>" width="400" height="300">
        </div>

        <div class="mySlides fade">
            <div class="numbertt"></div>
            <img src="admin_area/product_images/<?php echo $p_img3 ?>" width="400" height="300">
        </div>
        <a class="prv" onclick="plusSlides(-1)">&#10094;</a>
        <a class="net" onclick="plusSlides(1)">&#10095;</a>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script>
    var slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    function currentSlide(n) {
        showSlides(slideIndex = n);
    }

    function showSlides(n) {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("dot");
        if (n > slides.length) {
            slideIndex = 1
        }
        if (n < 1) {
            slideIndex = slides.length
        }
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex - 1].style.display = "block";
        dots[slideIndex - 1].className += " active";
    }
    </script>

    <div class="product-container">
        <div class="product-info">
            <h1 class="product-title"> Judul : <?php echo $p_title; ?></h1>
            <?php addCart(); ?>

            <div class="detail-desc" id="details">
                <h4>Product Details</h4>
                <p class="description"><?php echo $p_desc; ?></p>
            </div>

            <form action="details.php?add_cart=<?php echo $pro_id; ?>" method="post" class="order-form">
                <p class="order-button">
                    <button class="btn-prim" type="submit">
                        <i class="fa fa-shopping-cart"></i> Ambil Orderan
                    </button>
                </p>
            </form>
        </div>
    </div>

</body>

</html>