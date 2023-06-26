@extends('welcome')
@section('content')
    <div class="login-box">

        <form method="POST" action="{{ route('users.login') }}">
            @csrf
            <div class="user-box">
                <input type="email" name="email" placeholder="email" required autocomplete="email" autofocus>

            </div>
            <div class="user-box">
                <input type="password" class="form-input" name="password" placeholder="password"
                required autocomplete="current-password">
            </div>
            {{-- <a type="submit">
                SEND
                <span></span>
            </a> --}}
            <button type="submit" class="submit">
                Log in
                <span></span>

            </button>
        </form>
    </div>
@endsection
