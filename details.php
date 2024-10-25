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

    <!-- font awesome cdn link  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        /* Add any additional custom styles here */
    </style>

</head>

<body>


    <div class="header-1">

        <!-- <a href="index.php" class="logo" > <img src="website/all/logo5.svg" alt="Logo image" class="hidden-xs">  </a> -->

        <div class="col-md-8 offer">
            <marquee behavior="" direction="">
                <h1>SELAMAT DATANG DI PT DUDU DIGITAL INDONESIA</h1>
            </marquee>
        </div>

    </div>
    <!-- Header section starts -->
    <header>
        <div class="header-2">
            <nav class="navbar navbar-expand-lg navbar-light " style="background: #0ca6ed;">
                <div class="container-fluid">
                    <!-- Company Logo on the left -->
                    <a class="navbar-brand me-3" href="index.php">
                        <img src="website/all/pensilajaib.png" alt="Company Logo" width="70" height="70" class="d-inline-block align-text-top">
                    </a>

                    <!-- Toggle button for mobile view -->
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <!-- Collapsible content -->
                    <div class="collapse navbar-collapse" id="navbarContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0" style="font-size: 15px;">
                            <li class="nav-item">
                                <a class="nav-link active" href="index.php">Beranda</a>
                            </li>
                            <!-- <li class="nav-item">
                                <a class="nav-link" href="#footer">Tentang Kita</a>
                            </li> -->
                            <li class="nav-item">
                                <a class="nav-link" href="trimer.php">Orderan</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="contactus.php">Kontak</a>
                            </li>
                        </ul>
                        <!-- Right-aligned items -->
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0" style="font-size: 15px;">
                            <li class="nav-item">
                                <a class="nav-link" href="cart.php">
                                    <i class="fa fa-shopping-cart"></i>
                                    <span><?php item(); ?> items in cart</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="customer_registration.php">
                                    <i class="fa fa-user-plus"></i> Register
                                </a>
                            </li>
                            <li class="nav-item">
                                <?php
                                if (!isset($_SESSION['customer_email'])) {
                                    echo "<a class='nav-link' href='checkout.php'>My Account</a>";
                                } else {
                                    echo "<a class='nav-link' href='customer/my_account.php?my_order'>My Account</a>";
                                }
                                ?>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="cart.php">
                                    <i class="fa fa-shopping-cart"></i> Goto Cart
                                </a>
                            </li>
                            <li class="nav-item">
                                <?php
                                if (!isset($_SESSION['customer_email'])) {
                                    echo "<a class='nav-link' href='checkout.php'>Login</a>";
                                } else {
                                    echo "<a class='nav-link' href='logout.php'>Logout</a>";
                                }
                                ?>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <!-- Header section ends -->

    <section class="content" id="content">
        <div class="container">
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li><span style="color:black">Product Details</span></li>
                </ul>
            </div>
        </div>
    </section>





    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


    <div class="container mt-4">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <h1 class="product-title">Judul: <?php echo $p_title; ?></h1>

                    <?php addCart(); // Function to handle cart addition 
                    ?>

                    <div class="" id="details">
                        <p class="description text-dark"><?php echo $p_desc; ?></p>
                        <p class="price">Price: INR <?php echo $p_price; ?></p>

                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <form action="details.php?add_cart=<?php echo $pro_id; ?>" method="post" class="order-form">
                    <p class="order-button">
                        <button class="btn btn-primary" type="submit">
                            <i class="fa fa-shopping-cart"></i> Ambil Order
                        </button>
                    </p>
                </form>
            </div>
        </div>
    </div>


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>s

</html>