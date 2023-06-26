@extends('welcome')

@section('content')
    <div class="container">
        <h1>Edit Profile</h1>

        <form action="{{ route('users.update') }}" method="POST" enctype="multipart/form-data" class="editeform">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="profile_image">Profile Image</label>
                <input type="file" id="profile_image" name="profile_image" class="form-control">
            </div>

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" value="{{ $user->name }}" class="form-control">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ $user->email }}" class="form-control">
            </div>

            <div class="form-group">
                <label for="bio">Bio</label>
                <textarea id="bio" name="bio" class="form-control">{{ $user->bio }}</textarea>
            </div>

            <div class="form-group">
                <label for="password">New Password</label>
                <input type="password" id="password" name="password" class="form-control">
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
