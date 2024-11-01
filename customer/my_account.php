<?php
session_start();
if (!isset($_SESSION['customer_email'])) {
    echo "<script>window.open('../checkout.php','_self')</script>";
} else {

    include("../includes/db.php");
    include("../functions/functions.php");
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

        <!-- Bootstrap 5.3 CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- owl carousel css file cdn link  -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">

        <!-- font awesome cdn link  -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">

        <!-- custom css file link  -->
        <link rel="stylesheet" href="../style.css">
        <style>


        </style>

    </head>

    <body>

        <!-- header section starts  -->

        <?php
        include(".././includes/wa.php");
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
                            <img src=".././website/all/pensilajaib.png" alt="Company Logo" width="70" height="70" class="d-inline-block align-text-top">
                        </a>

                        <!-- Toggle button for mobile view -->
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <!-- Collapsible content -->
                        <div class="collapse navbar-collapse" id="navbarContent">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0" style="font-size: 15px;">
                                <li class="nav-item">
                                    <a class="nav-link active" href="../index.php">Beranda</a>
                                </li>
                                <!-- <li class="nav-item">
                                <a class="nav-link" href="#footer">Tentang Kita</a>
                            </li> -->
                                <li class="nav-item">
                                    <a class="nav-link" href="../trimer.php">Orderan</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="../contactus.php">Kontak</a>
                                </li>
                            </ul>
                            <!-- Right-aligned items -->
                            <ul class="navbar-nav ms-auto mb-2 mb-lg-0" style="font-size: 15px;">
                                <li class="nav-item">
                                    <a class="nav-link" href="../cart.php">
                                        <i class="fa fa-shopping-cart"></i>
                                        <span><?php item(); ?> items in cart</span>
                                    </a>
                                </li>
                                <!-- <li class="nav-item">
                                <a class="nav-link" href="../customer_registration.php">
                                    <i class="fa fa-user-plus"></i> Register
                                </a>
                            </li> -->
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

        <section class="content" id="content" style=" padding: 40px 0;">
            <div class="container" style="max-width: 800px; margin: 0 auto;">
                <h4 class="text-center" style="font-size: 28px; color: #343a40; margin-bottom: 20px; font-weight: bold; text-transform: uppercase;">
                    My Account
                </h4>
            </div>
        </section>
        <div>
            <div class="col-m-9" style="color: #000;">



                <?php
                if (isset($_GET['my_order'])) {
                    include("my_order.php");
                }
                ?>

                <!-- including my_order.php End  -->

                <!-- including payoffline.php page starts  -->
                <!-- <?php

                        if (isset($_GET['pay_offline'])) {
                            include("pay_offline.php");
                        }

                        ?> -->

                <!-- including payoffline.php page End  -->
                <!-- including Edit_account.php page start  -->
                <?php
                if (isset($_GET['edit_act'])) {
                    include("edit_act.php");
                }
                ?>

                <!-- including Edit_account.php page End  -->
                <!-- including change_pass.php page Start  -->
                <?php
                if (isset($_GET['change_pass'])) {
                    include("change_password.php");
                }
                ?>

                <!-- including change_pass.php page End  -->
                <!-- including delete_pass.php page Start  -->

                <!-- <?php
                        if (isset($_GET['delete_ac'])) {
                            include("delete_ac.php");
                        }
                        ?> -->

                <!-- including delete_pass.php page End  -->
            </div>



            <div class="content1" id="content1">
                <div class="container1">
                    <div class="col-md-5">
                        <?php
                        include("includes/sidebar.php");
                        ?>

                    </div>

                </div>
            </div>
        </div>

        <!-- footer section starts  -->
        <?php
        include("../includes/footer.php");
        ?>
        <!-- footer section   -->

    <?php } ?>
    </body>

    </html>