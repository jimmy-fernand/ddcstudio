@extends('layout.app')
@section('content')
    <div class="page-header">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                {{--  <div class="title">
                    <h4>Create Projet</h4>
                </div>  --}}
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page" style="color:#d88c3c">All Services</li>
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
                        {{-- <th scope="col">#</th> --}}
                        <th scope="col">Title</th>
                        {{-- <th scope="col">Description</th> --}}
                        <th scope="col">Create Date</th>
                        <th scope="col">Disponible</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($services as $item)
                        <tr>
                            <td>{{ $item->title }}</td>
                            {{-- <td>{{ $item->description }}</td> --}}
                            <td>{{ $item->created_at->format('Y-m-d') }}</td>
                            <td>
                                @if ($item->disponible == 1)
                                    <i class="icon-copy fa fa-check-circle text-blue" style="margin: 0px 25px; color:#d88c3c " ria-hidden="true"></i>
                                @else
                                    <i class="icon-copy fa fa-close text-danger" style="margin: 0px 25px;" ria-hidden="true"></i>
                                @endif
                            </td>
                            <td class="align-items-center d-flex">
                                <a class="badge badge-primary" href="{{ route("admin.service.show",['id'=>$item->id]) }}">  <i class="icon-copy fa fa-edit" aria-hidden="true"></i></a>
                                <form action="{{ route('admin.service.delete', ['id' => $item->id]) }}" method="post"
                                    style="display: block;">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn text-danger"
                                        onclick="return(confirm('do you want to delete this user??'))">
                                        <i class="icon-copy fi-trash"></i> </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection
