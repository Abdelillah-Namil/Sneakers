@extends('welcome')
@section('content')
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('css/shoes.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css') }}"> --}}

    <div class="details">
        <h1 style="    font-weight: bold;">{{ $sneakers->name }}</h1>

        <ul class="moredetails">




            <li>
                <div class="container">
                    <div class="row ">
                        <div class="col-6"><img class="col-10" src='{{ $sneakers->image }}'></div>
                        <div class="col-6">
                            <h2>{{ $sneakers->name }} </h2>
                            <h3>description : {{ $sneakers->description }}</h3>
                            <h3>price : <span class="blod"> {{ $sneakers->price }}$</span></h3>
                            <h3>gender: <span class="blod"> {{ $sneakers->gender }}</span></h3>
                            <h3>sizes:<span class="blod">
                                    {{ $sneakers->sizes }}
                                </span>
                            </h3>
                            <h3>color:<span class="blod"> {{ $sneakers->color }}</span></h3>




                        </div>


                    </div>


                </div>

            </li>

        </ul>

    </div>
@endsection
