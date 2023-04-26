@php
    use App\classes\Text;
@endphp

@extends('layout.app')
@section('content')
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="title">
                            <h4>Project</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Project</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="product-wrap">
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
                <div class="product-list">
                    <ul class="row">
                        @foreach ($projet as $item)
                            <li class="col-lg-4 col-md-6 col-sm-12">
                                <div class="product-box">
                                    @foreach ($item->photos->where('principale', 1) as $img)
                                        <div class="producct-img"><img src="{{ asset('storage/' . $img->url) }}"
                                                alt="">
                                        </div>
                                    @endforeach
                                    <div class="product-caption">
                                        <h4><a href="#">{{ $item->title }}</a></h4>
                                        <div class="price">
                                            {{-- <del>$55.5</del><ins>$49.5</ins> --}}
                                            <span> Create: {{ $item->created_at->format('Y-m-d') }}</span>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <a href="{{ route('admin.project.show', ['id' => $item->id]) }}"
                                                class="btn btn-outline-primary">
                                                view More
                                            </a>
                                            <form action="{{ route('admin.project.delete', ['id' => $item->id]) }}"
                                                method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-outline-danger"
                                                    onclick="return(confirm('do you want to delete this project??'))">
                                                    delete
                                                </button>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        {{--  <div class="footer-wrap pd-20 mb-20 card-box">
            DeskApp - Bootstrap 4 Admin Template By <a href="https://github.com/dropways" target="_blank">Ankit
                Hingarajiya</a>
        </div>  --}}
    </div>
@endsection
