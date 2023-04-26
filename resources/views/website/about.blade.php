@extends('layout.default')
@section('activeAbout') active @endsection
@section('content')
    <main id="main">
        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs d-flex align-items-center" style="background-image: url('website/assets/img/about-bg.jpg');">
            <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

                <h2>About</h2>
                <ol>
                    <li><a href="index.html">Home</a></li>
                    <li>About</li>
                </ol>

            </div>
        </div><!-- End Breadcrumbs -->

        <!-- ======= About Section ======= -->
        <section id="about" class="about">
            <div class="container" data-aos="fade-up">

                <div class="row position-relative">

                    <div class="col-lg-7 about-img" style="background-image: url(website/assets/img/about_2.jpg);"></div>

                    <div class="col-lg-7">
                        <h2>Dream Design And Construction.co (DDC.co)</h2>
                        <div class="our-story">
                            
                            <h3>Who are we</h3>
                            <p style="text-align: justify;">Dream Design and Construction.co is a design firm offering architecture, 
                                interior design, civil engineering services to commercial, corporate, private and public clients.
                                Our team is comprised of a group of highly talented creatives, whose aim is to deliver value to our 
                                clients through innovative thinking projects  that celebrate and enrich communities.

                            </p>

                            <div class="watch-video d-flex align-items-center position-relative">
                                <i class="bi bi-play-circle"></i>
                                <a href="https://www.youtube.com/" class="glightbox stretched-link">Watch
                                    Video</a>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </section>
        <!-- End About Section -->

        
        <!-- ======= Alt Services Section ======= -->
        <section id="alt-services" class="alt-services section-bg">
            <div class="container" data-aos="fade-up">

                <div class="row justify-content-around gy-4">
                    <div class="col-lg-6 img-bg" style="background-image: url(website/assets/img/alt-services1.jpg);"
                        data-aos="zoom-in" data-aos-delay="100"></div>

                    <div class="col-lg-5 d-flex flex-column justify-content-center">
                        <h3>Our Vision</h3>
                        <p>We aim to create unique and responsive spaces that go above and beyond the standard building experience.
                            Through honesty and integrity, we want to be viewed as a respected architectural firm, providing high quality design and services to our clients.
                            </p>
                            <h3>Our Mission</h3>
                            <p>At Dream Design and constrctuion.co, we listen carefully to our client’s needs to provide creative, practical and sustainable solutions.
                                With an integrated team-focused approach, we guide our clients through the collaborative design and construction process.  
                            </p>
                        {{--  <h3>Our Vision</h3>
                        <p>We aim to create unique and responsive spaces that go above and beyond the standard building experience.
                            Through honesty and integrity, we want to be viewed as a respected architectural firm, providing high quality design and services to our clients.
                        </p>  --}}


                    </div>
                </div>

            </div>
        </section><!-- End Alt Services Section -->

        

        <!-- ======= Our Team Section ======= -->
        <section id="team" class="team">
            <div class="container" data-aos="fade-up">

                <div class="section-header">
                    <h2>Our Team</h2>
                    <p>Our team is comprised of a group of highly talented creatives, 
                        whose aim is to deliver value to our clients through 
                        innovative thinking projects  that celebrate and enrich communities.</p>
                </div>

                <div class="row gy-4">

                    <div class="col-lg-3 col-md-4 member" data-aos="fade-up" data-aos-delay="100">
                        <div class="member-img">
                            <img src="{{ asset('website/assets/img/team/team-1.jpg') }}" class="img-fluid"
                                alt="">
                            <div class="social">
                                <a href="#"><i class="bi bi-twitter"></i></a>
                                <a href="#"><i class="bi bi-facebook"></i></a>
                                <a href="#"><i class="bi bi-instagram"></i></a>
                            </div>
                        </div>
                        <div class="member-info text-center">
                            <h4>Walter White</h4>
                            <span>Chief Executive Officer</span>
                            {{--  <p>Aliquam iure quaerat voluptatem praesentium possimus unde laudantium vel dolorum
                                distinctio dire flow</p>  --}}
                        </div>
                    </div><!-- End Team Member -->

                    <div class="col-lg-3 col-md-4 member" data-aos="fade-up" data-aos-delay="200">
                        <div class="member-img">
                            <img src="{{ asset('website/assets/img/team/team-2.jpg') }}" class="img-fluid"
                                alt="">
                            <div class="social">
                                <a href="#"><i class="bi bi-twitter"></i></a>
                                <a href="#"><i class="bi bi-facebook"></i></a>
                                <a href="#"><i class="bi bi-instagram"></i></a>
                            </div>
                        </div>
                        <div class="member-info text-center">
                            <h4>Sarah Jhonson</h4>
                            <span>Chief Technical Officer</span>
                            {{--  <p>Labore ipsam sit consequatur exercitationem rerum laboriosam laudantium aut quod dolores
                                exercitationem ut</p>  --}}
                        </div>
                    </div><!-- End Team Member -->

                    <div class="col-lg-3 col-md-4 member" data-aos="fade-up" data-aos-delay="300">
                        <div class="member-img">
                            <img src="{{ asset('website/assets/img/team/team-3.jpg') }}" class="img-fluid"
                                alt="">
                            <div class="social">
                                <a href="#"><i class="bi bi-twitter"></i></a>
                                <a href="#"><i class="bi bi-facebook"></i></a>
                                <a href="#"><i class="bi bi-instagram"></i></a>
                            </div>
                        </div>
                        <div class="member-info text-center">
                            <h4>William Anderson</h4>
                            <span>Chief Operations Officer</span>
                            {{--  <p>Illum minima ea autem doloremque ipsum quidem quas aspernatur modi ut praesentium vel
                                tque sed facilis at qui</p>  --}}
                        </div>
                    </div><!-- End Team Member -->

                    <div class="col-lg-3 col-md-4 member" data-aos="fade-up" data-aos-delay="400">
                        <div class="member-img">
                            <img src="{{ asset('website/assets/img/team/team-4.jpg') }}" class="img-fluid"
                                alt="">
                            <div class="social">
                                <a href="#"><i class="bi bi-twitter"></i></a>
                                <a href="#"><i class="bi bi-facebook"></i></a>
                                <a href="#"><i class="bi bi-instagram"></i></a>
                            </div>
                        </div>
                        <div class="member-info text-center">
                            <h4>Amanda Jepson</h4>
                            <span>Cchief Marketing Officer</span>
                            {{--  <p>Magni voluptatem accusamus assumenda cum nisi aut qui dolorem voluptate sed et veniam
                                quasi quam consectetur</p>  --}}
                        </div>
                    </div><!-- End Team Member -->

                </div>

                

            </div>
        </section><!-- End Our Team Section -->

        

    </main><!-- End #main -->
@endsection
