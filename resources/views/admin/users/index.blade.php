@extends('layout.app')
@section('content')
    <div class="page-header">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="title">
                    <h4>Create Projet</h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page" style="color: #d88c3c;">All User</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
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
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($user)
                        @foreach ($user as $item)
                            @if (Auth::user()->id !== $item->id)
                                <tr>
                                    <th scope="row">{{ $item->id }}</th>
                                    <td>{{ $item->firstName }}</td>
                                    <td>{{ $item->lastName }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td class="align-items-center d-flex">
                                        <a href="{{ route('admin.user.show', ['id' => $item->id]) }}" class="text-dark">
                                            <i class="icon-copy fa fa-edit" aria-hidden="true"></i> </a>
                                        <form action="{{ route('admin.user.delete', ['id' => $item->id]) }}" method="post"
                                            style="display: block;">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn text-danger"
                                                onclick="return(confirm('do you want to delete this user??'))">
                                                <i class="icon-copy fi-trash"></i> </button>
                                        </form>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    @else
                        No user fund
                    @endif

                </tbody>
            </table>
        </div>
    </div>
@endsection
