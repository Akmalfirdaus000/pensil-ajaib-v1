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
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="style.css">

    <style>
        /* Custom styles can be added here */
    </style>
</head>
<body>

<!-- Header Section Starts -->
<header>
    <div class="header-1">
        <a href="index.php" class="logo">
            <img src="website/all/logo5.svg" alt="Logo image" class="hidden-xs">
        </a>
        <div class="col-md-6 offer">
            <a href="#" class="btn btn-success btn-sm">
                <?php
                if (!isset($_SESSION['customer_email'])) {
                    echo "Welcome Guest";
                } else {
                    echo "Welcome: " . $_SESSION['customer_email'];
                }
                ?>
            </a>
            <a id="pr" href="#">
                Shopping Cart Total Price: INR <?php totalPrice(); ?>, Total Items <?php item(); ?>
            </a>
        </div>
    </div>

    <div class="header-2">
        <nav class="navbar">
            <ul>
                <li><a href="index.php">HOME</a></li>
                <li><a href="trimer.php">SHOP</a></li>
                <li><a href="contactus.php">CONTACT</a></li>
                
                <div class="col-md-6">
                    <ul class="menu">
                        <li>
                            <div class="collapse clearfix" id="search">
                                <form class="navbar-form" method="get" action="result.php">
                                    <div class="input-group">
                                        <input type="text" name="user_query" placeholder="search" class="form-control" required>
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
                        <li>
                            <?php
                            if (!isset($_SESSION['customer_email'])) {
                                echo "<a href='checkout.php'>My Account</a>";
                            } else {
                                echo "<a href='customer/my_account.php?my_order' class='active'>My Account</a>";
                            }
                            ?>
                        </li>
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
            </ul>
        </nav>
    </div>
</header>
<!-- Header Section End -->

<section class="content" id="content">
    <div class="container">
        <div class="col-md-12">
            <ul class="breadcrumb">
                <li><span>Ambil Orderan</span></li>
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
  
<div class="col-md-9">
    <?php
    if (!isset($_SESSION['customer_email'])) {
        include('customer/customer_login.php');
    } else {
        include('payment_options.php');
    }
    ?>
</div>

<!-- Footer Section Starts -->
<?php include("includes/footer.php"); ?>
<!-- Footer Section End -->

</body>
</html>
 