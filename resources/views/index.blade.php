@extends('welcome')
@section('content')
{{-- <link rel="stylesheet" type="text/css" href="{{ asset('css/shoes.css') }}"> --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

<div class="index-div">
    <h1>Sneaker Reviews</h1>
    <ul class="index-ul">
        @foreach ($sneakers as $sneaker)
        <li>
            <a style="text-decoration:none" href="sneakers/{{$sneaker->id}}">
                <div class="sneaker-card">
                    <div class="like-container">
                        <form action="{{ route('sneakers.like', $sneaker) }}" method="POST" class="like-form">
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
                    <a href="sneakers/{{$sneaker->id}}" class="detail-link">Detail</a>
                    <a href="https://stockx.com/search?s={{ $sneaker->name }}" class="shop-link">Go to Shop</a>
                </div>
            </a>
        </li>
        @endforeach
    </ul>
</div>
@endsection





{{-- @extends('welcome')
@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <div class="index-div">
        <h1>Sneaker Reviews</h1>
        <ul class="index-ul">
            @foreach ($sneakers as $sneaker)
                <li>
                    <div class="sneaker-card">
                        <img src='{{ $sneaker->image }}'>
                        <h2>{{ $sneaker->name }}</h2>
                        @auth
                            <form action="{{ route('sneakers.like', $sneaker) }}" method="POST" class="like-form">
                                @csrf
                                <button type="submit" class="like-button">
                                    @if (Auth::user()->likes->contains('sneaker_id', $sneaker->id))
                                        <i class="fas fa-heart liked"></i>
                                    @else
                                        <i class="far fa-heart"></i>
                                    @endif
                                </button>
                            </form>
                        @else
                            <button class="like-button" disabled>
                                @if (Auth::check() && Auth::user()->likes->contains('sneaker_id', $sneaker->id))
                                    <i class="fas fa-heart liked"></i>
                                @else
                                    <i class="far fa-heart"></i>
                                @endif
                            </button>
                        @endauth
                    </div>
                    <div class="button_dis">
                        <a href="sneakers/{{ $sneaker->id }}" class="detail-link">Detail</a>
                        <a href="https://stockx.com/search?s={{ $sneaker->name }}" class="shop-link">Go to Shop</a>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>

@endsection --}}
