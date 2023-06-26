@extends('welcome')
@section('content')
    <div class="login-box">

        <form method="POST" action="{{ route('users.register') }}">
            @csrf
            <div class="user-box">
                <input placeholder="name" type="text" class="form-input" name="name"  required autofocus>

            </div>
            <div class="user-box">
                <input placeholder="email" type="email" class="form-input" name="email"  required>

            </div>
            <div class="user-box">
                <input placeholder="password" type="password" class="form-input" name="password"  required>

            </div>
            <div class="user-box">
                <input placeholder="password confirmation"  type="password" class="form-input" name="password_confirmation"
                required>

            </div>
            {{-- <a type="submit">
                SEND
                <span></span>
            </a> --}}
            <button type="submit" class="submit">
                Sign UP
                <span></span>

            </button>
            
        </form>
    </div>
@endsection
