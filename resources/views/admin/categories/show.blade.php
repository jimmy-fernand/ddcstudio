@extends('layout.app')
@section('styles')
    <style>
        .borderImgUnique {
            padding: 5px;
            margin: 0 2px;
            width: 178px;
            border: 2px solid #dbac14;
            border-radius: 8px;
        }

        .borderImg {
            width: 165px;
            height: 100px;
            object-fit: contain;
        }
    </style>
@endsection
@section('content')
    <div class="page-header">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="title">
                    <h4>Show Projet</h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page" style="color:#d88c3c;">Show Categorie</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            @if (session()->has('error'))
                <div class="alert alert-danger">
                    {{ session()->get('error') }}
                </div>
            @endif
            <form action="{{ route("admin.categorie.update",["id"=>$categorie->id]) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="form-group row"><label class="col-sm-12 col-md-2 col-form-label">Title</label>
                    <div class="col-sm-12 col-md-10"><input
                            class="form-control @error('title') is-invalid
                            @enderror"
                            name="title" type="text" value="{{ $categorie->title }}" placeholder="title">
                        <div class="invalid-feedback">{{ $errors->first('title') }} </div>
                    </div>
                </div>
                <div class="form-group row"><label class="col-sm-12 col-md-2 col-form-label">Description</label>
                    <div class="col-sm-12 col-md-10">
                        <textarea name="description" class="form-control @error('description') is-invalid @enderror">{{ $categorie->description }}</textarea>
                        <div class="invalid-feedback">{{ $errors->first('description') }} </div>
                    </div>
                </div>
                {{--  <div class="row">
                    <div class="form-group col-lg-12 "
                        style="overflow: auto;max-height: 235px;padding: 0 !important;display: flex;justify-content: start;align-items: center;">
                        <label class="col-sm-12 col-md-2 col-form-label">Photos</label>
                            <div class="borderImgUnique">
                                <label for="file">
                                    <input type="file"accept="image/*" name="photo"
                                        class="file" id="file" onchange="readURL(this, 'blah');"
                                        style="display: none;">
                                    <img id="image" src="{{ asset('storage/' . $service->photo) }}"
                                        alt="image-xxxx-xxxx" class="borderImg" />
                                </label>
                            </div>
                    </div>
                </div>  --}}
                <div class="form-group row justify-content-between">
                    <div style="margin: 5px 203px;">
                        <a href="{{ route('admin.categorie.index') }}" class="btn btn-dark "style="background-color: #000; border:none;"> Return</a>
                    </div>
                    <div class="col-sm-12 col-lg-4">
                        <div class="input-group mb-0">
                            <button type="submit"class="btn btn-primary btn-lg btn-block" style="background-color: #d88c3c; border:none;">Save</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection