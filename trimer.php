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

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- owl carousel css file cdn link  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">

  <!-- font awesome cdn link  -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

  <!-- custom css file link  -->
  <link rel="stylesheet" href="style.css">
  <style>


  </style>

</head>

<body>

  <!-- header section starts  -->

  <div class="header-1">

    <!-- <a href="index.php" class="logo" > <img src="website/all/logo5.svg" alt="Logo image" class="hidden-xs">  </a> -->

    <div class="col-md-8 offer">
      <marquee behavior="" direction="">
        <h1>SELAMAT DATANG DI PT DUDU DIGITAL INDONESIA</h1>
      </marquee>
    </div>

  </div>
  <header>
    <div class="header-2">
      <nav class="navbar navbar-expand-lg navbar-light " style="background: #0ca6ed;">
        <div class="container-fluid">
          <!-- Company Logo on the left -->
          <a class="navbar-brand me-3" href="index.php">
            <img src="website/all/pensilajaib.png" alt="Company Logo" width="70" height="70" class="d-inline-block align-text-top">
          </a>

          <!-- Toggle button for mobile view -->
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
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



  <!-- header section End  -->

  <section class="content" id="content" style=" padding: 40px 0;">
    <div class="container" style="max-width: 800px; margin: 0 auto;">
      <h4 class="text-center" style="font-size: 28px; color: #343a40; margin-bottom: 20px; font-weight: bold; text-transform: uppercase;">
        Produk Yang Ditawarkan
      </h4>
    </div>
  </section>




  <div class="container">
    <div class="row mt-4">
      <div class="col-md-3">
        <?php include("includes/sidebar.php"); ?>
      </div>

      <div class="col-md-8">
        <!-- Adjusted column for products -->
        <div class="row mt-4" id="contar">
          <?php
          if (!isset($_GET['p_cat'])) {
            if (!isset($_GET['cat_id'])) {
              $per_page = 6;
              $page = isset($_GET['page']) ? $_GET['page'] : 1;
              $start_from = ($page - 1) * $per_page;
              $get_product = "SELECT * FROM products ORDER BY 1 DESC LIMIT $start_from, $per_page";
              $run_pro = mysqli_query($con, $get_product);
              while ($row = mysqli_fetch_array($run_pro)) {
                $pro_id = $row['product_id'];
                $pro_title = $row['product_title'];
                $pro_price = $row['product_price'];
                $pro_img1 = $row['product_img1'];

                echo "<div class='col-12 mb-4'>
                                    <div class='card border-light shadow-sm'>
                                        <div class='card-body'>
                                            <div class='row align-items-center'>
                                                <div class='col-8'>
                                                    <h5 class='card-title'><a href='#' class='text-dark' data-bs-toggle='modal' data-bs-target='#productModal$pro_id'>$pro_title</a></h5>
                                                    <p class='card-text text-muted'>INR $pro_price</p>
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

                // Modal Structure
                echo "<div class='modal fade' id='productModal$pro_id' tabindex='-1' aria-labelledby='productModalLabel$pro_id' aria-hidden='true'>
                                    <div class='modal-dialog'>
                                        <div class='modal-content'>
                                            <div class='modal-header'>
                                                <h5 class='modal-title' id='productModalLabel$pro_id'>$pro_title</h5>
                                                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                            </div>
                                            <div class='modal-body'>
                                                <h4>Product Details</h4>
                                                <p class='description'>INR $pro_price</p>
                                                <p class='description'>More details about the product can go here.</p>
                                            </div>
                                            <div class='modal-footer'>
                                                <form action='details.php?add_cart=$pro_id' method='post' class='order-form'>
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

              // Pagination
              $query = "SELECT * FROM products";
              $result = mysqli_query($con, $query);
              $total_record = mysqli_num_rows($result);
              $total_pages = ceil($total_record / $per_page);
              echo "<nav aria-label='Page navigation' class='mt-4'>
                                <ul class='pagination justify-content-center'>";
              echo "<li class='page-item'><a class='page-link' href='trimer.php?page=1'>First Page</a></li>";
              for ($i = 1; $i <= $total_pages; $i++) {
                echo "<li class='page-item'><a class='page-link' href='trimer.php?page=" . $i . "'>" . $i . "</a></li>";
              }
              echo "<li class='page-item'><a class='page-link' href='trimer.php?page=$total_pages'>Last Page</a></li>";
              echo "</ul></nav>";
            }
          }
          ?>
        </div>
      </div>
    </div>
  </div>



  <style>
    .boxi {
      text-align: center;
      margin-bottom: 20px;
      padding: 20px;
      background-color: #f8f9fa;
      border-radius: 8px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .card {
      transition: transform 0.2s;
    }

    .card:hover {
      transform: scale(1.05);
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
    }

    .card-title a {
      text-decoration: none;
    }

    .card-title a:hover {
      color: #007bff;
      /* Change to your desired hover color */
    }

    .pagination .page-link {
      color: #007bff;
    }

    .pagination .page-item.active .page-link {
      background-color: #007bff;
      border-color: #007bff;
    }

    .pagination .page-item:hover .page-link {
      background-color: #e9ecef;
    }
  </style>

  <!-- footer section starts  -->



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
            <a href="https://www.facebook.com/profile.php?id=100093616384522"><i class="fab fa-facebook-f fa-2x" style="color: #3b5998;"></i></a>
            <a href="mailto:youremail@example.com"><i class="fas fa-envelope fa-2x" style="color: #0084b4;"></i></a>
            <a href="https://www.instagram.com/pensilajaib.std/"><i class="fab fa-instagram fa-2x" style="color:   #E1306C;"></i></a>


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

  <!-- footer section ends -->
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>



</html>