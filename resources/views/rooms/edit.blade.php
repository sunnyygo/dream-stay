@extends('dashboard-admin')

@section('content')
<div class="container">
    <h2>{{ isset($room) ? 'Edit Room' : 'Add Room' }}</h2>
    <form action="{{ isset($room) ? route('rooms.update', $room) : route('rooms.store') }}" method="POST">
        @csrf
        @if(isset($room))
            @method('PUT')
        @endif

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $room->name ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" name="price" id="price" class="form-control" value="{{ old('price', $room->price ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control">{{ old('description', $room->description ?? '') }}</textarea>
        </div>

        <!-- Input untuk Available -->
<input type="hidden" name="available" value="0">
<div class="mb-3 form-check">
    <input type="checkbox" name="available" id="available" class="form-check-input" 
           value="1" {{ old('available', $room->available ?? false) ? 'checked' : '' }}>
    <label for="available" class="form-check-label">Available</label>
</div>

<!-- Input untuk Favorite -->
<input type="hidden" name="favorite" value="0">
<div class="mb-3 form-check">
    <input type="checkbox" name="favorite" id="favorite" class="form-check-input" 
           value="1" {{ old('favorite', $room->favorite ?? false) ? 'checked' : '' }}>
    <label for="favorite" class="form-check-label">Favorite</label>
</div>


        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection
