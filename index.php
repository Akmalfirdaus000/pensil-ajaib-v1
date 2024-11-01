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
            <span style="color: #000;">PENGUMUMAN</span>
        </h1>

        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <!-- Carousel indicators -->
            <div class="carousel-indicators">
                <?php
                // Fetch the number of slides
                $get_slider_count = "SELECT COUNT(*) AS count FROM slider";
                $run_slider_count = mysqli_query($con, $get_slider_count);
                $slider_count = mysqli_fetch_assoc($run_slider_count)['count'];

                for ($i = 0; $i < $slider_count; $i++) {
                    $active_class = $i === 0 ? 'active' : '';
                    echo "<button type='button' data-bs-target='#carouselExampleIndicators' data-bs-slide-to='$i' class='$active_class' aria-label='Slide " . ($i + 1) . "'></button>";
                }
                ?>
            </div>

            <!-- Carousel inner -->
            <div class="carousel-inner">
                <?php
                // Query to get all slider images
                $get_slider = "SELECT * FROM slider";
                $run_slider = mysqli_query($con, $get_slider);
                $is_first = true;

                while ($row = mysqli_fetch_array($run_slider)) {
                    $slider_image = $row['slider_image'];
                    $slider_url = $row['slider_url'];
                    $active_class = $is_first ? 'active' : '';
                    $is_first = false;

                    echo "<div class='carousel-item $active_class'>
                    <a href='$slider_url'>
                    <img src='admin_area/slider_images/$slider_image' class='d-block w-100' alt='Slider Image' style='object-fit: cover;'>

                    </a>
                  </div>";
                }
                ?>
            </div>

            <!-- Carousel controls -->
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>


    <!-- new this week section start -->
    <!-- hot start -->

    <!-- hot start -->
    <div class="hot py-5">
        <div class="container">
            <h2 class="text-center mb-4">PERATURAN DASAR KANTOR</h2>
            <div class="row">
                <div class="col-md-6">
                    <div class="accordion" id="accordionPanelsStayOpenExampleLeft">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOperationalHours" aria-expanded="true"
                                    aria-controls="collapseOperationalHours">
                                    Jam Operasional Kerja
                                </button>
                            </h2>
                            <div id="collapseOperationalHours" class="accordion-collapse collapse show">
                                <div class="accordion-body">
                                    <h5>Jam buka setiap hari: 09:00 WIB – 21:00 WIB</h5>
                                    <h6>Jadwal Masuk</h6>
                                    <ul>
                                        <li>Admin Marketing Shift 1 TIM terdiri dari 2-3 orang.</li>
                                        <li>Shift 1: 09:00 WIB s/d 18:00 WIB.</li>
                                        <li>Shift 2: 13:00 WIB s/d 21:00 WIB.</li>
                                        <li>Libur 1x seminggu ditentukan secara tim.</li>
                                        <li>Jika 1 orang dalam tim libur, maka shift yang diterapkan adalah shift 1.
                                        </li>
                                        <li>Izin libur wajib konfirmasi max 1x24 jam sebelum libur kepada manager.</li>
                                        <li>Izin libur sakit wajib melampirkan surat keterangan sakit.</li>
                                    </ul>
                                    <br>
                                    <h6>Peraturan Denda Telat</h6>
                                    <ul>
                                        <li>Shift 1: 09:05 lewat 5 menit denda Rp 5,000,-.</li>
                                        <li>Shift 2: 13:00 lewat 5 menit denda Rp 5,000,-.</li>
                                        <li>Tidak boleh membeli sarapan di saat sudah ceklog di kantor.</li>
                                        <li>Jatah istirahat boleh 1 jam per hari.</li>
                                        <li>Jadwal sholat 15 menit secara bergantian.</li>
                                        <li>Izin keluar jika ada keperluan wajib izin manager pada saat jatah istirahat.
                                        </li>
                                    </ul>
                                    <br>
                                    <h6> Peraturan Pulang</h6>
                                    <ul>
                                        <li>Sebelum pulang wajib membersihkan tempat kerja.</li>
                                        <li>Mengirimkan laporan ke grup.</li>
                                        <li>Ceklog wajib tepat sesuai jadwal pulang shift.</li>
                                        <li>Izin lembur akan ada pemberitahuan dan konfirmasi dari manager.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#panelsStayOpen-collapseDressCode" aria-expanded="false"
                                    aria-controls="panelsStayOpen-collapseDressCode">
                                    Atribut Berpakaian
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseDressCode" class="accordion-collapse collapse">
                                <div class="accordion-body">
                                    <h5>Masa Pembelajaran :Baju Putih, Celana/Rok Hitam</h5>


                                    <h5>Hari Normal</h5>
                                    <ul>
                                        <li><strong>Senin:</strong> Baju Putih</li>
                                        <li><strong>Selasa:</strong> Bebas</li>
                                        <li><strong>Rabu:</strong> Bebas</li>
                                        <li><strong>Kamis:</strong> Baju Hitam</li>
                                        <li><strong>Jumat:</strong> Batik</li>
                                        <li><strong>Sabtu:</strong> Bebas</li>
                                        <li><strong>Minggu:</strong> Bebas</li>
                                    </ul>

                                    <p>Wajib Memakai ID Card</p>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#panelsStayOpen-collapseTwoLeft" aria-expanded="false"
                                    aria-controls="panelsStayOpen-collapseTwoLeft">
                                    Proses & Jenjang Karier
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseTwoLeft" class="accordion-collapse collapse">
                                <div class="accordion-body">
                                    <strong>Proses & Jenjang Karier</strong><br>
                                    - <strong>Tahap 1</strong>: Mengikuti Pelatihan selama 1 Minggu (materi lengkap dan
                                    kuliah selama 3 hari, kerja praktek selama 2 hari, dan ujian selama 1 hari). Jika
                                    lolos, akan masuk ke tahap training.<br>
                                    - <strong>Tahap 2</strong>: Trainer. Bekerja penuh sesuai dengan jobdesk selama 3
                                    bulan.<br>
                                    - <strong>Tahap 3</strong>: Admin Marketing. Bekerja penuh sesuai dengan jobdesk
                                    selama 9 bulan.<br>
                                    - <strong>Karier 1</strong>: Supervisor Admin Marketing. Bekerja dan berprestasi
                                    selama 1 tahun.<br>
                                    - <strong>Karier 2</strong>: Manager Marketing. Bekerja dan berprestasi selama 1
                                    tahun.<br>
                                    - <strong>Karier 3</strong>: Kepala Cabang.
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="accordion" id="accordionPanelsStayOpenExampleRight">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#panelsStayOpen-collapseRules" aria-expanded="false"
                                    aria-controls="panelsStayOpen-collapseRules">
                                    Aturan Selama Jam Kerja
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseRules" class="accordion-collapse collapse">
                                <div class="accordion-body">
                                    <ul>
                                        <li>Wajib Senyum Tegur sapa (Selamat Pagi Pak/Bu) dengan Tata Cara Salam Dari
                                            Hati, yaitu menempelkan telapak tangan di dada sambil sedikit membungkuk.
                                        </li>
                                        <li>Berlaku untuk seluruh Warga PT DUDU & Hem's Institute.</li>
                                        <li>Wajib berbahasa Indonesia selama di lingkungan kerja, ke semua karyawan dan
                                            jajaran. Jika ketahuan tidak berbahasa Indonesia, akan dikenakan denda Rp
                                            2,000,- per kesalahan.</li>
                                        <li>Tim yang berada di shift 1 wajib membuat kalimat motivasi kerja yang
                                            variatif setiap pagi di papan tulis (boleh kalimat sendiri / toko
                                            inspiratif).</li>
                                        <li>Apel Pagi wajib setiap hari Senin, dengan Pembukaan Apel Pagi Bergilir.</li>
                                        <ul>
                                            <li><strong>Alur:</strong> Pembukaan, Pembahasan, Pembahasan Rancangan Kerja
                                                & Target, Pencapaian, Permasalahan, Penyelesaian, Motivasi, Doa,
                                                Penutup.</li>
                                        </ul>
                                        <li>Demi kesetaraan karyawan, dilarang menyebutkan usia sesama karyawan.</li>
                                        <li>Dilarang bertengkar di area kantor. Pertengkaran yang menyebabkan
                                            perkelahian akan dipastikan dipecat.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseReward" aria-expanded="false"
                                        aria-controls="collapseReward">
                                        Reward & Tunjangan
                                    </button>
                                </h2>
                                <div id="collapseReward" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <strong>Reward & Tunjangan</strong>
                                        <ul>
                                            <li>Tunjangan BPJS Kesehatan & Ketenagakerjaan diberikan setelah minimal 1
                                                tahun kerja.</li>
                                            <li>Tunjangan Hari Raya:
                                                <ul>
                                                    <li>Jika masa kerja di bawah 1 tahun: Gaji 12 kali jumlah bulan
                                                        kerja.</li>
                                                    <li>Jika masa kerja di atas 1 tahun sampai 3 tahun.</li>
                                                </ul>
                                            </li>
                                            <li>Tunjangan jalan-jalan diberikan 1 kali setahun pada hari perayaan
                                                kantor.</li>
                                            <li>Reward jalan-jalan pribadi tergantung pada kontes atau reward
                                                perusahaan.</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseKPI" aria-expanded="false" aria-controls="collapseKPI">
                                        KPI
                                    </button>
                                </h2>
                                <div id="collapseKPI" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <strong>KPI</strong>
                                        <ul>
                                            <li>KPI diberikan kepada mereka yang mampu menjalankan standar yang
                                                diberikan.</li>
                                            <li>Karyawan boleh mengajukan bonus KPI jika sudah dianggap berprestasi.
                                            </li>
                                            <li>Karyawan berhak mendapatkan laporan KPI mereka.</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseGaji" aria-expanded="false"
                                        aria-controls="collapseGaji">
                                        Gaji
                                    </button>
                                </h2>
                                <div id="collapseGaji" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <strong>Gaji</strong><br>
                                        <p><em>Fee Persenan</em> adalah gaji yang dihitung dari total pendapatan kotor
                                            satu TIM Admin.</p>
                                        <p><strong>Misal</strong>: Jika pendapatan normal satu TIM Rp. 90.000.000,- per
                                            bulan dan persenan = 4%,<br>
                                            Maka: Rp. 90.000.000 x 4% = Rp. 3.600.000,-</p>
                                        <ul>
                                            <li>Training Tahap 1: Rp. 100.000</li>
                                            <li>Trainer Tahap 2: Fee Persenan 4% + Bonus</li>
                                            <li>Admin Marketing: Fee Persenan 5% + Bonus</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseDenda" aria-expanded="false"
                                        aria-controls="collapseDenda">
                                        Denda & Potong Gaji
                                    </button>
                                </h2>
                                <div id="collapseDenda" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <strong>Denda & Potong Gaji</strong>
                                        <ul>
                                            <li>Semua denda akan dikumpulkan dari total kesalahan perorangan.</li>
                                            <li>Pengurangan denda akan dipotong dari gaji (kecuali denda di tempat).
                                            </li>
                                            <li>Keseluruhan total denda yang dikumpulkan tidak menjadi hak manajemen,
                                                tetapi akan digunakan untuk kepentingan TIM, seperti makan besar,
                                                jalan-jalan, uang sakit, belasungkawa, dll.</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
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