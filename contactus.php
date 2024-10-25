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

    <!-- custom css file link  -->
    <link rel="stylesheet" href="style.css">
  <style>
.admin-container {
  margin: auto;
  margin-top:20rem ;
  background-color: #ffffff;
  padding: 20px;
  border-radius: 12px;
  box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
  max-width: 750px;
  text-align: center;
}

/* Admin Card Styles */
.admin-card {
  background: linear-gradient(90deg, #ff6a88, #ff99ac);
  color: #ffffff;
  padding: 10px;
  margin: 10px 0;
  border-radius: 8px;
  font-size: 18px;
  position: relative;
}

/* Icon Before Each Admin */
.admin-card::before {
  content: "👤";
  position: absolute;
  left: -35px;
  top: 50%;
  transform: translateY(-50%);
  font-size: 20px;
}

  </style>
 
</head>
<body>

<!-- header section starts  -->

<header>

<div class="header-1">

    <!-- <a href="index.php" class="logo" > <img src="website/all/logo5.svg" alt="Logo image" class="hidden-xs">  </a> -->
                               
<div class="col-md-6 offer">
    <a href="#" class="btn btn-sucess btn-sm">
          <?php

        if (!isset($_SESSION['customer_email'])){
        echo "Welcome Guest";
      }else{
      echo "Welcome: " .$_SESSION['customer_email'] . "";
    }


        ?>
    </a>
<a id="pr" href="#"> Shopping Cart Total Price: INR <?php totalPrice(); ?>, Total Items <?php item(); ?></a>
</div>
  
</div>

<div class="header-2">
   

<nav class="navbar"> 


     <ul >
       
            <li><a  href="index.php">Awal</a></li>
            <li><a  href="trimer.php">Orderan</a></li>
           
            <li><a class="active" href="contactus.php">Kontak</a></li>
          
 
       <div class="col-md-6">
        <ul class="menu">
            <!-- <li>
                         <div class="collapse clearfix" id="search">
                             <form class="navbar-form" method="get" action="result.php">
                                 <div class="input-group">
                                     <input type="text" name="user_query" placeholder="search" class="form-control" required="">
                                     <button type="submit" value="search" name="search" class="btn btn-primary">
                                         <i class="fa fa-search"></i>
                                     </button>
                                 </div>
                             </form>
                         </div>
                   </li> -->



                <li>
                  <a href="cart.php" class="">
                    <i class="fa fa-shopping-cart"></i>
                      <span><?php item(); ?> items in cart</span>
                        </a>
                </li>
                   

                   <!-- <li>
                   <a  href="customer_registration.php"><i class="fa fa-user-plus"></i>Register</a></li> -->
                   <li>
                   <?php

                    if (!isset($_SESSION['customer_email'])){
                    echo "<a href='checkout.php'>My Account</a>";

                         } else{
                    
                    echo "<a href='customer/my_account.php?my_order'>My Account</a>";
                
                         }

                    ?></li> 
                     
                   <li>
                   <a href="cart.php"><i class="fa fa-shopping-cart"></i>Goto Cart</a></li>
                    
                   <li>
                     <?php

                    if (!isset($_SESSION['customer_email'])){
                    echo "<a href='checkout.php'>Login</a>";

                         } else{
                    
                    echo "<a href='logout.php'>Logout</a>";
                
                         }

                    ?></li>
             </ul>
       </div>
</ul>



</nav></div></header>

<!-- header section End  -->

 
        <div class="admin-container">
          <h1>Kontak Admin</h1>
  <h2 class="admin-card">Admin 1 Akmal : 0829192192192</h2>
  <h2 class="admin-card">Admin 2 Akmal : 0829192192192</h2>
  <h2 class="admin-card">Admin 3 Akmal : 0829192192192</h2>
</div>
    

  ?>