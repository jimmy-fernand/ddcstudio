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
                <div class="title">
                    <h4>Create Project</h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page" style="color:#d88c3c;">Create Project</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.project.post') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Categories</label>
                    <div class="col-sm-12 col-md-10">
                        <select name="categorie_id" id="" class="form-control @error("categorie_id") is-invalid @enderror ">
                            <option value="">choose categorie</option>
                            @foreach ($categorie as $item )
                                <option value="{{ $item->id }}">{{ $item->title }}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">
                            {{ $errors->first('id') }}
                        </div>
                    </div>
                </div>
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
                    <label class="col-sm-12 col-md-2 col-form-label">Project completed</label>
                    <div class="col-sm-12 col-md-10">
                        
                        <input type="checkbox">
                        <span class="checkmark"></span>
                          
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
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Photo Principale</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" name="photo_principale" type="file">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label" name="photo">Photos</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" name="photo[]" type="file" multiple>
                    </div>
                </div>


                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Project Finished</label>
                    <div class="col-sm-12 col-md-10">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="finished" value="1" checked>
                            <label class="form-check-label">Yes</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="finished" value="0">
                            <label class="form-check-label">No</label>
                        </div>
                        <div class="invalid-feedback">
                            {{ $errors->first('finished') }}
                        </div>
                    </div>
                </div>



                <div class="form-group row justify-content-end">
                    <div class="col-sm-12 col-lg-4">
                        <div class="input-group mb-0">
                            <button type="submit"class="btn btn-primary btn-lg btn-block" style="background-color: #d88c3c; border:none">Save</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
