@extends('app')


@section('content')
    <!-- Breadcrumb -->
    <div class="container mx-auto px-4 py-4">
      <div class="text-gray-600">
        <a class="hover:text-blue-600" href="#">Home</a> /
        <span>Room Details</span>
      </div>
    </div>
    <!-- Main Content -->
    <div class="container mx-auto px-4 py-8">
      <div class="text-4xl font-bold text-gray-800 mb-2">{{ $room->name }}</div>
      <div class="text-lg text-gray-500 mb-8">Dream Stay</div>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
        <div class="col-span-1 md:col-span-2">
            @if($room->image1)
                <img
                    alt="{{ $room->name }}"
                    class="rounded-lg w-full h-[660px]"
                    src="{{ asset('images/' . $room->image1->file_name) }}"
                />
            @else
                <img
                    alt="Default Image"
                    class="rounded-lg w-full"
                    src="https://placehold.co/800x400"
                />
            @endif
        </div>
        <div class="grid grid-cols-1 gap-4">
            @if($room->image2)
                <img
                    alt="{{ $room->name }}"
                    class="rounded-lg w-full h-80 object-cover"
                    src="{{ asset('images/' . $room->image2->file_name) }}"
                />
            @else
                <img
                    alt="Default Image"
                    class="rounded-lg w-full h-5"
                    src="https://placehold.co/400x200"
                />
            @endif
            @if($room->image3)
                <img
                    alt="{{ $room->name }}"
                    class="rounded-lg w-full h-80 object-cover"
                    src="{{ asset('images/' . $room->image3->file_name) }}"
                />
            @else
                <img
                    alt="Default Image"
                    class="rounded-lg w-full"
                    src="https://placehold.co/400x200"
                />
            @endif
        </div>
    </div>
    
      </div>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <div class="col-span-1 md:col-span-2">
          <div class="text-2xl font-bold text-gray-800 mb-4">
            About the place
          </div>
          <p class="text-gray-600 leading-relaxed">
            {{ $room->description }}
          </p>
          <p class="text-gray-600 leading-relaxed mt-4">
            Such trends saw the demise of the soul-infused techno that typified
            the original Detroit sound. Robert Hood has noted that he and Daniel
            Bell both realized something was missing from techno in the
            post-rave era.
          </p>
        </div>
        <div class="col-span-1">
          <div class="bg-white shadow-md rounded-lg p-6">
            <div class="text-lg font-bold text-gray-800 mb-2">
              Start Booking
            </div>
            <div class="text-3xl font-bold text-gray-800 mb-4">
              Rp.{{ number_format($room->price) }} <span class="text-lg font-normal">per Day</span>
            </div>
            <a href="{{ route('payment.show', $room->id) }}"><button
              class="bg-blue-600 text-white font-bold py-2 px-4 rounded-lg w-full hover:bg-blue-700"
            >
              Book Now!
            </button></a>
          </div>
        </div>
      </div>
      <div class="flex justify-around items-center py-8">
        <div class="text-center">
          <i class="fas fa-bed text-3xl text-blue-600"> </i>
          <p class="mt-2">1 bedroom</p>
        </div>
        <div class="text-center">
          <i class="fas fa-couch text-3xl text-pink-600"> </i>
          <p class="mt-2">1 living room</p>
        </div>
        <div class="text-center">
          <i class="fas fa-bath text-3xl text-blue-600"> </i>
          <p class="mt-2">1 bathroom</p>
        </div>
        <div class="text-center">
          <i class="fas fa-utensils text-3xl text-pink-600"> </i>
          <p class="mt-2">1 dining room</p>
        </div>
        <div class="text-center">
          <i class="fas fa-wifi text-3xl text-pink-600"> </i>
          <p class="mt-2">10 mbp/s</p>
        </div>
        <div class="text-center">
          <i class="fas fa-snowflake text-3xl text-blue-600"> </i>
          <p class="mt-2">7 unit ready</p>
        </div>
        <div class="text-center">
          <i class="fas fa-tv text-3xl text-pink-600"> </i>
          <p class="mt-2">1 refrigator</p>
        </div>
        <div class="text-center">
          <i class="fas fa-tv text-3xl text-pink-600"> </i>
          <p class="mt-2">2 television</p>
        </div>
      </div>
      <div class="py-8">
        <h2 class="text-2xl font-bold mb-4">Treasure to Choose</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
          <div class="text-center">
            <img
              alt="Adventure image"
              class="rounded-lg"
              height="200"
              src="https://storage.googleapis.com/a1aa/image/eR5eijGituk0EE4SDNjzF0sFYs76tbKifCrTjgq0EdbLjifPB.jpg"
              width="300"
            />
            <h3 class="mt-2 text-lg font-bold">Adventure</h3>
            <p class="text-gray-500">Nature</p>
          </div>
          <div class="text-center">
            <img
              alt="Telaga Warna image"
              class="rounded-lg"
              height="200"
              src="https://storage.googleapis.com/a1aa/image/PENXGJdUEVryORNbewWC0SF09BnSiyYzpiiyKwCRoa3xo4fTA.jpg"
              width="300"
            />
            <h3 class="mt-2 text-lg font-bold">Telaga Warna</h3>
            <p class="text-gray-500">Nature</p>
          </div>
          <div class="text-center">
            <img
              alt="Pemandian air hangat image"
              class="rounded-lg"
              height="200"
              src="https://storage.googleapis.com/a1aa/image/jji0w1D8dVLeDyrH4Kw16crsN5iUnEocWymBA7Q5271zo4fTA.jpg"
              width="300"
            />
            <h3 class="mt-2 text-lg font-bold">Pemandian air hangat</h3>
            <p class="text-gray-500">Nature</p>
          </div>
          <div class="text-center">
            <img
              alt="Candi image"
              class="rounded-lg"
              height="200"
              src="https://storage.googleapis.com/a1aa/image/zpmbeTYWYZT9ba9cqXfZnlsSUyr3aTgspxPnBKAgg54hRxfnA.jpg"
              width="300"
            />
            <h3 class="mt-2 text-lg font-bold">Candi</h3>
            <p class="text-gray-500">Nature</p>
          </div>
        </div>
      </div>
    </div>
    <div class="bg-gray-100 py-8">
      <div
        class="container mx-auto px-4 flex flex-col md:flex-row justify-between items-center"
      >
        <div class="text-center md:text-left">
          <h2 class="text-2xl font-bold text-blue-600">DreamStay.</h2>
          <p class="text-gray-500 mt-2">
            We kaboom your beauty holiday instantly and memorable.
          </p>
        </div>
        <div class="mt-4 md:mt-0">
          <h3 class="text-lg font-semibold">Become hotel Owner</h3>
          <button class="mt-2 bg-blue-600 text-white px-4 py-2 rounded">
            Register Now
          </button>
        </div>
      </div>
    </div>
    <div class="bg-blue-600 py-4"></div>
@endsection