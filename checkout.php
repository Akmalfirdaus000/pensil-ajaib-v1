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

    <!-- Meta viewport for responsiveness -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Owl Carousel CSS CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">

    <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

    <style>
    * {
        font-family: Poppins;
    }

    .primary-color {
        color: #f15d30;
    }

    .btn-primaryy,
    .btn-primaryy:hover {
        background-color: #f15d30;
    }

    /* Untuk memastikan background image tampil dengan baik */
    .bg-image {
        background-image: url('website/all/login.jpg');
        background-size: cover;
        /* Menjaga rasio gambar tetap proporsional */
        background-position: center;
        /* Memposisikan gambar di tengah */
        background-repeat: no-repeat;
        /* Gambar tidak akan diulang */
        min-height: 100vh;
        /* Menyesuaikan dengan tinggi perangkat */
    }
    </style>
</head>

<body>

    <div class="bg-image">
        <div class="container py-5">
            <div class="row justify-content-md-center">
                <div class="col-12 col-md-11 col-lg-8 col-xl-7 col-xxl-6">
                    <div class="bg-white p-4 p-md-5 rounded shadow-md">
                        <div class="row">
                            <div class="col-12">
                                <div class="text-center mb-3">
                                    <p class="fw-bold fs-3 mb-1">Pensil Ajaib</p>
                                    <p class="mb-2 primary-color fst-normal text-uppercase fw-medium "
                                        style="font-size: 12px;">PT. Dudu Digital Indonesia</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <?php
                            if (!isset($_SESSION['customer_email'])) {
                                include('customer/customer_login.php');
                            } else {
                                include('payment_options.php');
                            }
                            ?>
                        </div>
                        <div class="row mb-4">
                            <div class="col-12">
                                <hr class="mt-5 mb-4 border-secondary-subtle">
                                <div class="d-flex gap-2 gap-md-4 flex-column flex-md-row justify-content-md-center">
                                    <a href="customer_registration.php"
                                        class="link-secondary text-decoration-none">Daftar
                                        Sekarang</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>

</html>