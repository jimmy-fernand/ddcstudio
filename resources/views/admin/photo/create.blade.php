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
                        <li class="breadcrumb-item active" aria-current="page" style="color:#d88c3c;">Add Photos</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.photo.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Project</label>
                    <div class="col-sm-12 col-md-10">
                        <select name="project_id" id="" class="form-control @error("project_id") is-invalid @enderror ">
                            <option value="">choose project</option>
                            @foreach ($project as $item )
                                <option value="{{ $item->id }}">{{ $item->title }}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">
                            {{ $errors->first('id') }}
                        </div>
                    </div>
                </div>
                
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label" name="photo">Photos</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" name="photo[]" type="file" multiple>
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
