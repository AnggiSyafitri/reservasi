@extends('layouts.blank')
@section('main')
<div class="container mt-4">
    <div class="row justify-content-center h-100 align-items-center">
        <div class="col-md-6">
            <div class="authincation-content">
                <div class="row no-gutters">
                    <div class="col-xl-12">
                        <div class="auth-form">
                            <div class="text-center mb-3">
                                <img class="logo-abr" width="50" src="images/logo.png" alt="">
                                <h3 class="text-primary fw-bold brand-title">King Kuphi</h3>
                            </div>
                            <h4 class="text-center mb-4">Sign in your account</h4>
                            <form action="" method="post">
                                @csrf
                                <div class="form-group">
                                    <label class="mb-1"><strong>Username</strong></label>
                                    <input type="text" class="form-control @error('username') is-invalid @enderror" placeholder="Username" name="username" id="username"
                                        required>
                                    @error('username')
                                    <div id="type" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="mb-1"><strong>Password</strong></label>
                                    <input type="password" class="form-control" name="password" id="password"
                                        placeholder="Password">
                                    @error('password')
                                    <div id="type" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-row d-flex justify-content-between mt-4 mb-2">
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox ms-1">
                                            <input type="checkbox" class="custom-control-input" id="basic_checkbox_1">
                                            <label class="custom-control-label" for="basic_checkbox_1">Remember my
                                                preference</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary btn-block">Sign Me In</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
