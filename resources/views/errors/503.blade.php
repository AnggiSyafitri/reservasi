@extends('layouts.blank')
@section('main')
<div class="authincation mt-5 h-100">
    <div class="container h-100">
        <div class="row justify-content-center h-100 align-items-center">
            <div class="col-md-5">
                <div class="form-input-content text-center error-page">
                    <h1 class="error-text font-weight-bold">503</h1>
                    <h4><i class="fa fa-times-circle text-danger"></i> Service Unavailable</h4>
                    <p>Sorry, we are under maintenance!</p>
                    <div>
                        <a class="btn btn-primary" href="/">Back to Home</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection