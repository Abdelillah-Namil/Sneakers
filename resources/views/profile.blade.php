@extends('welcome')
@section('content')
    <div class="profilepage">
        <div class="profilecard">
            <div class="card">

                <div class="card-border-top">
                </div>
                <div class="img" style="background-image: url({{ $user->profile_image }}) ">
                </div>
                <span> {{ $user->name }}</span>
                <p class="job"> {{ $user->email }}</p>
                <p class="job"> {{ $user->bio }}</p>
                <a href="{{ route('users.showEditForm') }}" class="btn btn-edit">Edit</a>
                <form action="{{ route('users.destroy') }}" method="POST"
                    onsubmit="return confirm('Are you sure you want to delete your account?')">
                    @csrf
                    @method('POST')
                    <button type="submit" class="btn btn-delete">Delete My Account</button>
                </form>



                <form action="{{ route('users.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-logout">Logout</button>
                </form>
            </div>

        </div>


        <div class="index-div-profile">
            <h1>Liked Sneaker</h1>

            @if ($sneakers->count() > 0)
                <ul class="index-ul">
                    @foreach ($sneakers as $sneaker)
                        <li>
                            <a style="text-decoration:none" href="sneakers/{{ $sneaker->id }}">
                                <div class="sneaker-card">
                                    <div class="like-container">
                                        <form action="{{ route('sneakers.like', $sneaker) }}" method="POST"
                                            class="like-form">
                                            @csrf
                                            <button type="submit" class="like-button">
                                                @if (Auth::user()->likes->contains('sneaker_id', $sneaker->id))
                                                    <i class="fas fa-heart liked"></i>
                                                @else
                                                    <i class="far fa-heart"></i>
                                                @endif
                                            </button>
                                        </form>
                                    </div>
                                    <img src='{{ $sneaker->image }}'>
                                    <h2>{{ $sneaker->name }}</h2>
                                </div>
                                <div class="button_dis">
                                    <a href="sneakers/{{ $sneaker->id }}" class="detail-link">Detail</a>
                                    <a href="https://stockx.com/search?s={{ $sneaker->name }}" class="shop-link">Go to
                                        Shop</a>
                                </div>
                            </a>
                        </li>
                    @endforeach
                </ul>
            @else
                <p>No liked sneakers found.</p>
            @endif
        </div>
    </div>

@endsection
