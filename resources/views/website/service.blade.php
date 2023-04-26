@extends('layout.default')
@section('activeService') active @endsection
@section('content')
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs d-flex align-items-center" style="background-image: url('website/assets/img/about-bg.jpg');">
            <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

                <h2>Services</h2>
                <ol>
                    <li><a href="{{ route('site.index') }}">Home</a></li>
                    <li>Services</li>
                </ol>

            </div>
        </div><!-- End Breadcrumbs -->

        <!-- ======= Services Section ======= -->
        <section id="services" class="services section-bg">
            <div class="container" data-aos="fade-up">

                <div class="row gy-4">
                    @foreach ($service as $item )
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

        <!-- ======= Servie Cards Section ======= -->
        
        <!-- End Servie Cards Section -->

        <!-- ======= Alt Services Section 2 ======= -->
        <!-- End Alt Services Section 2 -->  --}}

    </main><!-- End #main -->
@endsection
