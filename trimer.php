<?php
session_start();
include("includes/db.php");
include("functions/functions.php");

// Cek apakah sesi validasi sudah diatur
$orderValidated = isset($_SESSION['order_validated']) && $_SESSION['order_validated'] === true;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pensil Ajaib</title>
    <link rel="icon" href="website/all/pensilajaib.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php include("includes/wa.php"); ?>

    <!-- Header Section -->
    <div class="header-1">
        <div class="col-md-8 offer">
            <marquee behavior="" direction="">
                <h1>SELAMAT DATANG DI PT DUDU DIGITAL INDONESIA</h1>
            </marquee>
        </div>
        <h4> <?php

                if (!isset($_SESSION['customer_email'])) {
                    echo "";
                } else {
                    echo "Users: " . $_SESSION['customer_email'] . "";
                }


                ?></h4>
    </div>
    <header>
        <div class="header-2">
            <nav class="navbar navbar-expand-lg navbar-light" style="background: #0ca6ed;">
                <div class="container-fluid">
                    <a class="navbar-brand me-3" href="index.php">
                        <img src="website/all/pensilajaib.png" alt="Company Logo" width="70" height="70"
                            class="d-inline-block align-text-top">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item"><a class="nav-link active" href="index.php">Beranda</a></li>
                            <li class="nav-item"><a class="nav-link" href="trimer.php">Orderan</a></li>
                            <li class="nav-item"><a class="nav-link" href="contactus.php">Kontak</a></li>
                        </ul>
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item"><a class="nav-link" href="cart.php"><i class="fa fa-shopping-cart"></i>
                                    <?php item(); ?> items in cart</a></li>
                            <!-- <li class="nav-item"><a class="nav-link" href="customer_registration.php"><i class="fa fa-user-plus"></i> Register</a></li> -->
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

    <section class="content" id="content" style="padding: 40px 0;">
        <div class="container" style="max-width: 800px; margin: 0 auto;">
            <h4 class="text-center">Produk Yang Ditawarkan</h4>
        </div>
    </section>

    <div class="container">
        <div class="row mt-4">
            <div class="col-md-3">
                <?php include("includes/sidebar.php"); ?>
            </div>
            <div class="col-md-8">
                <div class="row mt-4" id="contar">
                    <?php
                    if (isset($_GET['cat_id'])) {
                        // Jika ada `cat_id` di URL, ambil produk berdasarkan kategori
                        $cat_id = $_GET['cat_id'];
                        $per_page = 6;
                        $page = isset($_GET['page']) ? $_GET['page'] : 1;
                        $start_from = ($page - 1) * $per_page;

                        // Query untuk produk berdasarkan kategori
                        $get_product = "SELECT * FROM products 
                                    WHERE cat_id = '$cat_id' 
                                    AND product_id NOT IN (
                                        SELECT product_id FROM customer_order WHERE order_status = 'Complete'
                                    ) 
                                    ORDER BY 1 DESC LIMIT $start_from, $per_page";
                    } else {
                        // Query default jika `cat_id` tidak ada di URL
                        $per_page = 6;
                        $page = isset($_GET['page']) ? $_GET['page'] : 1;
                        $start_from = ($page - 1) * $per_page;

                        $get_product = "SELECT * FROM products 
                                    WHERE product_id NOT IN (
                                        SELECT product_id FROM customer_order WHERE order_status = 'Complete'
                                    ) 
                                    ORDER BY 1 DESC LIMIT $start_from, $per_page";
                    }

                    // Jalankan query
                    $run_pro = mysqli_query($con, $get_product);

                    // Cek apakah produk ditemukan
                    if (mysqli_num_rows($run_pro) > 0) {
                        while ($row = mysqli_fetch_array($run_pro)) {
                            $pro_id = $row['product_id'];
                            $pro_title = $row['product_title'];
                            $pro_desc = $row['product_desc'];
                            $pro_price = $row['product_price'];
                            $pro_img1 = $row['product_img1'];

                            // Tampilkan produk
                            echo "<div class='col-12 mb-4'>
                            <div class='card border-light shadow-sm'>
                                <div class='card-body'>
                                    <div class='row align-items-center'>
                                        <div class='col-8'>
                                            <h5 class='card-title'><a href='#' class='text-dark' data-bs-toggle='modal' data-bs-target='#productModal$pro_id'>$pro_title</a></h5>
                                            <p class='card-text text-muted'>Code Client $pro_price</p>
                                        </div>
                                        <div class='col-4 text-end'>
                                            <div class='d-flex justify-content-center mt-3'>
                                                <button type='button' class='btn btn-outline-secondary me-2' data-bs-toggle='modal' data-bs-target='#productModal$pro_id'>View Details</button>
                                                <a href='details.php?pro_id=$pro_id' class='btn btn-primary'><i class='fa fa-shopping-cart'></i> Add to Cart</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>";

                            // Modal untuk detail produk
                            echo "<div class='modal fade' id='productModal$pro_id' tabindex='-1' aria-labelledby='productModalLabel$pro_id' aria-hidden='true'>
                            <div class='modal-dialog'>
                                <div class='modal-content'>
                                    <div class='modal-header'>
                                        <h4>Product Details</h4>
                                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                    </div>
                                    <div class='modal-body'>
                                        <h5 class='modal-title' id='productModalLabel$pro_id'>$pro_title</h5>
                                        <h3 class='description'>Code Client $pro_price</h3>
                                        <p class='description'>$pro_desc</p>
                                    </div>
                                    <div class='modal-footer'>
                                        <form action='details.php?add_cart=$pro_id' method='post'>
                                            <button class='btn btn-primary' type='submit'>
                                                <i class='fa fa-shopping-cart'></i> Ambil Orderannnn
                                            </button>
                                        </form>
                                        <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>";
                        }
                    } else {
                        // Pesan jika tidak ada produk ditemukan
                        echo "<div class='col-12'><p class='text-center'>No products found in this category.</p></div>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>


    <!-- footer section starts  -->
    <?php
    include("includes/footer.php");
    ?>
    <!-- footer section   -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>