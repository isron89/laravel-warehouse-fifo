<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Nusantara Warehouse - Home</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('assets') }}/home/img/favicon.png" rel="icon">
    <link href="{{ asset('assets') }}/home/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets') }}/home/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="{{ asset('assets') }}/home/vendor/aos/aos.css" rel="stylesheet">
    <link href="{{ asset('assets') }}/home/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('assets') }}/home/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('assets') }}/home/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="{{ asset('assets') }}/home/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="{{ asset('assets') }}/home/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="{{ asset('assets') }}/home/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('assets') }}/home/css/style.css" rel="stylesheet">

</head>

<body>

    <!-- ======= Top Bar ======= -->
    <div id="topbar" class="fixed-top d-flex align-items-center ">
        <div class="container d-flex align-items-center justify-content-center justify-content-md-between">
            <div class="contact-info d-flex align-items-center">
                <i class="bi bi-envelope-fill"></i><a href="mailto:contact@example.com">info@nusantaralistsupply.com</a>
                <i class="bi bi-phone-fill phone-icon"></i> +62 851 5545 1234
            </div>
            @if (Route::has('login'))
            @auth
            @else
            <div class="cta d-none d-md-block">
                <a href="{{ route('login') }}" class="scrollto">Login</a>
            </div>
            @endauth
            @endif
        </div>
    </div>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center ">
        <div class="container d-flex align-items-center justify-content-between">

            <h1 class="logo"><a href="{{ route('/') }}">Nusantara Warehouse</a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href=index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                    <li><a class="nav-link scrollto" href="#about">Tentang Kami</a></li>
                    <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
                    @if (Route::has('login'))
                    @auth
                    <li class="dropdown"><a href="#"><span>{{ Auth::user()->name }}</span> <i class="bi bi-chevron-right"></i></a>
                        <ul>
                            <li><a href="{{ route('dashboard.index') }}" class="nav-link scrollto"><i class="bi bi-house-fill"></i> Dashboard</a></li>
                            <li><a href="{{ route('profile.edit', Auth::user()->id) }}" class="nav-link scrollto"><i class="bi bi-person-fill"></i> Profile</a></li>
                            <!-- <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <li><a href="{{ route('logout') }}" class="nav-link scrollto"><i class="bi bi-box-arrow-right" onclick="event.preventDefault(); this.closest('form').submit();"></i> Logout</a></li>
                            </form> -->
                        </ul>
                    </li>
                    @endauth
                    @endif
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex justify-cntent-center align-items-center">
        <div id="heroCarousel" data-bs-interval="5000" class="container carousel carousel-fade" data-bs-ride="carousel">

            <!-- Slide 1 -->
            <div class="carousel-item active">
                <div class="carousel-container">
                    <h2 class="animate__animated animate__fadeInDown">Welcome to <span>CV Nusantara List Supply</span></h2>
                    <p class="animate__animated animate__fadeInUp">CV Nusantara List Supply merupakan perusahaan yang bergerak di bidang distribusi produk keramik. Perusahaan berlokasi di Kota Surabaya, Jawa Timur.</p>
                    <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
                </div>
            </div>

            <!-- Slide 2 -->
            <div class="carousel-item">
                <div class="carousel-container">
                    <h2 class="animate__animated animate__fadeInDown">Nusantara Warehouse</h2>
                    <p class="animate__animated animate__fadeInUp">Nusantara Warehouse merupakan sistem informasi manajemen produk keramik untuk memonitoring stok produk.</p>
                    <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
                </div>
            </div>

            <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon bx bx-chevron-left" aria-hidden="true"></span>
            </a>

            <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon bx bx-chevron-right" aria-hidden="true"></span>
            </a>

        </div>
    </section><!-- End Hero -->

    <main id="main">

        <!-- ======= Icon Boxes Section ======= -->
        <section id="icon-boxes" class="icon-boxes">
            <div class="container">

                <div class="row">
                    <div class="col-md-8 col-lg-4 d-flex align-items-stretch mb-7 mb-lg-0" data-aos="fade-up">
                        <div class="icon-box">
                            <!-- <div class="icon"><i class="bx bxl-dribbble"></i></div> -->
                            <h4>{{ $sedia_jual }}</h4>
                            <h4 class="title"><a href="">Produk terjual</a></h4>
                            <p class="description">Jumlah produk yang terjual (dalam unit pack) yang tercatat od sistem informasi</p>
                        </div>
                    </div>

                    <div class="col-md-8 col-lg-4 d-flex align-items-stretch mb-7 mb-lg-0" data-aos="fade-up" data-aos-delay="100">
                        <div class="icon-box">
                            <!-- <div class="icon"><i class="bx bx-file"></i></div> -->
                            <h4>{{ $sedia_jum }}</h4>
                            <h4 class="title"><a href="">Sisa stok produk</a></h4>
                            <p class="description">Sisa stok produk (dalam unit pack) yang tercatat od sistem informasi</p>
                        </div>
                    </div>

                    <div class="col-md-8 col-lg-4 d-flex align-items-stretch mb-7 mb-lg-0" data-aos="fade-up" data-aos-delay="200">
                        <div class="icon-box">
                            <!-- <div class="icon"><i class="bx bx-tachometer"></i></div> -->
                            <h4>{{"Rp. ".number_format($sedia_total_jual,0,".",".")}}</h4>
                            <h4 class="title"><a href="">Total penjualan</a></h4>
                            <p class="description">Total penjualan produk (dalam rupiah) yang tercatat pada sistem informasi</p>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Icon Boxes Section -->

        <!-- ======= About Us Section ======= -->
        <section id="about" class="about">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Tentang Kami</h2>
                    <p>CV Nusantara List Supply merupakan perusahaan yang bergerak di bidang distribusi produk keramik. Perusahaan berlokasi di Kota Surabaya, Jawa Timur.</p>
                </div>

                <div class="row content">
                    <div class="col-lg-6">
                        <p>
                            Nusantara Warehouse merupakan sistem informasi manajemen produk keramik untuk memonitoring stok produk. Manajemen stok produk menggunakan metode First In First Out (FIFO). Sistem ini memiliki beberapa fitur utama, diantaranya :
                        </p>
                        <ul>
                            <li><i class="ri-check-double-line"></i> Dashboard produk</li>
                            <li><i class="ri-check-double-line"></i> Manajemen produk</li>
                            <li><i class="ri-check-double-line"></i> Manajemen penjualan produk</li>
                            <li><i class="ri-check-double-line"></i> Manajemen pembelian produk</li>
                            <li><i class="ri-check-double-line"></i> Manajemen user</li>
                        </ul>
                    </div>
                </div>

            </div>
        </section>
        <!-- End About Us Section -->

        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Contact Us</h2>
                </div>

                <div class="row mt-1 d-flex justify-content-center" data-aos="fade-right" data-aos-delay="100">

                    <div class="col-lg-5">
                        <div class="info">
                            <div class="address">
                                <i class="bi bi-geo-alt"></i>
                                <h4>Alamat:</h4>
                                <p>Jl. Ngagel No.165 Kota Surabaya, Jawa Timur</p>
                            </div>

                            <div class="email">
                                <i class="bi bi-envelope"></i>
                                <h4>Email:</h4>
                                <p>info@nusantaralistsupply.com</p>
                            </div>

                            <div class="phone">
                                <i class="bi bi-phone"></i>
                                <h4>Call:</h4>
                                <p>+62 851 5545 1234</p>
                            </div>

                        </div>

                    </div>

                </div>

            </div>
        </section><!-- End Contact Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">

        <div class="footer-newsletter">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <h4>Nusantara Warehouse</h4>
                        <p>Sistem Informasi Manajemen Produk Keramik</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Useful Links</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#about">About us</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-contact">
                        <h4>Contact Us</h4>
                        <p>
                            Kota Surabaya <br>
                            Jawa Timur <br>
                            Indonesia <br><br>
                            <strong>Phone:</strong> +62 851 5545 1234<br>
                            <strong>Email:</strong> info@nusantaralistsupply.com<br>
                        </p>

                    </div>

                    <div class="col-lg-3 col-md-6 footer-info">
                        <h3>CV Nusantara List Supply</h3>
                        <p>CV Nusantara List Supply merupakan perusahaan yang bergerak di bidang distribusi produk keramik di Kota Surabaya.</p>
                    </div>

                </div>
            </div>
        </div>

        <div class="container">
            <div class="credits">
                Nusantara Warehouse</a>
            </div>
        </div>
    </footer><!-- End Footer -->

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets') }}/home/vendor/aos/aos.js"></script>
    <script src="{{ asset('assets') }}/home/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets') }}/home/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="{{ asset('assets') }}/home/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="{{ asset('assets') }}/home/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="{{ asset('assets') }}/home/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('assets') }}/home/js/main.js"></script>

</body>

</html>