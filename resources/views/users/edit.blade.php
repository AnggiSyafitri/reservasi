@extends('layouts.admin')
@section('main-content')

<div class="row page-titles mx-0">
    <div class="col-sm-6 p-md-0">
        <div class="welcome-text">
            <h4>Edit</h4>
            <span>User</span>
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
                <form action="{{ route('users.update',['user' => $data->id]) }}" method="post">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label for="">Name</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ $data['name']}}">
                        @error('name')
                        <div id="name" class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="">Username</label>
                        <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" value="{{ $data['username']}}">
                        @error('username')
                        <div id="username" class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="">Role</label>
                        <select name="role" class="form-control select @error('role') is-invalid @enderror" id="">
                            @if ($data['role'] == 'admin')
                            <option value="admin" selected>Admin</option>
                            <option value="staff">Staff</option>
                            @endif
                            @if ($data['role'] == 'staff')
                            <option value="admin">Admin</option>
                            <option value="staff" selected>Staff</option>
                            @endif
                        </select>
                        @error('role')
                        <div id="role" class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="">Password</label>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
                        @error('password')
                        <div id="password" class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary me-2">Edit</button>
                        <a href="{{ route('users.index') }}" class="btn btn-secondary">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
@section('script')

@endsection
