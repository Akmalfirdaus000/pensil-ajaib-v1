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

    <!-- Bootstrap 5.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- font awesome cdn link (for icons) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">

    <!-- owl carousel css file cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">

    <!-- custom css file link -->
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <a href="https://api.whatsapp.com/send?phone=51955081075&text=Hola%21%20Quisiera%20m%C3%A1s%20informaci%C3%B3n%20sobre%20Varela%202."
        class="float" target="_blank">
        <i class="fa fa-whatsapp my-float"></i>
    </a>

    <!-- header section starts  -->
    <div class="header-1">

        <!-- <a href="index.php" class="logo" > <img src="website/all/logo5.svg" alt="Logo image" class="hidden-xs">  </a> -->

        <div class="col-md-8 offer">
            <marquee behavior="" direction="">
                <h1>SELAMAT DATANG DI PT DUDU DIGITAL INDONESIA</h1>
            </marquee>
        </div>

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



    <!-- end navbar sections  -->


    <!-- home section starts  -->
    <section class="home" id="home" style="margin-top: 150px;">

        <h1 class="heading text-center mb-4">
            <span style="color: #000;">BEST OFFERS FOR YOU</span>
        </h1>

        <div class="slideshow-container position-relative overflow-hidden">
            <!-- dynamic hairstyle images section starts -->

            <?php
            // Query untuk slider pertama
            $get_slider = "select * from slider LIMIT 0,1";
            $run_slider = mysqli_query($con, $get_slider);
            while ($row = mysqli_fetch_array($run_slider)) {
                $slider_name = $row['slider_name'];
                $slider_image = $row['slider_image'];
                $slider_url = $row['slider_url'];

                echo "<div class='mySlides fade'>
                <a href='$slider_url'>
                    <img src='admin_area/slider_images/$slider_image' class='img-fluid w-100'>
                </a>
              </div>";
            }
            ?>

            <?php
            // Query untuk slider lainnya
            $get_slider = "select * from slider LIMIT 1,10";
            $run_slider = mysqli_query($con, $get_slider);
            while ($row = mysqli_fetch_array($run_slider)) {
                $slider_name = $row['slider_name'];
                $slider_image = $row['slider_image'];
                $slider_url = $row['slider_url'];

                echo "<div class='mySlides fade'>
                <a href='$slider_url'>
                    <img src='admin_area/slider_images/$slider_image' class='img-fluid w-100'>
                </a>
              </div>";
            }
            ?>

            <!-- dynamic hairstyle images section End -->

            <!-- Navigasi Prev dan Next -->
            <a class="prev position-absolute top-50 start-0 translate-middle-y" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next position-absolute top-50 end-0 translate-middle-y" onclick="plusSlides(1)">&#10095;</a>
        </div>

        <br>

        <!-- Indicator Dot -->
        <div class="text-center">
            <span class="dot" onclick="currentSlide(1)"></span>
            <span class="dot" onclick="currentSlide(2)"></span>
            <span class="dot" onclick="currentSlide(3)"></span>
            <span class="dot" onclick="currentSlide(4)"></span>
            <span class="dot" onclick="currentSlide(5)"></span>
        </div>

    </section>


    <!-- new this week section start -->
    <!-- hot start -->

    <!-- hot start -->
    <div class="hot py-5">
        <div class="container">
            <h2 class="text-center mb-4">Latest this Week</h2>

            <!-- dynamic latest this week images section start -->
            <div class="row justify-content-center row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                <?php
                getPro(); // Memanggil fungsi untuk menampilkan produk terbaru
                ?>
            </div>
        </div>
    </div>
    <!-- hot End -->

    <!-- dynamic latest this week images section End  -->






    <!-- new this week section End -->




    <!-- gallery section ends -->





    <!-- footer section starts  -->

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
                        <a href="https://www.facebook.com/profile.php?id=100093616384522"><i
                                class="fab fa-facebook-f fa-2x" style="color: #3b5998;"></i></a>
                        <a href="mailto:youremail@example.com"><i class="fas fa-envelope fa-2x"
                                style="color: #0084b4;"></i></a>
                        <a href="https://www.instagram.com/pensilajaib.std/"><i class="fab fa-instagram fa-2x"
                                style="color:   #E1306C;"></i></a>


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
    <!-- footer section ends -->

    </nav>
    </div>
    </header>



    <!-- Bootstrap 5.3 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Your custom scripts (if needed) -->
    <script src="script.js"></script>


    <!-- jquery cdn link  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- owl carousel js file cdn link  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

    <!-- custom js file link  -->
    <script src="main/js.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script>
    var slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    function currentSlide(n) {
        showSlides(slideIndex = n);
    }

    function showSlides(n) {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("dot");
        if (n > slides.length) {
            slideIndex = 1
        }
        if (n < 1) {
            slideIndex = slides.length
        }
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex - 1].style.display = "block";
        dots[slideIndex - 1].className += " active";

    }
    </script>



</body>

</html>