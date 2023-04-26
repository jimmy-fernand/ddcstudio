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
                        <li class="breadcrumb-item active" aria-current="page">Show Project</li>
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
            <form action="{{ route('admin.project.update', ['id' => $project->id]) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="form-group row"><label class="col-sm-12 col-md-2 col-form-label">Categorie</label>
                    <div class="col-sm-12 col-md-10">
                        <select
                            class="form-control @error('categorie_id') is-invalid
                            @enderror"
                            name="categorie_id">
                            @foreach ($categories as $categorie)
                                <option value="{{ $categorie->id }}"{{ $project->categorie_id == $categorie->id ? 'selected' : '' }}>{{ $categorie->title }}</option>
                            @endforeach
                                
                        </select>
                        <div class="invalid-feedback">{{ $errors->first('id') }} </div>
                    </div>
                </div>
        
                {{--  type="text" value="{{ $project->title }}" placeholder="title"  --}}

                <div class="form-group row"><label class="col-sm-12 col-md-2 col-form-label">Title</label>
                    <div class="col-sm-12 col-md-10"><input
                            class="form-control @error('title') is-invalid
                            @enderror"
                            name="title" type="text" value="{{ $project->title }}" placeholder="title">
                        <div class="invalid-feedback">{{ $errors->first('title') }} </div>
                    </div>
                </div>
                <div class="form-group row"><label class="col-sm-12 col-md-2 col-form-label">Description</label>
                    <div class="col-sm-12 col-md-10">
                        <textarea name="description" class="form-control @error('description') is-invalid @enderror">{{ $project->description }}</textarea>
                        <div class="invalid-feedback">{{ $errors->first('description') }} </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="form-group col-lg-12 "
                        style="overflow: auto;max-height: 235px;padding: 0 !important;display: flex;justify-content: start;align-items: center;">
                        <label class="col-sm-12 col-md-2 col-form-label">Photos</label>
                        @foreach ($photo as $item)
                            <div class="borderImgUnique">
                                <div class="d-flex align-items-center justify-content-center mb-1 w-100">
                                    <input type="radio" @if ($item->principale == 1) @checked(true) @endif
                                        name="principale" value="{{ $item->id }}">
                                    <span class="font-weight-boldest">&nbsp; @if ($item->principale == 1)
                                            principale
                                        @else
                                            set principale
                                        @endif
                                    </span>   
                                </div>
                                <label for="file{{ $item->id }}">
                                    <input type="file"accept="image/*" name="imagesProject[{{ $item->id }}]"
                                        class="file" id="file{{ $item->id }}" onchange="readURL(this, 'blah');"
                                        style="display: none;">
                                    <img id="image{{ $item->id }}" src="{{ asset('storage/' . $item->url) }}"
                                        alt="image-xxxx-xxxx{{ $item->id }}" class="borderImg" />

                                        
                                        {{--  <button id="delete-photo" onclick="deletePhoto({{ $item->id }})">Delete</button>  --}}
                                                                                 
                                </label>
                               
                            </div>
                            
                                                
                        @endforeach
                        @error('images')
                            <div class="invalid-feedback">
                                {{ $errors->first('images') }}
                            </div>
                        @enderror
                    </div>
                </div>
{{--  
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label" name="photo">Add Photos</label>
                        <form method="POST" action="{{ route('admin.project.storeProjectPhoto', $project->id) }}" enctype="multipart/form-data">
                            @csrf
                                <input id="photo" type="file" name="photo" class="form-control-file @error('photo') is-invalid @enderror" required>
                                @error('photo')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                           
                            <button type="submit" class="btn btn-primary">Ajouter</button>
                        </form>
                    </div>
                </div>  --}}

                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Project Finished</label>
                    <div class="col-sm-12 col-md-10">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="finished" value="1" {{ $project->finished ? 'checked' : '' }}>
                            <label class="form-check-label">Yes</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="finished" value="0" {{ $project->finished ? 'checked' : '' }}>
                            <label class="form-check-label">No</label>
                        </div>
                        <div class="invalid-feedback">
                            {{ $errors->first('finished') }}
                        </div>
                    </div>
                </div>

                <div class="form-group row justify-content-between">
                    <div style="margin: 5px 203px;">
                        <a href="{{ route('admin.project.index') }}" class="btn btn-dark "> Return</a>
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
    
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        function deletePhoto(photo_id) {
            if (confirm("Are you sure you want to delete this photo?")) {
                axios.delete(`/project/{{ $project->id }}/photo/${photo_id}`)
                    .then(response => {
                        console.log(response);
                        location.reload();
                    })
                    .catch(error => {
                        console.log(error);
                    });
            }
        }
    </script>
    
        

@endsection
