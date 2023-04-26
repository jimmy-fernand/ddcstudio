@extends('layout.app')
@section('content')
    <div class="mb-3">
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
    </div>
    <div class="page-header">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                {{--  <div class="title">
                    <h4>Create Projet</h4>
                </div>  --}}
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page" style="color: #d88c3c;">Create Categorie</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.categorie.store') }}" method="POST">
                @csrf
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Title</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control @error('title') is-invalid
                            @enderror"
                            name="title" type="text" placeholder="title">
                        <div class="invalid-feedback">
                            {{ $errors->first('title') }}
                        </div>
                    </div>
                </div>
                {{--  <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Description</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control @error('description') is-invalid
                            @enderror"
                            name="description" type="text" placeholder="description">
                            <textarea name="description" class="form-control @error('description') is-invalid @enderror"></textarea>
                        <div class="invalid-feedback">
                            {{ $errors->first('description') }}
                        </div>
                    </div>
                </div>  --}}

                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Description</label>
                    <div class="col-sm-12 col-md-10">
                        {{-- <textarea class="textarea_editor form-control border-radius-0 @error('description') is-invalid @enderror" name="description" placeholder="Enter text ..."></textarea> --}}
                        <textarea name="description" class="form-control @error('description') is-invalid @enderror"></textarea>
                        <div class="invalid-feedback">
                            {{ $errors->first('description') }}
                        </div>
                    </div>
                </div>
                
                <div class="form-group row justify-content-end">
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
