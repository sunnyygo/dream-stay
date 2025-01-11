@extends('dashboard-admin')

@section('content')
<div class="mb-4">
    <h2>Edit Admin</h2>
</div>

<form action="{{ route('admins.update', $admin->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ $admin->name }}" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" value="{{ $admin->email }}" required>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Leave blank to keep current password">
    </div>
    <div class="mb-3">
        <label for="role" class="form-label">Role</label>
        <select class="form-control" id="role" name="role" required>
            <option value="admin" {{ $admin->role == 'admin' ? 'selected' : '' }}>Admin</option>
            <option value="superadmin" {{ $admin->role == 'superadmin' ? 'selected' : '' }}>Super Admin</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection
