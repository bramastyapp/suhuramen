<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>SuhuRamen | #1 Ramen Indonesia</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    {{-- <link href="{{ asset('vendor/theevent') }}/assets/img/favicon.png" rel="icon"> --}}
    <link href="{{ asset('vendor/theevet') }}/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('vendor/theevent') }}/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="{{ asset('vendor/theevent') }}/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('vendor/theevent') }}/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('vendor/theevent') }}/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="{{ asset('vendor/theevent') }}/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('vendor/theevent') }}/assets/css/style.css" rel="stylesheet">
    {{-- font google --}}
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Caveat&family=Quicksand:wght@300;400;500;700&display=swap" rel="stylesheet"/>
    <!-- =======================================================
  * Template Name: TheEvent
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/theevent-conference-event-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
    @livewireStyles()
</head>

<body>
    <!-- ======= Header ======= -->
    <header id="header" class="d-flex align-items-center ">
        <div class="container-fluid container-xxl d-flex align-items-center">
            
            <div id="logo" class="me-auto navbar">
                <a href="#" class="navbar-logo"><span class="suhu">Suhu</span><span class="ramen">Ramen</span></a>
                {{-- <a href="index.html" class="scrollto">
                    <img src="{{ asset('vendor/theevent') }}/assets/img/logo.png" alt="" title="">
                </a> --}}
            </div>

            <nav id="navbar" class="navbar order-last order-lg-0">
                <ul>
                    <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                    <li><a class="nav-link scrollto" href="#menu">Menu</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->
            <a class="buy-tickets scrollto" href="#buy-tickets">
                Cart (0)
                <i class="bi bi-cart-fill"></i>
            </a>
        </div>
    </header><!-- End Header -->
    
    <!-- ======= Hero Section ======= -->
    <section id="hero">
        <div class="hero-container" data-aos="zoom-in" data-aos-delay="100">
            <h1 class="mb-4 pb-0">Suhu<span>Ramen<br>#1 Ramen</span> Indonesia</h1>
            <p class="mb-4 pb-0">sejak 2002</p>
            <a href="#menu" class="about-btn scrollto">Pilih Menu</a>
        </div>
    </section><!-- End Hero Section -->
    <section id="menu" class="section-with-bg pt-5 pb-5">
            {{ $slot }}
    </section>
    
    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-md-6 footer-info">
                        <img src="{{ asset('vendor/theevent') }}/assets/img/logo.png" alt="TheEvenet">
                        <p>In alias aperiam. Placeat tempore facere. Officiis voluptate ipsam vel eveniet est dolor et
                            totam porro. Perspiciatis ad omnis fugit molestiae recusandae possimus. Aut consectetur id
                            quis. In inventore consequatur ad voluptate cupiditate debitis accusamus repellat cumque.
                        </p>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Useful Links</h4>
                        <ul>
                            <li><i class="bi bi-chevron-right"></i> <a href="#">Home</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="#">About us</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="#">Services</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="#">Terms of service</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="#">Privacy policy</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Useful Links</h4>
                        <ul>
                            <li><i class="bi bi-chevron-right"></i> <a href="#">Home</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="#">About us</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="#">Services</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="#">Terms of service</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="#">Privacy policy</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-contact">
                        <h4>Contact Us</h4>
                        <p>
                            A108 Adam Street <br>
                            New York, NY 535022<br>
                            United States <br>
                            <strong>Phone:</strong> +1 5589 55488 55<br>
                            <strong>Email:</strong> info@example.com<br>
                        </p>

                        <div class="social-links">
                            <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                            <a href="#" class="google-plus"><i class="bi bi-instagram"></i></a>
                            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                        </div>

                    </div>

                </div>
            </div>
        </div>

        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong>TheEvent</strong>. All Rights Reserved
            </div>
            <div class="credits">
                <!--
        All the links in the footer should remain intact.
        You can delete the links only if you purchased the pro version.
        Licensing information: https://bootstrapmade.com/license/
        Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=TheEvent
      -->
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
        </div>
    </footer><!-- End  Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('vendor/theevent') }}/assets/vendor/aos/aos.js"></script>
    <script src="{{ asset('vendor/theevent') }}/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('vendor/theevent') }}/assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="{{ asset('vendor/theevent') }}/assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="{{ asset('vendor/theevent') }}/assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('vendor/theevent') }}/assets/js/main.js"></script>
    @livewireScripts()
</body>

</html>
