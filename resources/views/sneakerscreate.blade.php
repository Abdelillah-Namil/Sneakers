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
        <h1>Create Sneaker</h1>

        <form action="{{ route('sneakers.store') }}" method="POST" enctype="multipart/form-data" class="create-form">
            @csrf

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" class="form-control">
            </div>

            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" id="image" name="image" class="form-control">
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description" class="form-control"></textarea>
            </div>

            <div class="form-group">
                <label for="price">Price</label>
                <input type="text" id="price" name="price" class="form-control">
            </div>

            <div class="form-group">
                <label for="gender">Gender</label>
                <select id="gender" name="gender" class="form-control">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            </div>

            <div class="form-group">
                <label for="brand">Brand</label>
                <input type="text" id="brand" name="brand" class="form-control">
            </div>

            <div class="form-group">
                <label for="color">Color</label>
                <input type="text" id="color" name="color" class="form-control">
            </div>

            <div class="form-group">
                <label for="sizes">Sizes</label>
                <input type="text" id="sizes" name="sizes" class="form-control">
                <small class="form-text text-muted">Enter sizes separated by commas (e.g., 8, 9, 10)</small>
            </div>


            <div class="form-group">
                <label for="release_date">Release Date</label>
                <input type="date" id="release_date" name="release_date" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection



