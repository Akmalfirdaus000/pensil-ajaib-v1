<?php
session_start();
include("includes/db.php");
include("functions/functions.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pensil Ajaib</title>
    <!-- favicon -->
    <link rel="icon" href="website/all/pensilajaib.ico" type="image/x-icon">

    <!-- Bootstrap 5.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link rel="stylesheet" href="style.css">

    <style>
    /* Custom styles can be added here */
    </style>
</head>

<body>

    <!-- Header Section Starts -->
    <?php
    include("includes/wa.php");
    ?>
    <!-- header section starts  -->
    <div class="header-1">

        <!-- <a href="index.php" class="logo" > <img src="website/all/logo5.svg" alt="Logo image" class="hidden-xs">  </a> -->

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
    <!-- navbar section starts -->
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
                            <!-- <li class="nav-item">
                                <a class="nav-link" href="customer_registration.php">
                                    <i class="fa fa-user-plus"></i> Register
                                </a>
                            </li> -->
                            <li class="nav-item">
                                <?php
                                if (!isset($_SESSION['customer_email'])) {
                                    echo "<a class='nav-link' href='checkout.php'>My Account</a>";
                                } else {
                                    echo "<a class='nav-link' href='customer/my_account.php?my_order'>My Account</a>";
                                }
                                ?>
                            </li>
                            <!-- <li class="nav-item">
                                <a class="nav-link" href="cart.php">
                                    <i class="fa fa-shopping-cart"></i> Goto Cart
                                </a>
                            </li> -->
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
    <section class="content" id="content" style=" padding: 40px 0;">
        <div class="container" style="max-width: 800px; margin: 0 auto;">
            <h4 class="text-center"
                style="font-size: 28px; color: #343a40; margin-bottom: 20px; font-weight: bold; text-transform: uppercase;">
                keranjang
            </h4>
        </div>
    </section>

    <div class=" mx-auto" id="cart">
        <div class="box p-5 shadow-sm border rounded">
            <form action="cart.php" method="post" enctype="multipart/form-data">
                <h1 class="mb-3">Pengambilan Orderan</h1>
                <?php
                $ip_add = getUserIp();
                $select_cart = "SELECT * FROM cart WHERE ip_add='$ip_add'";
                $run_cart = mysqli_query($con, $select_cart);
                $count = mysqli_num_rows($run_cart);
                ?>
                <h4 class="text-muted">Jumlah <?php echo $count ?> items</h4>

                <div class="table-responsive">
                    <table class="table align-middle text-center table-bordered">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">Product</th>
                                <th scope="col">Judul</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $total = 0;
                            while ($row = mysqli_fetch_array($run_cart)) {
                                $pro_id = $row['p_id'];
                                $pro_size = $row['size'];
                                $pro_qty = $row['qty'];
                                $get_product = "SELECT * FROM products WHERE product_id='$pro_id'";
                                $run_pro = mysqli_query($con, $get_product);
                                while ($row = mysqli_fetch_array($run_pro)) {
                                    $p_title = $row['product_title'];
                                    $p_img1 = $row['product_img1'];
                                    $p_price = $row['product_price'];
                                    $sub_total = $row['product_price'] * $pro_qty;
                                    $total += $sub_total;
                            ?>
                            <tr>
                                <td><img src="admin_area/product_images/<?php echo $p_img1 ?>" class="img-fluid"
                                        style="max-width: 80px;"></td>
                                <td><?php echo $p_title ?></td>

                                <td><input type="checkbox" name="remove[]" value="<?php echo $pro_id ?>"
                                        class="form-check-input"></td>
                            </tr>
                            <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <a href="index.php" class="btn btn-outline-secondary">
                        <i class="fa fa-chevron-left"></i> Kembali
                    </a>
                    <div>
                        <button class="btn btn-outline-danger" type="submit" name="update" value="update cart">
                            <i class="fa fa-trash-alt"></i> Hapus
                        </button>
                        <a href="checkout.php" class="btn btn-primary">
                            Proses Pengambilan Orderan <i class="fa fa-chevron-right"></i>
                        </a>
                    </div>
                </div>
            </form>
        </div>

        <?php
        function update_cart()
        {
            global $con;
            if (isset($_POST['update'])) {
                foreach ($_POST['remove'] as $remove_id) {
                    $delete_product = "DELETE FROM cart WHERE p_id='$remove_id'";
                    $run_del = mysqli_query($con, $delete_product);
                    if ($run_del) {
                        echo "<script>window.open('cart.php','_self')</script>";
                    }
                }
            }
        }
        echo @$up_cart = update_cart();
        ?>
    </div>



    <!-- footer section starts  -->
    <?php
    include("includes/footer.php");
    ?>
    <!-- footer section   -->


    <!-- Footer Section -->
    <!-- Bootstrap 5.3 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="main.js"></script>

</body>

</html>