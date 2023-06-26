@extends('welcome')
@section('content')
    <main>

        @if (Session::has('success_alert'))
            {{-- <div
  style="width: 300px,"
class="alert alert-dark position-absolute fixed-bottom" role="alert">
  This is a dark alert—check it out!
</div> --}}
            <div style="width: 300px;" class="alert alert-dark position-absolute fixed-bottom" role="alert" id="msg-alert"
                onclick="this.remove()">
                This is a dark alert—check it out!
            </div>

            <style>
                #msg-alert {
                    animation: fadeOut 3s ease-in-out;
                }

                @keyframes fadeOut {
                    0% {
                        opacity: 1;
                    }

                    90% {
                        opacity: 1;
                    }

                    100% {
                        opacity: 0;
                    }
                }
            </style>

            <script>
                setTimeout(function() {
                    var msgAlert = document.getElementById("msg-alert");
                    if (msgAlert) {
                        msgAlert.remove();
                    }
                }, 3000);
            </script>
        @endif
        <section class="hero background ">
            <div style="color: black">
                <h1>Welcome to Sneakers App</h1>
                <p>Discover the latest and greatest sneakers.</p>
            </div>

            
        </section>



        <section class="featured">
            <h2>Featured Sneakers</h2>
            <div class="grid">
                <div class="card">
                    <img src="https://res.cloudinary.com/dq7kjds8s/image/upload/v1681772614/sneaklair_imgs/img2_pkeqms.png"
                        alt="Sneaker 1">
                    <h3>Nike Air Max</h3>
                    <p>$149.99</p>
                </div>
                <div class="card">
                    <img src="https://res.cloudinary.com/dq7kjds8s/image/upload/v1681772606/sneaklair_imgs/img51_meq23e.webp"
                        alt="Sneaker 2">
                    <h3>Adidas Ultra Boost</h3>
                    <p>$169.99</p>
                </div>
                <div class="card">
                    <img src="https://res.cloudinary.com/dq7kjds8s/image/upload/v1681772612/sneaklair_imgs/img56_bmwxty.webp"
                        alt="Sneaker 3">
                    <h3>Puma RS-X</h3>
                    <p>$129.99</p>
                </div>
            </div>
        </section>

        

        <section class="reviews">
            <h2>Customer Reviews</h2>
            <div class="review-card">
                <img src="https://images.unsplash.com/photo-1597223557154-721c1cecc4b0?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8M3x8ZmFjZXN8ZW58MHx8MHx8&w=1000&q=80g"
                    alt="User 1">
                <h3>John Doe</h3>
                <p>"These sneakers are amazing! They are comfortable and stylish. I highly recommend them."</p>
            </div>
            <div class="review-card">
                <img src="https://www.themoviedb.org/t/p/w235_and_h235_face/wpwC6oB5WD8BijO4G9vsUn69NNY.jpg" alt="User 2">
                <h3>Jane Smith</h3>
                <p>"I'm in love with the sneakers I bought from this app. Great quality and fast delivery."</p>
            </div>
        </section>

        <section class="info">
            <h2>About Sneakers App</h2>
            <p>Sneakers App is your one-stop destination for the latest sneaker releases and exclusive deals. We offer a
                wide range of sneakers from top brands, ensuring that you stay ahead of the game when it comes to style and
                comfort. With our user-friendly interface and secure payment options, shopping for sneakers has never been
                easier. Join our community of sneaker enthusiasts today!</p>
        </section>
    </main>
@endsection
