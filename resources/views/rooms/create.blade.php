@extends('dashboard-admin')

@section('content')
<div class="container">
    <h2>Tambah Room</h2>
    <form action="{{ route('rooms.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" name="price" id="price" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <label for="available" class="form-check-label">Available</label>
            <input type="checkbox" name="available" id="available" class="form-check-input" checked>
        </div>
        <div class="mb-3">
            <label for="favorite" class="form-check-label">Favorite</label>
            <input type="checkbox" name="favorite" id="favorite" class="form-check-input">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
