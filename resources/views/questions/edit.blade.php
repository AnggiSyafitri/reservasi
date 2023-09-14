@extends('layouts.admin')
@section('main-content')

<div class="row page-titles mx-0">
    <div class="col-sm-6 p-md-0">
        <div class="welcome-text">
            <h4>Edit</h4>
            <span>Question</span>
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
                <form action="{{ route('questions.update', $data->id) }}" enctype="multipart/form-data" method="post">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="">Question</label>
                        <input type="text" name="question" value="{{ $data->question }}" class="form-control @error('question') is-invalid @enderror">
                        @error('question')
                        <div id="name" class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="">Answer</label>
                        <x-trix-field name="answer" id="answer" value="{!! $data->answer !!}" />
                        @error('answer')
                        <div id="file" class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary me-2">Edit</button>
                        <a href="{{ route('questions.index') }}" class="btn btn-secondary">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
@section('script')

@endsection
