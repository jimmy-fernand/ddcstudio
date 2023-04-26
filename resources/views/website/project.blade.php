@php
    use App\classes\Text;
@endphp
@extends('layout.default')
@section('activeProject')
    active
@endsection
@section('content')
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs d-flex align-items-center" style="background-image: url('website/assets/img/about-bg.jpg');">
            <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

                <h2>Projects</h2>
                <ol>
                    <li><a href="{{ route('site.index') }}">Home</a></li>
                    <li>Projects</li>
                </ol>
                

            </div>
        </div><!-- End Breadcrumbs -->

        <!-- ======= Our Projects Section ======= -->
        <section id="projects" class="projects">
            <div class="container" data-aos="fade-up">




                <div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry"
                    data-portfolio-sort="original-order">

                    <ul class="portfolio-flters" data-aos="fade-up" data-aos-delay="100">
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
                                                data-gallery="portfolio-gallery-{{ Str::replace(' ', '_', $item->title) }}"
                                                class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                                        @endforeach
                                        <a href="{{ route('site.projectDetail', ['id' => $item->id]) }}" title="More Details"
                                            class="details-link"><i class="bi bi-link-45deg"></i></a>
                                    </div>
                                </div>
                            </div><!-- End Projects Item -->
                        @endforeach
                        
                        
                    </div><!-- End Projects Container -->
                    {{--  <div class="card-footer">
                        <ul class="d-flex justify-content-center">
                                     {!! $project->links() !!}
                           </ul>
                    </div>  --}}

                </div>





                {{--  <div class="pore" data-portfolio-filter="*" data-portfolio-layout="masonry"
                    data-portfolio-sort="original-order">

                    <ul class="portfolio-flters" data-aos="fade-up" data-aos-delay="100">
                        <li data-filter="*" class="filter-active">All</li>
                        @foreach ($categorie as $item)
                        <li data-filter=".filter-design">{{ $item->title }}</li>
                    @endforeach
                    </ul><!-- End Projects Filters -->

                    <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">
                        @foreach ($project as $item)
                            <div class="col-lg-4 col-md-6 portfolio-item filter-remodeling">
                                <div class="portfolio-content h-100">
                                    @foreach ($item->photos->where('principale', 1) as $img)
                                        <img src="{{ asset('storage/' . $img->url) }}" alt="" class="img-fluid">
                                    @endforeach
                                    {{-- <img src="{{ asset('website/assets/img/projects/remodeling-1.jpg') }}" class="img-fluid"
                                        alt=""> --}}
                                    {{--  <div class="portfolio-info">
                                        <h4>{{ $item->title }}</h4>
                                        <p>{{ Text::Extrait($item->description, 20) }}</p>
                                        @foreach ($item->photos as $img)
                                            <a href="{{ asset('storage/' . $img->url) }}" title="Remodeling 1"
                                                data-gallery="portfolio-gallery-remodeling"
                                                class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                                        @endforeach
                                        <a href="{{ route('site.projectDetail',['id'=>$item->id]) }}" title="More Details" class="details-link"><i
                                                class="bi bi-link-45deg"></i></a>
                                    </div>
                                </div>
                            </div><!-- End Projects Item -->
                        @endforeach
                    </div><!-- End Projects Container -->

                </div>  --}}  

            </div>
        </section><!-- End Our Projects Section -->

    </main><!-- End #main -->
@endsection
