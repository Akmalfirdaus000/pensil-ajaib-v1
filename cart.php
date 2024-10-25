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
<header>
    <div class="header-1">
        <!-- <a href="index.php" class="logo">
            <img src="website/all/logo5.svg" alt="Logo image" class="hidden-xs">
        </a> -->
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
            <a id="pr" href="#">
                Shopping Cart Total Price: INR <?php totalPrice(); ?>, Total Items <?php item(); ?>
            </a>
        </div>
    </div>

    <div class="header-2">
        <nav class="navbar"> 
            <ul>
                <li><a href="index.php">Awal</a></li>
                <li><a href="trimer.php">Orderan</a></li>
                <li><a href="contactus.php">Kontak</a></li>

                <div class="col-md-6">
                    <ul class="menu">
                        <!-- <li>
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
                        </li> -->

                        <li>
                            <a href="cart.php">
                                <i class="fa fa-shopping-cart"></i>
                                <span><?php item(); ?> items in cart</span>
                            </a>
                        </li>
                        <!-- <li><a href="customer_registration.php"><i class="fa fa-user-plus"></i>Register</a></li> -->
                        <li>
                            <?php
                            if (!isset($_SESSION['customer_email'])) {
                                echo "<a href='checkout.php'>My Account</a>";
                            } else {
                                echo "<a href='customer/my_account.php?my_order'>My Account</a>";
                            }
                            ?>
                        </li>
                        <li><a class="active" href="cart.php"><i class="fa fa-shopping-cart"></i>Goto Cart</a></li>
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

<section class="content" id="content">
    <div class="container">
        <div class="col-md-12">
            <ul class="breadcrumb">
                <li><span>Cart</span></li>
            </ul>
        </div>
    </div>
</section>  

<div class="col-md-9" id="cart">
    <div class="box">
        <form action="cart.php" method="post" enctype="multipart/form-data">
            <h1>Pengambilan Orderan</h1>
            <?php
            $ip_add = getUserIp();
            $select_cart = "SELECT * FROM cart WHERE ip_add='$ip_add'";
            $run_cart = mysqli_query($con, $select_cart);
            $count = mysqli_num_rows($run_cart);
            ?>
            <p class="text-muted">JUmlah <?php echo $count ?> items </p>
            <div class="table-respon"></div>
            <table class="table">
                <thead>
                    <tr>
                        <th colspan="2">Product</th>
                        <!-- <th>Quantity</th>
                        <th>Unit Price</th> -->
                        <th>judul</th>
                        <th colspan="1">Delete</th>
                        <!-- <th colspan="1">Sub Total</th> -->
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
                        <td><img src="admin_area/product_images/<?php echo $p_img1 ?>"></td>
                        <td><?php echo $p_title ?></td>
                        <td><?php echo $pro_size ?></td>
                        <td><input type="checkbox" name="remove[]" value="<?php echo $pro_id ?>"></td>
                    </tr>
                    <?php 
                        }
                    } 
                    ?>
                </tbody>
            </table>

            <div class="box-footer">
                <div class="pull-left">
                    <a href="index.php" class="btn btn-default">
                        <i class="fa fa-chevron-left"></i> Kembali
                    </a>
                </div>
                <div class="pull-right">
                    <button class="btn btn-default" type="submit" name="update" value="update cart">
                        <i class="fa fa-refresh"> hapus</i>
                    </button>
                    <a href="checkout.php" class="btn btn-primary">
                        proses pengambilan orderan <i class="fa fa-chevron-right"></i>
                    </a>
                </div>
            </div>
        </form>
    </div>

    <?php
    function update_cart() {
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




<!-- Footer Section -->


<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script src="main.js"></script>

</body>
</html>
