@extends('admin')

@section('content')
    <style>
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        .btn-primary {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>

    <div class="container">
        <h1>Edit Sneaker</h1>

        <form action="{{ route('sneakers.update', $sneaker->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" value="{{ $sneaker->name }}" class="form-control">
            </div>

            
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" id="image" name="image" class="form-control">
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <input id="description" name="description" class="form-control"  value="{{ $sneaker->description }}" >
            </div>
            

            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" id="price" name="price" value="{{ $sneaker->price }}" class="form-control">
            </div>

            <div class="form-group">
                <label for="gender">Gender</label>
                <select id="gender" name="gender" class="form-control">
                    <option value="male" @if ($sneaker->gender == 'male') selected @endif>Male</option>
                    <option value="female" @if ($sneaker->gender == 'female') selected @endif>Female</option>
                </select>
            </div>

            <div class="form-group">
                <label for="brand">Brand</label>
                <input type="text" id="brand" name="brand" value="{{ $sneaker->brand }}" class="form-control">
            </div>

            <div class="form-group">
                <label for="color">Color</label>
                <input type="text" id="color" name="color" value="{{ $sneaker->color }}" class="form-control">
            </div>

            <div class="form-group">
                <label for="sizes">Sizes</label>
                <input type="text" id="sizes" name="sizes" class="form-control" value="{{ $sneaker->sizes }}">
                <small class="form-text text-muted">Enter sizes separated by commas (e.g., 8, 9, 10)</small>
            </div>
            


            <div class="form-group">
                <label for="release_date">Release Date</label>
                <input type="date" id="release_date" name="release_date" value="{{ $sneaker->release_date }}"
                    class="form-control">
            </div>


            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection


{{-- 
@extends('admin')

@section('content')
    <style>
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        .btn-primary {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>

    <div class="container">
        <h1>Edit Sneaker</h1>

        <form action="{{ route('sneakers.update', $sneaker->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" value="{{ $sneaker->name }}" class="form-control">
            </div>

            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" id="price" name="price" value="{{ $sneaker->price }}" class="form-control">
            </div>

            <div class="form-group">
                <label for="gender">Gender</label>
                <select id="gender" name="gender" class="form-control">
                    <option value="male" @if ($sneaker->gender == 'male') selected @endif>Male</option>
                    <option value="female" @if ($sneaker->gender == 'female') selected @endif>Female</option>
                </select>
            </div>

            <div class="form-group">
                <label for="brand">Brand</label>
                <input type="text" id="brand" name="brand" value="{{ $sneaker->brand }}" class="form-control">
            </div>

            <div class="form-group">
                <label for="color">Color</label>
                <input type="text" id="color" name="color" value="{{ $sneaker->color }}" class="form-control">
            </div>

            <div class="form-group">
                <label for="sizes">Sizes</label>
                <input type="text" id="sizes" name="sizes" value="{{ $sneaker->sizes }}" class="form-control">
            </div>


            <div class="form-group">
                <label for="release_date">Release Date</label>
                <input type="date" id="release_date" name="release_date" value="{{ $sneaker->release_date }}"
                    class="form-control">
            </div>

            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" id="image" name="image" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection --}}
