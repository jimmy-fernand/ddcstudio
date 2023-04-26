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
                        <li class="breadcrumb-item active" aria-current="page" style="color: #d88c3c;">Show User</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.user.update',['id'=>$user->id]) }}" method="POST">
                @csrf
                @method('patch')
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">First Name</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control @error('firstName') is-invalid
                            @enderror" value="{{ $user->firstName }}"
                            name="firstName" type="text" placeholder="first name">
                        <div class="invalid-feedback">
                            {{ $errors->first('firstName') }}
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Last Name</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control @error('lastName') is-invalid
                            @enderror" value="{{ $user->lastName }}"
                            name="lastName" type="text" placeholder="last name">
                        <div class="invalid-feedback">
                            {{ $errors->first('lastName') }}
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Email</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control @error('email') is-invalid
                            @enderror" value="{{ $user->email }}"
                            name="email" type="email" placeholder="email">
                        <div class="invalid-feedback">
                            {{ $errors->first('email') }}
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Password</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control @error('password') is-invalid
                            @enderror"
                            name="password" type="password" >
                        <div class="invalid-feedback">
                            {{ $errors->first('password') }}
                        </div>
                    </div>
                </div>
                <div class="form-group row justify-content-between">
                    <div style="margin: 5px 215px;">
                        <a href="{{ route('admin.user.index') }}" class="btn btn-dark "> Return</a>
                    </div>
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
