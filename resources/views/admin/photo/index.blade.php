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
                                <li class="breadcrumb-item active" aria-current="page">Photos</li>
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
                        @foreach ($photos as $item)
                            <li class="col-lg-4 col-md-6 col-sm-12">
                                <div class="product-box">
                                    {{--  @foreach ($item as $img)  --}}
                                        <div class="producct-img"><img src="{{ asset('storage/' . $item->url) }}"
                                                alt="">
                                        </div>
                                    <div class="product-caption">
                                            <h4><a href="#">{{ $item->project->title }}</a></h4>
                                        
                                        <div class="price">
                                            <span> Create: {{ $item->created_at->format('Y-m-d') }}</span>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <form action="{{ route('admin.photo.delete', ['id' => $item->id]) }}"
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
                <div class="card-footer">
                    <ul class="d-flex justify-content-center">
                                 {!! $photos->links() !!}
                       </ul>
                </div>
            </div>
        </div>
    </div>
@endsection

