@extends('app')

@section('content')
    <h1 class="text-xl font-semibold">Available Rooms</h1>

    @if($rooms->isEmpty())
        <p>No rooms available for the selected dates.</p>
    @else
        <div class="space-y-6">
            @foreach($rooms as $room)
                <!-- Rooms Section -->
                  <div class="space-y-6">
                    <!-- Room 1 -->
                    <div
                      class="bg-white rounded-lg shadow-lg overflow-hidden flex flex-col lg:flex-row h-[350px] object-cover"
                    >
                      <img
                        src="{{ asset('images/' . $room->image1->file_name) }}"
                        alt="A room with a view of a lake and mountains"
                        class="lg:w-1/3"
                      />
                      <div class="p-8 lg:w-2/3">
                        <div class="flex justify-between items-center">
                          <h2 class="text-2xl font-bold text-gray-800">{{ $room->name }}</h2>
                          <span class="bg-blue-100 text-blue-600 px-4 py-2 rounded-lg"
                            >Rp.{{ number_format($room->price)}} per night</span
                          >
                        </div>
                        <p class="text-gray-500 mt-4">
                            {{ $room->description }}
                        </p>
                        <a href="{{ route('room.show', $room->id) }}"><button class="bg-blue-600 text-white px-6 py-2 rounded-lg shadow-lg mt-4 hover:bg-blue-700">Book Now!</button></a>
                      </div>
                    </div>
                  </div>
            @endforeach
        </div>
    @endif
@endsection
