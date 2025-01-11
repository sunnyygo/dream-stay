@extends('dashboard-admin')

@section('content')
<div class="container">
    <h2>Rooms Dashboard</h2>
    <a href="{{ route('rooms.create') }}" class="btn btn-success mb-3">Add Room</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Description</th>
                <th>Available</th>
                <th>Favorite</th>
                <th>Images</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($rooms as $room)
            <tr>
                <td>{{ $room->name }}</td>
                <td>{{ $room->price }}</td>
                <td>{{ $room->description }}</td>
                <td>{{ $room->available ? 'Yes' : 'No' }}</td>
                <td>{{ $room->favorite ? 'Yes' : 'No' }}</td>
                <td>
                    @if($room->image1) <img src="{{ $room->image1->url }}" alt="Image 1" width="50"> @endif
                    @if($room->image2) <img src="{{ $room->image2->url }}" alt="Image 2" width="50"> @endif
                    @if($room->image3) <img src="{{ $room->image3->url }}" alt="Image 3" width="50"> @endif
                </td>
                <td>
                    <a href="{{ route('rooms.edit', $room) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('rooms.destroy', $room) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
