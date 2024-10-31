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
    <!-- favicon -->
    <link rel="icon" href="website/all/pensilajaib.ico" type="image/x-icon">

    <!-- owl carousel css file cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="style.css">

    <!-- Bootstrap 5.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    .admin-container {
        margin: auto;
        margin-top: 20rem;
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

    </div>
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

    <!-- header section End  -->

    <section class="content" id="content">
        <div class="container">
            <div class="col-md-12">
                <ul class="breadcrumb">

                    <li><span class="text-dark">Kontak Kami</span></li>


                </ul>

            </div>
        </div>
    </section>

    <div class="container mt-5 me-5">
        <div class="row">
            <!-- Kolom Kiri: Embed Google Maps -->
            <div class="col-md-5">
                <div style="box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2); border-radius: 8px; overflow: hidden;">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15957.191461495946!2d100.3719353!3d-0.9254594!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2fd4b911b9f4f3e5%3A0xe347c20e73eeae5f!2sHem&#39;s%20Institute!5e0!3m2!1sid!2sid!4v1729843495349!5m2!1sid!2sid"
                        width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>

            <!-- Kolom Kanan: Ikon Media Sosial -->
            <div class="col-md-7 d-flex flex-column align-items-start justify-content-center">
                <div>
                    <h4 style="color: #007bff; margin-bottom: 16px;">Hubungi Kami</h4>

                    <div class="row">
                        <!-- Card 1 -->
                        <div class="col-md-4 mb-3">
                            <a href="https://wa.me/6281374660847" target="_blank" style="text-decoration: none;">
                                <div class="card shadow-sm"
                                    style="background-color: #007bff; color: white; border: none;">
                                    <div class="card-body">
                                        <h5 class="card-title" style="font-weight: bold;">Kode: D1</h5>
                                        <p class="card-text">Nama Admin: Admin Dudu Utama (kantor)</p>
                                        <p class="card-text">Nomor Admin: 081374660847</p>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <!-- Card 2 -->
                        <div class="col-md-4 mb-3">
                            <a href="https://wa.me/6285364211752" target="_blank" style="text-decoration: none;">
                                <div class="card shadow-sm"
                                    style="background-color: #007bff; color: white; border: none;">
                                    <div class="card-body">
                                        <h5 class="card-title" style="font-weight: bold;">Kode: Y1</h5>
                                        <p class="card-text">Nama Admin: Admin Yolla</p>
                                        <p class="card-text">Nomor Admin: 085364211752</p>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <!-- Card 3 -->
                        <div class="col-md-4 mb-3">
                            <a href="#" target="_blank" style="text-decoration: none;">
                                <div class="card shadow-sm"
                                    style="background-color: #007bff; color: white; border: none;">
                                    <div class="card-body">
                                        <h5 class="card-title" style="font-weight: bold;">Kode: N1</h5>
                                        <p class="card-text">Nama Admin: Admin Nadya</p>
                                        <p class="card-text">Nomor Admin: -</p>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <!-- Card 4 -->
                        <div class="col-md-4 mb-3">
                            <a href="https://wa.me/6282285959012" target="_blank" style="text-decoration: none;">
                                <div class="card shadow-sm"
                                    style="background-color: #007bff; color: white; border: none;">
                                    <div class="card-body">
                                        <h5 class="card-title" style="font-weight: bold;">Kode: DF1</h5>
                                        <p class="card-text">Nama Admin: Admin Difa</p>
                                        <p class="card-text">Nomor Admin: 082285959012</p>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <!-- Card 5 -->
                        <div class="col-md-4 mb-3">
                            <a href="https://wa.me/6282389135817" target="_blank" style="text-decoration: none;">
                                <div class="card shadow-sm"
                                    style="background-color: #007bff; color: white; border: none;">
                                    <div class="card-body">
                                        <h5 class="card-title" style="font-weight: bold;">Kode: M1</h5>
                                        <p class="card-text">Nama Admin: Admin Melvi</p>
                                        <p class="card-text">Nomor Admin: 082389135817</p>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <!-- Card 6 -->
                        <div class="col-md-4 mb-3">
                            <a href="https://wa.me/6285274799098" target="_blank" style="text-decoration: none;">
                                <div class="card shadow-sm"
                                    style="background-color: #007bff; color: white; border: none;">
                                    <div class="card-body">
                                        <h5 class="card-title" style="font-weight: bold;">Kode: K1</h5>
                                        <p class="card-text">Nama Admin: Admin Keke</p>
                                        <p class="card-text">Nomor Admin: 085274799098</p>
                                    </div>
                                </div>
                            </a>
                        </div>

                    </div>
                </div>
            </div>


        </div>
    </div>
    </div>


    <!-- footer section starts  -->
    <?php
    include("includes/footer.php");
    ?>
    <!-- footer section   -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>

<?php
if (isset($_POST['submit'])) {
    $senderName = $_POST['name'];
    $senderEmail = $_POST['email'];
    $senderSubject = $_POST['subject'];

    $receiverEmail = "rakeshalakh@gmail.com";
    mail($receiverEmail, $senderName, $senderSubject, $senderMassage, $senderEmail);
    //customer mail
    $email = $_POST['email'];
    $subject = "Welcome to our website";
    $msg = "I shall get you soon , thanks for sending email";
    $from = "rakeshalakh@gmail.com";
    mail($email, $subject, $msg, $from);
    echo "<h2 align='center'>Your mail sent</h2>";
}
?>
>>>>>>> 49c9a174dbf57eb62b69ca30e32ac2435e2777fe