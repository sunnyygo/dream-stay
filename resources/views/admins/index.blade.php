@extends('dashboard-admin')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Manage Admins</h2>
    <a href="{{ route('admins.create') }}" class="btn btn-success">Add New Admin</a>
</div>

@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($admins as $admin)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $admin->name }}</td>
            <td>{{ $admin->email }}</td>
            <td>{{ $admin->role }}</td>
            <td>
                <a href="{{ route('admins.edit', $admin->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('admins.destroy', $admin->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
