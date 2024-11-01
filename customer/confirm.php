<?php
session_start();
if (!isset($_SESSION['customer_email'])) {
    echo "<script>window.open('../checkout.php','_self')</script>";
} else {
    include("../includes/db.php");

    include("../functions/functions.php");

    if (isset($_GET['order_id'])) {
        $order_id = $_GET['order_id'];
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pensil Ajaib</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- favicon -->
    <link rel="icon" href="../website/all/pensilajaib.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- owl carousel css file cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <style>


    </style>

</head>

<body>

    <!-- header section starts  -->

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
                        <img src="../website/all/pensilajaib.png" alt="Company Logo" width="70" height="70"
                            class="d-inline-block align-text-top">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item"><a class="nav-link active" href="../index.php">Beranda</a></li>
                            <li class="nav-item"><a class="nav-link" href="../trimer.php">Orderan</a></li>
                            <li class="nav-item"><a class="nav-link" href="../contactus.php">Kontak</a></li>
                        </ul>
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item"><a class="nav-link" href="../cart.php"><i
                                        class="fa fa-shopping-cart"></i>
                                    <?php item(); ?> items in cart</a></li>
                            <!-- <li class="nav-item"><a class="nav-link" href="customer_registration.php"><i class="fa fa-user-plus"></i> Register</a></li> -->
                            <li class="nav-item">
                                <?php
                                    if (!isset($_SESSION['customer_email'])) {
                                        echo "<a class='nav-link' href='../checkout.php'>My Account</a>";
                                    } else {
                                        echo "<a class='nav-link' href='../customer/my_account.php?my_order'>My Account</a>";
                                    }
                                    ?>
                            </li>
                            <li class="nav-item">
                                <?php
                                    if (!isset($_SESSION['customer_email'])) {
                                        echo "<a class='nav-link' href='../checkout.php'>Login</a>";
                                    } else {
                                        echo "<a class='nav-link' href='../logout.php'>Logout</a>";
                                    }
                                    ?>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>

    <!-- header section End  -->

    <section class="content" id="content" style="padding: 40px 0;">
        <div class="container" style="max-width: 800px; margin: 0 auto;">
            <h4 class="text-center">Konfirmasi Data Orderan</h4>
        </div>
    </section>


    <div class="co-9">
        <div class="">
            <h1 text-align="center">Silahkan Confirmasi Orderan Jika Sudah Selesai</h1>
            <form action="confirm.php?update_id=<?php echo $order_id; ?>" method="post" enctype="multipart/form-data">
                <div class="form-group mb-3">
                    <label for="invoice_number" class="form-label">Nama Karyawan</label>
                    <input type="text" id="invoice_number" class="form-control" name="invoice_number" required>
                </div>
                <div class="form-group mb-3">
                    <label for="amount" class="form-label">Code Client</label>
                    <input type="text" id="amount" class="form-control" name="amount" required>
                </div>
                <div class="form-group mb-3">
                    <label for="payment_mode" class="form-label">Bukti</label>
                    <select id="payment_mode" class="form-control" name="payment_mode">
                        <option>Kirim Wa</option>
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label for="date" class="form-label">Waktu Penyelesaian</label>
                    <input type="date" id="date" class="form-control" name="date" required>
                </div>
                <div class="text-center">
                    <button type="submit" name="confirm_payment"
                        class="btn btn-primary btn-lg w-100">Konfirmasi</button>
                </div>
            </form>


            <?php
                if (isset($_POST['confirm_payment'])) {
                    $update_id = $_GET['update_id'];
                    $invoice_number = $_POST['invoice_number'];
                    $amount = $_POST['amount'];
                    $payment_mode = $_POST['payment_mode'];
                    $trfr_number = $_POST['trfr_number'];
                    $date = $_POST['date'];
                    $complete = "Complete";

                    // Simpan data pembayaran
                    $insert = "INSERT INTO payments (invoice_id, amount, payment_mode, ref_no, payment_date) 
                       VALUES ('$invoice_number', '$amount', '$payment_mode', '$trfr_number', '$date')";
                    mysqli_query($con, $insert);

                    // Perbarui status pesanan
                    $update_q = "UPDATE customer_order SET order_status='$complete' WHERE order_id='$update_id'";
                    mysqli_query($con, $update_q);

                    echo "<script>alert('Your order has been received');</script>";
                    echo "<script>window.open('my_account.php?order', '_self');</script>";
                }
                ?>
        </div>
    </div>




    <div class="content1" id="content1">
        <div class="container1">
            <div class="col-md-3">
                <?php
                    include("includes/sidebar.php");
                    ?>

            </div>

        </div>
    </div>
    <!-- footer section starts  -->
    <?php
        include("../includes/footer.php");
        ?>
    <!-- footer section   -->


    <?php } ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>