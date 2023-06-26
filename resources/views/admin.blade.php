<!DOCTYPE html>
<html>

<head>
    <title>SFL admin</title>


    <link rel="stylesheet" type="text/css" href="{{ asset('css/navbar.css') }}">

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
                <a href="/admin">Sneakers</a>
                <a href="/admincontacts">Contacts</a>
                <form action="{{ route('users.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="logout-btn">Logout</button>
                </form>
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



</body>

</html>
