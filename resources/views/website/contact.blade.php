@extends('layout.default')
@section('activeContact')
    active
@endsection

@section('content')
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs d-flex align-items-center"
            style="background-image: url('website/assets/img/about-bg.jpg');">
            <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

                <h2>Contact</h2>
                <ol>
                    <li><a href="{{ route('site.index') }}">Home</a></li>
                    <li>Contact</li>
                </ol>

            </div>
        </div><!-- End Breadcrumbs -->

        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
            <div class="container" data-aos="fade-up" data-aos-delay="100">
                @if (session()->has('success'))
                    <div class=" alert alert-success ">
                        {{ session()->get('success') }}
                    </div>
                @endif
                @if (session()->has('error'))
                    <div class="alert alert-danger">
                        {{ session()->get('error') }}
                    </div>
                @endif
                <div class="row gy-4">
                    <div class="col-lg-6">
                        <div class="info-item  d-flex flex-column justify-content-center align-items-center">
                            <i class="bi bi-map"></i>
                            <h3>Our Address</h3>
                            <p> Rohero Avenue de la JRR
                                Immeuble <br> Heliodor numero 12 Bujumbura Burundi</p>
                        </div>
                    </div><!-- End Info Item -->

                    <div class="col-lg-3 col-md-6">
                        <div class="info-item d-flex flex-column justify-content-center align-items-center">
                            <i class="bi bi-envelope"></i>
                            <h3>Email Us</h3>
                            <p>hello@ddcstudioz.com</p>
                        </div>
                    </div><!-- End Info Item -->

                    <div class="col-lg-3 col-md-6">
                        <div class="info-item  d-flex flex-column justify-content-center align-items-center">
                            <i class="bi bi-telephone"></i>
                            <h3>Call Us</h3>
                            <p>+257 62 41 76 91</p>
                        </div>
                    </div><!-- End Info Item -->

                </div>

                <div class="row gy-4 mt-1">

                    <div class="col-lg-6 ">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3982.839147372625!2d29.36424197103284!3d-3.38942773396956!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x19c1836ec4916a0f%3A0xf7c62f6b259cf2d7!2sHELIODORE%20BUILDING!5e0!3m2!1sfr!2sus!4v1681390301657!5m2!1sfr!2sus" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div><!-- End Google Maps -->

                    <div class="col-lg-6">
                        <form action="{{ route('site.send.message') }}" method="post" class="php-email-form">
                            @csrf
                            <div class="row gy-4">
                                <div class="col-lg-6 form-group">
                                    <input type="text" name="firstName"
                                        class="form-control @error('firstName') is-invalid @enderror" id="name"
                                        placeholder="Your First Name">
                                    @error('firstName')
                                        <div class="invalid-feedback">
                                            {{ $errors->first('firstName') }}

                                        </div>
                                    @enderror
                                </div>
                                <div class="col-lg-6 form-group">
                                    <input type="text" name="lastName"
                                        class="form-control @error('lastName') is-invalid @enderror" id="name"
                                        placeholder="Your Last Name">
                                    @error('lastName')
                                        <div class="invalid-feedback">
                                            {{ $errors->first('lastName') }}

                                        </div>
                                    @enderror
                                </div>

                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control  @error('email') is-invalid @enderror"
                                    name="email" id="email" placeholder="Your Email">
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $errors->first('email') }}

                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control  @error('title') is-invalid @enderror"
                                    name="title" id="title" placeholder="Your Subject">
                                @error('title')
                                    <div class="invalid-feedback">
                                        {{ $errors->first('title') }}

                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <textarea class="form-control @error('message') is-invalid @enderror" name="message"  
                                    rows="5"placeholder="Message"></textarea>
                                @error('message')
                                    <div class="invalid-feedback">
                                        {{ $errors->first('message') }}

                                    </div>
                                @enderror
                            </div>
                            <div class="text-center"><button type="submit">Send Message</button></div>
                            
                        </form>
                    </div><!-- End Contact Form -->

                </div>

            </div>
        </section><!-- End Contact Section -->

    </main><!-- End #main -->
@endsection
