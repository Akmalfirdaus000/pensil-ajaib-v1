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

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- owl carousel css file cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">

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

    <!-- header section starts  -->


    <!-- header section End  -->



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
                        <form action="customer_registration.php" method="post" enctype="multipart/form-data">
                            <div class="roup">
                                <label>Customer Name</label>
                                <input type="text" name="c_name" required="" class="form-control">
                            </div>
                            <div class="roup">
                                <label>Customer Email</label>
                                <input type="text" name="c_email" class="form-control" required="">

                            </div>
                            <div class="roup">
                                <label>Customer Password</label>
                                <input type="password" name="c_password" class="form-control" required="">

                            </div>
                            <div class="roup">
                                <label>Country</label>
                                <input type="text" name="c_country" class="form-control" required="">

                            </div>

                            <div class="roup">
                                <label>City</label>
                                <input type="text" name="c_city" class="form-control" required="">

                            </div>
                            <div class="roup">
                                <label>Contact Number</label>
                                <input type="text" name="c_contact" class="form-control" required="">

                            </div>
                            <div class="roup">
                                <label>Address</label>
                                <input type="text" name="c_address" class="form-control" required="">

                            </div>
                            <div class="roup">
                                <label>Image</label>
                                <input type="file" name="c_image" class="form-control" required="">

                            </div>
                            <div class="text-center mt-4">
                                <button type="submit" name="submit" class="btn btn-primary">

                                    <i class="fa fa-user-md"></i> Register
                                </button>
                            </div>

                        </form>
                        <div class="row">
                            <div class="col-12">
                                <hr class="mt-5 mb-4 border-secondary-subtle">
                                <div class="d-flex gap-2 gap-md-4 flex-column flex-md-row justify-content-md-center">
                                    <a href="checkout.php" class="link-secondary text-decoration-none">Login</a>
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

<?php

if (isset($_POST['submit'])) {
  $c_name = $_POST['c_name'];
  $c_email = $_POST['c_email'];
  $c_password = $_POST['c_password'];
  $c_country = $_POST['c_country'];
  $c_city = $_POST['c_city'];
  $c_contact = $_POST['c_contact'];
  $c_address = $_POST['c_address'];
  $c_image = $_FILES['c_image']['name'];
  $c_tmp_image = $_FILES['c_image']['tmp_name'];
  $c_ip = getUserIp();

  move_uploaded_file($c_tmp_image, "customer/customer_images/$c_image");
  $insert_customer = "insert into customers (customer_name, customer_email, customer_pass, customer_country, customer_city, customer_contact, customer_address, customer_image, customer_ip) values('$c_name','$c_email','$c_password','$c_country','$c_city','$c_contact','$c_address','$c_image','$c_ip')";
  $run_customer = mysqli_query($con, $insert_customer);
  $sel_cart = "select * from cart where ip_add='$c_ip'";
  $run_cart = mysqli_query($con, $sel_cart);
  $check_cart = mysqli_num_rows($run_cart);
  if ($check_cart > 0) {
    $_SESSION['customer_email'] = $c_email;
    echo "<script>alert('you have been registered successfully')</script>";
    echo "<script>window.open('checkout.php','_self')</script>";
  } else {
    $_SESSION['customer_email'] = $c_email;
    echo "<script>alert('you have been registered successfully')</script>";
    echo "<script>window.open('index.php','_self')</script>";
  }
}


?>