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
        <h1>Contacts</h1>

        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>email</th>
                        <th>message</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($contacts as $contact)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $contact->name }}</td>
                            <td>{{ $contact->email }}</td>
                            <td>{{ $contact->message }}</td>
                            <td>
                                <div class="action-buttons">
                                    <form action="{{ route('contacts.destroy', ['contact' => $contact->id]) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Are you sure you want to delete this contact?')">Delete</button>
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
