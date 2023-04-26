@php
    use App\classes\Text;
@endphp
@extends('layout.default')
@section('activeHome')
    active
@endsection
@section('content')
    <section id="hero" class="hero">

        <div class="info d-flex align-items-center">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 text-center">
                        <h3 data-aos="fade-down">Welcome to</h3>
                        <h2>DREAM DESIGN AND CONSTRUCTION .CO</h2>
                        <a data-aos="fade-up" data-aos-delay="200" href="{{ route('site.contact') }}" class="btn-get-started">Get
                            in touch</a>
                    </div>
                </div>
            </div>
        </div>
        <div id="hero-carousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">

            <div class="carousel-item active"
                style="background-image: url(website/assets/img/hero-carousel/kiyange-conference2_1.jpg)">
            </div>
            <div class="carousel-item" style="background-image: url(website/assets/img/hero-carousel/kiyange-residential2_1.jpg)">
            </div>
            <div class="carousel-item" style="background-image: url(website/assets/img/hero-carousel/IMG_8691_1.jpg)">
            </div>
            <div class="carousel-item" style="background-image: url(website/assets/img/hero-carousel/DJI_0904_1.jpg)">
            </div>
            <div class="carousel-item" style="background-image: url(website/assets/img/hero-carousel/sammy-house-pic_2---Photo_1.jpg)">
            </div>
            {{--  <div class="carousel-item" style="background-image: url(website/assets/img/hero-carousel/dream.png)">
            </div>  --}}

            <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
            </a>

            <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
            </a>

        </div>

    </section><!-- End Hero Section -->

    <main id="main">
        <!-- ======= About Section ======= -->
        <section id="about" class="about">
            <div class="container" data-aos="fade-up">

                <div class="row position-relative">

                    <div class="col-lg-7 about-img" style="background-image: url(website/assets/img/about_2.jpg);"></div>

                    <div class="col-lg-7">
                        <h2>Dream Design And Construction.Co (DDC.Co)</h2>
                        <div class="our-story">
                            
                            <p style="text-align: justify;">We are a design firm offering architecture, 
                                interior design, and civil engineering services to clients. 
                                Our team is dedicated to delivering innovative and practical 
                                solutions that celebrate and enrich communities. We listen carefully 
                                to our clients needs and guide them through the collaborative design 
                                and construction process. Our vision is to create unique and 
                                responsive spaces that exceed expectations and establish us as a 
                                trusted and respected architectural firm.
                            </p>
                            <a href="{{ route('site.about') }}">Read more <i class="bi bi-arrow-right"></i></a>
                            

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


        <!-- ======= Services Section ======= -->
        <section id="services" class="services section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-header">
                    <h2>Our Specialization</h2>
                </div>
                    
                <div class="row gy-4 mx-auto" style="max-width: 1100px;">
                    @foreach ($service as $item)
                        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                            <div class="service-item  position-relative">
                                <div class="icon">
                                  <i>
                                    <img src="{{ asset('storage/' . $item->photo) }}" alt="" class="img-fluid">
                                  </i>
                                </div>
                                <h3>{{ $item->title }}</h3>
                                
                                    <p>{{ $item->description}}</p>
                                {{--  <a href="service-details.html" class="readmore stretched-link">Learn more <i
                                  class="bi bi-arrow-right"></i></a>  --}}
                                
                            </div>
                        </div><!-- End Service Item -->
                    @endforeach

                </div>

            </div>
        </section><!-- End Services Section -->
        <!-- ======= Our Projects Section ======= -->
        <section id="projects" class="projects">
            <div class="container" data-aos="fade-up">

                <div class="section-header">
                    <h2>Our Projects</h2>
                    
                </div>

                <div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry"
                    data-portfolio-sort="original-order">

                    <ul class="portfolio-flters aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
                        <li data-filter="*" class="filter-active">All</li>
                        @foreach ($categorie as $categorie)
                            <li data-filter=".filter-{{ Str::replace(' ', '_', $categorie->title) }}">{{ $categorie->title }}</li>
                        @endforeach
                    </ul><!-- End Projects Filters -->

                    <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">
                        @foreach ($project as $item)
                            {{-- @dd($item->service) --}}
                            <div
                                class="col-lg-4 col-md-6 portfolio-item filter-{{ Str::replace(' ', '_', $item->categorie->title) }}">
                                <div class="portfolio-content h-100" >
                                    @foreach ($item->photos->where('principale', 1) as $img)
                                        <img src="{{ asset('storage/' . $img->url) }}" alt="" class="img-fluid" >
                                    @endforeach
                                    {{-- <img src="{{ asset('website/assets/img/projects/remodeling-1.jpg') }}" class="img-fluid"
                                    alt=""> --}}
                                    <div class="portfolio-info">
                                        <h4>{{ $item->title }}</h4>
                                        {{--  <p>{{ Text::Extrait($item->description, 20) }}</p>  --}}
                                        @foreach ($item->photos as $img)
                                            <a href="{{ asset('storage/' . $img->url) }}" 
                                                data-gallery="portfolio-gallery-{{ Str::replace(' ', '-', $item->title) }}"
                                                class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                                        @endforeach
                                        <a href="{{ route('site.projectDetail', ['id' => $item->id]) }}" title="More Details"
                                            class="details-link"><i class="bi bi-link-45deg"></i></a>
                                    </div>
                                </div>
                            </div><!-- End Projects Item -->
                        @endforeach
                        <div class="card-footer">
                            <ul class="d-flex justify-content-center">
                                         {!! $project->links() !!}
                               </ul>
                        </div>
                    </div><!-- End Projects Container -->

                </div>

            </div>
        </section><!-- End Our Projects Section -->


        <!-- ======= Our Projects Section ======= -->
        <section id="projects" class="projects section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-header">
                    <h2>Completed Projects</h2>
                </div>

                <div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry"
                    data-portfolio-sort="original-order">

                    <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">
                        
                        @foreach ($project->where('finished', 1) as $item)
                            <div
                                class="col-lg-4 col-md-6 portfolio-item filter-{{ Str::replace(' ', '_', $item->categorie->title) }}">
                                <div class="portfolio-content h-100" >
                                    @foreach ($item->photos->where('principale', 1) as $img)
                                        <img src="{{ asset('storage/' . $img->url) }}" alt="" class="img-fluid" >
                                    @endforeach
                                    
                                    <div class="portfolio-info">
                                        <h4>{{ $item->title }}</h4>
                                        <p>{{ Text::Extrait($item->description, 20) }}</p>
                                        @foreach ($item->photos as $img)
                                            <a href="{{ asset('storage/' . $img->url) }}" title="Remodeling 1"
                                                data-gallery="portfolio-gallery-{{ Str::replace(' ', '_', $item->categorie->title) }}"
                                                class="glightbox preview-link"><i class="bi bi-zoom-in"></i>
                                            </a>
                                        @endforeach
                                        <a href="{{ route('site.projectDetail', ['id' => $item->id]) }}" title="More Details"
                                            class="details-link"><i class="bi bi-link-45deg"></i>
                                        </a>
                                    </div>
                                    
                                </div><!-- End Projects Item -->
                            </div>
                        @endforeach

                    </div><!-- End Projects Container -->

                </div>

            </div>
        </section><!-- End Our Projects Section -->

        

        <!-- ======= Our Team Section ======= -->
        <section id="team" class="team">
            <div class="container" data-aos="fade-up">

                <div class="section-header">
                    <h2>Our Team</h2>
                    <p>Aperiam dolorum et et wuia molestias qui eveniet numquam nihil porro incidunt dolores placeat
                        sunt id nobis omnis tiledo stran delop</p>
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
                            <span>Product Manager</span>
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
                            <span>CTO</span>
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
                            <span>Accountant</span>
                            {{--  <p>Magni voluptatem accusamus assumenda cum nisi aut qui dolorem voluptate sed et veniam
                                quasi quam consectetur</p>  --}}
                        </div>
                    </div><!-- End Team Member -->

                </div>

            </div>
        </section><!-- End Our Team Section -->

        <!-- ======= Testimonials Section ======= -->
        <section id="testimonials" class="testimonials section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-header">
                    <h2>Testimonials</h2>
                    <p>Quam sed id excepturi ccusantium dolorem ut quis dolores nisi llum nostrum enim velit qui ut et
                        autem uia reprehenderit sunt deleniti</p>
                </div>

                <div class="slides-2 swiper">
                    <div class="swiper-wrapper">

                        <div class="swiper-slide">
                            <div class="testimonial-wrap">
                                <div class="testimonial-item">
                                    <img src="{{ asset('website/assets/img/testimonials/testimonials-1.jpg') }}"
                                        class="testimonial-img" alt="">
                                    <h3>Saul Goodman</h3>
                                    <h4>Ceo &amp; Founder</h4>
                                    <div class="stars">
                                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                            class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                            class="bi bi-star-fill"></i>
                                    </div>
                                    <p>
                                        <i class="bi bi-quote quote-icon-left"></i>
                                        Proin iaculis purus consequat sem cure digni ssim donec porttitora entum
                                        suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et.
                                        Maecen aliquam, risus at semper.
                                        <i class="bi bi-quote quote-icon-right"></i>
                                    </p>
                                </div>
                            </div>
                        </div><!-- End testimonial item -->

                        <div class="swiper-slide">
                            <div class="testimonial-wrap">
                                <div class="testimonial-item">
                                    <img src="{{ asset('website/assets/img/testimonials/testimonials-2.jpg') }}"
                                        class="testimonial-img" alt="">
                                    <h3>Sara Wilsson</h3>
                                    <h4>Designer</h4>
                                    <div class="stars">
                                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                            class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                            class="bi bi-star-fill"></i>
                                    </div>
                                    <p>
                                        <i class="bi bi-quote quote-icon-left"></i>
                                        Export tempor illum tamen malis malis eram quae irure esse labore quem cillum
                                        quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat
                                        irure amet legam anim culpa.
                                        <i class="bi bi-quote quote-icon-right"></i>
                                    </p>
                                </div>
                            </div>
                        </div><!-- End testimonial item -->

                        <div class="swiper-slide">
                            <div class="testimonial-wrap">
                                <div class="testimonial-item">
                                    <img src="{{ asset('website/assets/img/testimonials/testimonials-3.jpg') }}"
                                        class="testimonial-img" alt="">
                                    <h3>Jena Karlis</h3>
                                    <h4>Store Owner</h4>
                                    <div class="stars">
                                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                            class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                            class="bi bi-star-fill"></i>
                                    </div>
                                    <p>
                                        <i class="bi bi-quote quote-icon-left"></i>
                                        Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem
                                        veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis
                                        sint minim.
                                        <i class="bi bi-quote quote-icon-right"></i>
                                    </p>
                                </div>
                            </div>
                        </div><!-- End testimonial item -->

                    </div>
                    <div class="swiper-pagination"></div>
                </div>

            </div>
        </section><!-- End Testimonials Section -->
    </main><!-- End #main -->
@endsection
