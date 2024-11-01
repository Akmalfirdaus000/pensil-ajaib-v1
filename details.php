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
    <!-- favicon -->
    <link rel="icon" href="website/all/pensilajaib.ico" type="image/x-icon">

    <style>
    /* Add any additional custom styles here */
    </style>

</head>

<body>

    <?php
    include("includes/wa.php");
    ?>
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
                        <img src="website/all/pensilajaib.png" alt="Company Logo" width="70" height="70"
                            class="d-inline-block align-text-top">
                    </a>

                    <!-- Toggle button for mobile view -->
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false"
                        aria-label="Toggle navigation">
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



    <div class="container mb-5   d-flex justify-content-center" style="margin-right: 60px;">
        <!-- Added 'd-flex justify-content-center' -->
        <div class="card shadow-lg">
            <div class="row no-gutters">
                <div class="col-md-6 position-relative">
                    <div id="carouselExampleIndicators" class="carousel slide slider-margin" data-bs-ride="carousel">
                        <!-- Indicators -->
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                                class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                                aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                                aria-label="Slide 3"></button>
                        </div>

                        <!-- Carousel Items -->
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="admin_area/product_images/<?php echo $p_img1 ?>" class="d-block img-fluid"
                                    alt="Product Image 1" style="width: 750px; height: 250px; object-fit: cover;">
                            </div>
                            <div class="carousel-item">
                                <img src="admin_area/product_images/<?php echo $p_img2 ?>" class="d-block img-fluid"
                                    alt="Product Image 2" style="width: 750px; height: 250px; object-fit: cover;">
                            </div>
                            <div class="carousel-item">
                                <img src="admin_area/product_images/<?php echo $p_img3 ?>" class="d-block img-fluid"
                                    alt="Product Image 3" style="width: 750px; height: 250px; object-fit: cover;">
                            </div>
                        </div>

                        <!-- Navigation Controls -->
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>

                <div class="col-md-6 d-flex align-items-center justify-content-center">
                    <!-- Added 'd-flex align-items-center justify-content-center' -->
                    <div class="card shadow-sm border-0">
                        <div class="card-body text-center">
                            <!-- Added 'text-center' class -->
                            <h1 class="product-title text-primary mb-3 fw-bold"><?php echo $p_title; ?></h1>

                            <?php addCart(); // Function to handle cart addition 
                            ?>

                            <div id="details" class="mb-4">
                                <p class="description text-muted"><?php echo $p_desc; ?></p>
                                <h5 class="price fw-bold">
                                    Code Client: <span class="text-success"> <?php echo $p_price; ?></span>
                                </h5>
                            </div>

                            <form action="details.php?add_cart=<?php echo $pro_id; ?>" method="post" class="order-form">
                                <button
                                    class="btn btn-primary btn-lg w-100 d-flex align-items-center justify-content-center"
                                    type="submit">
                                    <i class="fa fa-shopping-cart me-2"></i> Ambil Order
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <footer class="footer" id="footer">
        <div class="cuntainer">
            <div class="wolf">

                <div class="footer-ol">
                    <h4>company</h4>
                    <ul>
                        <li><a href="#" style="color: #fff;">Beranda</a></li><br><br>
                        <li><a href="#" style="color: #fff;">Tentang Kami</a></li><br><br>
                        <li><a href="#" style="color: #fff;">Orderan</a></li><br><br>
                        <li><a href="#" style="color: #fff;">Kontak</a></li><br><br>
                    </ul>
                </div>

                <div class="footer-ol">
                    <h4>Kategori Produk</h4>
                    <ul>
                        <li><a href="#" style="color: #fff;">Desaign Logo</a></li><br><br>
                        <li><a href="#" style="color: #fff;">Web Desaigner</a></li><br><br>

                    </ul>
                </div>
                <div class="footer-ol">
                    <h4>follow us</h4>
                    <div class="social-links">
                        <a href="https://www.facebook.com/profile.php?id=100093616384522"><i
                                class="fab fa-facebook-f fa-2x" style="color: #3b5998;"></i></a>
                        <a href="mailto:youremail@example.com"><i class="fas fa-envelope fa-2x"
                                style="color: #0084b4;"></i></a>
                        <a href="https://www.instagram.com/pensilajaib.std/"><i class="fab fa-instagram fa-2x"
                                style="color:   #E1306C;"></i></a>


                    </div>
                </div>
                <div class="pal">

                </div>
                <p class="credit text-center mb-0">
                    Copyright &copy; <span><?php echo date("Y"); ?></span> | all rights reserved. |
                    <span class="fw-bold">Designed By Pensil Ajaib</span>
                </p>


            </div>
        </div>
    </footer>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script src="js/main.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</html>