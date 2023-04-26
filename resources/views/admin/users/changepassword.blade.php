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
                    <h4>Update User</h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Profil Admin</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.change.password.update') }}" method="POST">
                @csrf
                @method('patch')
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">New Password</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control @error('password') is-invalid
                            @enderror"
                            name="password" type="password" >
                        <div class="invalid-feedback">
                            {{ $errors->first('password') }}
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">confirm Password</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control @error('confirm_password') is-invalid
                            @enderror"
                            name="confirm_password" type="password" >
                        <div class="invalid-feedback">
                            {{ $errors->first('confirm_password') }}
                        </div>
                    </div>
                </div>
                <div class="form-group row justify-content-between">
                    <div style="margin: 5px 215px;">
                        <a href="{{ route('admin.home') }}" class="btn btn-dark "> Return</a>
                    </div>
                    <div class="col-sm-12 col-lg-4">
                        <div class="input-group mb-0">
                            <button type="submit"class="btn btn-primary btn-lg btn-block">Save</button>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection
