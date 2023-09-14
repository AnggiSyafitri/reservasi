@extends('layouts.admin')
@section('main-content')
<div class="row page-titles">
    <ol class="breadcrumb">
        {{-- <li class="breadcrumb-item active"><a href="javascript:void(0)">App</a></li> --}}
        <li class="breadcrumb-item"><a href="javascript:void(0)">King Kuphi / Admin / Profile</a></li>
    </ol>
</div>
<!-- row -->
<div class="row">
    <div class="col-lg-12">
        <div class="profile card card-body px-3 pt-3 pb-0">
            <div class="profile-head">
                <div class="photo-content">
                    <div class="cover-photo rounded"></div>
                </div>
                <div class="profile-info">
                    <div class="profile-photo">
                        <img src="/images/profile/{{ Auth::user()->profile }}"
                            class="img-fluid border border-primary rounded-circle" alt="">
                    </div>
                    <div class="profile-details">
                        <div class="profile-name px-3 pt-2">
                            <h4 class="text-primary mb-0">{{ Auth::user()->username }}</h4>
                            <p>{{ Auth::user()->name }}</p>
                        </div>
                    </div>
                </div>
                @if(session('success2'))
                <div class="alert alert-success my-3" role="alert">
                    {{ session('success2') }}
                  </div>
                @endif
                @if (session('error'))
                <div class="alert alert-danger  my-3">
                    {{ session('error') }}
                </div>
                @endif
                @if(session('success'))
                <div class="alert alert-success my-3" role="alert">
                    {{ session('success') }}
                  </div>
                @endif
                <div class="row">
                    <div class="col-xl-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="profile-tab">
                                    <div class="custom-tab-1">
                                        <ul class="nav nav-tabs">
                                            <li class="nav-item"><a href="#profile" data-bs-toggle="tab"
                                                    class="nav-link active show">Profile</a>
                                            </li>
                                            <li class="nav-item"><a href="#password" data-bs-toggle="tab"
                                                    class="nav-link">Password</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <div id="profile" class="tab-pane fade active show">
                                                <div class="my-post-content pt-3">
                                                    <div class="my-4">
                                                        <h3 class="text-primary"><b>Edit Profile</b></h3>
                                                        <form action="{{ route('editProfile') }}" class="mt-3" method="POST">
                                                            @csrf
                                                            <div class="mb-3">
                                                                <label for="username">Username :</label>
                                                                <input type="text"
                                                                    class="form-control @error('username') is-invalid @enderror"
                                                                    name="username" id="username" placeholder="Username"
                                                                    value="{{ Auth::user()->username }}">
                                                                @error('username')
                                                                    <div id="username" class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror

                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="name">Name :</label>
                                                                <input type="text"
                                                                    class="form-control @error('name') is-invalid @enderror"
                                                                    name="name" id="name" placeholder="Name"
                                                                    value="{{ Auth::user()->name }}">
                                                                    @error('name')
                                                                    <div id="name" class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                            <div class="mb-3">
                                                                <button type="submit"
                                                                    class="btn btn-primary">Edit</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="password" class="tab-pane fade">
                                                <div class="my-4">
                                                    <h3 class="text-primary"><b>Ganti Password</b></h3>
                                                    <form action="{{ route('editProfile') }}" class="mt-3" method="post">
                                                        @csrf
                                                        <div class="mb-3">
                                                            <label for="current_password">Current Password :</label>
                                                            <input type="password" class="form-control @error('current_pasword') is-invalid @enderror"
                                                                name="current_password" id="current_password"
                                                                placeholder="Current Password">
                                                                @error('current_password')
                                                                <div id="current_password" class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="new_password">New Password :</label>
                                                            <input type="password" class="form-control @error('new_pasword') is-invalid @enderror"
                                                                name="new_password" id="new_password"
                                                                placeholder="New Password">
                                                                @error('new_password')
                                                                <div id="new_password" class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                        {{-- <div class="mb-3">
                                                            <input type="password" class="form-control"
                                                                name="confirmpassword" id="confirmpassword"
                                                                placeholder="Konfirmasi Password">
                                                        </div> --}}
                                                        <div class="mb-3">
                                                            <button type="submit" class="btn btn-primary">Edit</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
