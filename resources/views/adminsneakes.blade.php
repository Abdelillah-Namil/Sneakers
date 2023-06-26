@extends('admin')

@section('content')
    <style>
        .containerr {
            text-align: center
        }

        /* Custom CSS for Sneakers table */
        .table-responsive {
            overflow-x: auto;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table th,
        .table td {
            padding: 10px;
        }

        .table th {
            background-color: #f8f9fa;
            color: #333;
            font-weight: bold;
            text-align: left;
        }

        .table tr:nth-child(even) {
            background-color: #f8f9fa;
        }

        .table tr:hover {
            background-color: #e9ecef;
        }

        .sneaker-image-container {
            width: 50px;
            height: 50px;
            overflow: hidden;
            border-radius: 50%;
        }

        .sneaker-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .action-buttons .btn {
            margin-right: 5px;
        }

        .action-buttons .btn:last-child {
            margin-right: 0;
        }
    </style>
    <div class="containerr">
        <h1>Sneakers</h1>

        <!-- Button to create a new sneaker -->
        <a href="/sneakers_create" class="btn btn-primary mb-3">Create New Sneaker</a>

        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>description</th>
                        <th>Price</th>
                        <th>Gender</th>
                        <th>Brand</th>
                        <th>Color</th>
                        <th>Sizes</th>
                        <th>Release Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sneakers as $sneaker)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $sneaker->name }}</td>
                            <td>
                                <div class="sneaker-image-container">
                                    <img src="{{ $sneaker->image }}" alt="Sneaker Image" class="sneaker-image">
                                </div>
                            </td>
                            <td>{{ $sneaker->description }}</td>
                            <td>{{ $sneaker->price }}</td>
                            <td>{{ $sneaker->gender }}</td>
                            <td>{{ $sneaker->brand }}</td>
                            <td>{{ $sneaker->color }}</td>
                            <td>{{ $sneaker->sizes }}</td>

                            
                            <td>{{ $sneaker->release_date }}</td>
                            <td>
                                <div class="action-buttons">
                                    <!-- Edit button -->
                                    <a href="{{ route('sneakers.edit', ['sneaker' => $sneaker->id]) }}" class="btn btn-primary mb-3">Edit</a>
                                    <!-- Delete button -->
                                    <form action="{{ route('sneakers.destroy', ['sneaker' => $sneaker->id]) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Are you sure you want to delete this sneaker?')">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection




