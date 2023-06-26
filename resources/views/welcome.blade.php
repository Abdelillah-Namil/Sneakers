<!DOCTYPE html>
<html>

<head>
    <link rel="shortcut icon" href="https://res.cloudinary.com/dmflq8bdu/image/upload/v1687201513/sneakers-for-life-low-resolution-logo-black-on-transparent-background_k71wo7.png" type="image/png">
    <title>Sneaker Reviews</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/navbar.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/shoes.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/details.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/contact.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/service.css') }}">
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('css/search.css') }}"> --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('css/foter.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bar.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/login.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/profile.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/error.css') }}">



    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>


    <div class="nav">
        <input type="checkbox" id="nav-check">
        <div class="nav-header">
            <div class="nav-title">
                <img src="https://res.cloudinary.com/dmflq8bdu/image/upload/v1687201513/sneakers-for-life-low-resolution-color-logo_a8xq7e.png"
                    alt="Logo">
            </div>
        </div>
        <div class="nav-links">
            <a href="/">Home</a>
            @auth
                <a href="/sneakers">Sneakers</a>
                <a href="/contact">Contact</a>
                <a href="/profile">Profile</a>
                <form action="{{ route('users.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="logout-btn">Logout</button>
                </form>
            @else
                <a href="/login">Login</a>
                <a href="/register">Sign Up</a>
            @endauth
            @auth
                <div class="search-bar">
                    <form action="{{ route('sneakers.search') }}" method="GET">
                        <input type="text" name="keyword" placeholder="Search sneakers">
                        <button type="submit"><i class="fas fa-search"></i></button>
                    </form>
                    
                </div>
            @endauth
        </div>
        <div class="nav-btn">
            <label for="nav-check">
                <span></span>
                <span></span>
                <span></span>
            </label>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script>
            $(document).ready(function() {
                $(window).scroll(function() {
                    if ($(this).scrollTop() > 0) {
                        $('.nav').addClass('fixed');
                    } else {
                        $('.nav').removeClass('fixed');
                    }
                });
            });
        </script>
    </div>


    <div class="content">

        @yield('content')
    </div>

    <footer>
        <div class="footer-content">
            <h3 style="color: grey">Stay connected</h3>
            <ul class="social-links">
                <li><a href="#" class="twitter"><i class="fab fa-twitter"></i></a></li>
                <li><a href="#" class="instagram"><i class="fab fa-instagram"></i></a></li>
                <li><a href="#" class="facebook"><i class="fab fa-facebook"></i></a></li>
            </ul>
            <p>Follow us on social media to stay up-to-date with the latest sneaker releases and trends.</p>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2023 Sneakers For Life. All rights reserved. by Abdelillah Namil</p>
        </div>
    </footer>


</body>

</html>
