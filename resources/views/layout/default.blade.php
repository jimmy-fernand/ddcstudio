<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Dream Design Construction Studioz</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset("website/assets/img/final.png") }}" rel="icon">
    {{--  <link href="{{ asset("website/assets/img/apple-touch-icon.png") }}" rel="apple-touch-icon">  --}}

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Roboto:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Work+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset("website/assets/vendor/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet">
    <link href="{{ asset("website/assets/vendor/bootstrap-icons/bootstrap-icons.css") }}" rel="stylesheet">
    <link href="{{ asset("website/assets/vendor/fontawesome-free/css/all.min.css") }}" rel="stylesheet">
    <link href="{{ asset("website/assets/vendor/aos/aos.css") }}" rel="stylesheet">
    <link href="{{ asset("website/assets/vendor/glightbox/css/glightbox.min.css") }}" rel="stylesheet">
    <link href="{{ asset("website/assets/vendor/swiper/swiper-bundle.min.css") }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset("website/assets/css/main.css") }}" rel="stylesheet">

    <!-- =======================================================
  * Template Name: UpConstruction - v1.2.1
  * Template URL: https://bootstrapmade.com/upconstruction-bootstrap-construction-website-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
    <!-- ======= Header ======= -->
    @include('website.include.header')
    <!-- ======= Hero Section ======= -->
    @yield('content')


    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">

        <div class="footer-content position-relative">
            <div class="container">
                <div class="row">

                    <div class="col-lg-4 col-md-6">
                        <div class="footer-info">
                            <h3>Dream Design And Construction Studio</h3>
                            <p>
                               Rohero Avenue de la JRR <br>
                                Immeuble Heliodor numero 12 Bujumbura-Burundi<br><br>
                                <strong>Phone:</strong> +1 5589 55488 55<br>
                                <strong>Email:</strong> info@ddcs.com<br>
                            </p>
                            <div class="social-links d-flex mt-3">
                                <a href="#" class="d-flex align-items-center justify-content-center"><i
                                        class="bi bi-twitter"></i></a>
                                <a href="#" class="d-flex align-items-center justify-content-center"><i
                                        class="bi bi-facebook"></i></a>
                                <a href="#" class="d-flex align-items-center justify-content-center"><i
                                        class="bi bi-instagram"></i></a>
                            </div>
                        </div>
                    </div><!-- End footer info column-->

                    <div class="col-lg-4 col-md-3 footer-links">
                        <h4>Useful Links</h4>
                        <ul>
                            <li><a href="{{ route('site.index') }}" class="@yield('activeHome')">Home</a></li>
                            <li><a href="{{ route('site.about') }}" class="@yield('activeAbout')">About us</a></li>
                            <li><a href="{{ route('site.service') }}" class="@yield('activeService')">Services</a></li>
                            <li><a href="{{ route('site.project') }}" class="@yield('activeProject')">Projects</a></li>
                            <li><a href="{{ route('site.contact') }}" class="@yield('activeContact')">Contact</a></li>
                        </ul>
                    </div><!-- End footer links column-->

                    <div class="col-lg-2 col-md-3 footer-links">
                        <h4>Our Services</h4>
                        <ul>
                            <li><a href="#">Architecture</a></li>
                            <li><a href="#">Landscape design</a></li>
                            <li><a href="#">Interior design</a></li>
                            <li><a href="#">3D Rendering</a></li>
                            <li><a href="#">Construction Work</a></li>
                        </ul>
                    </div><!-- End footer links column-->

                    

                </div>
            </div>
        </div>

        <div class="footer-legal text-center position-relative">
            <div class="container">
                <div class="copyright">
                    &copy; Copyright <strong><span>Dream Design And Construction</span></strong>. All Rights Reserved
                </div>
                
            </div>
        </div>

    </footer>
    <!-- End Footer -->

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="{{ asset("website/assets/vendor/bootstrap/js/bootstrap.bundle.min.js") }}"></script>
    <script src="{{ asset("website/assets/vendor/aos/aos.js") }}"></script>
    <script src="{{ asset("website/assets/vendor/glightbox/js/glightbox.min.js") }}"></script>
    <script src="{{ asset("website/assets/vendor/isotope-layout/isotope.pkgd.min.js") }}"></script>
    <script src="{{ asset("website/assets/vendor/swiper/swiper-bundle.min.js") }}"></script>
    <script src="{{ asset("website/assets/vendor/purecounter/purecounter_vanilla.js") }}"></script>
    <script src="{{ asset("website/assets/vendor/php-email-form/validate.js") }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset("website/assets/js/main.js") }}"></script>

</body>

</html>
