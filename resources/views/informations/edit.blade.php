@extends('layouts.admin')
@section('main-content')

<div class="row page-titles mx-0">
    <div class="col-sm-6 p-md-0">
        <div class="welcome-text">
            <h4>Edit</h4>
            <span>Information</span>
        </div>
    </div>
    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
    </div>
</div>

<div class="row">

    <div class="col-12">
        <div class="card">
            <div class="card-body">
                @if(session('success'))
                <div class="alert alert-success my-3" role="alert">
                    {{ session('success') }}
                  </div>
                @endif
                <form action="{{ route('informations.update', $data->id) }}" enctype="multipart/form-data" method="post">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="">Title</label>
                        <input type="text" name="title" value="{{ $data->title }}" class="form-control @error('title') is-invalid @enderror">
                        @error('title')
                        <div id="title" class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="">Description</label>
                        <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="" cols="30" rows="10">{{ $data->description }}
                        </textarea>
                        @error('description')
                        <div id="description" class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="">File</label>
                        <input type="file" name="file" class="form-control @error('file') is-invalid @enderror">
                        @error('file')
                        <div id="file" class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                        <div class="mt-3">
                            <a target="_blank" href="{{ '/uploads/informations/'.$data->file }}">
                                <i class="fa fa-file-pdf"></i> {{ $data->file }}
                            </a>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="">Image</label>
                        <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                        @error('image')
                        <div id="image" class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                        <div class="mt-3 p-3">
                            <img src="{{ '/uploads/informations/'.$data->image }}" width="128" class="img-fluid rounded" alt="">
                        </div>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary me-2">Edit</button>
                        <a href="{{ route('informations.index') }}" class="btn btn-secondary">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
@section('script')

@endsection
