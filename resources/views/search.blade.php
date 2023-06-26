@extends('welcome')

@section('content')
  <div class="search-results1">
    <h2>Search Results</h2>
    @if ($sneakers->isEmpty())
      <p>No search Results found.</p>
    @else
  
       <ul class="index-ul">
        @foreach ($sneakers as $sneaker)
        <li style="text-align: center">
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
                  <a href="{{ route('sneakers.detail', ['id' => $sneaker->id]) }}" class="detail-link">Detail</a>
                  {{-- <a href="sneakers/{{$sneaker->id}}" class="detail-link">Detail</a> --}}
                    <a href="https://stockx.com/search?s={{ $sneaker->name }}" class="shop-link">Go to Shop</a>
                </div>
            </a>
        </li>
        @endforeach
    </ul>

    @endif
  </div>
@endsection
