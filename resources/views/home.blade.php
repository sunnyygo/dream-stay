<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>DreamStay</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css"
      rel="stylesheet"
    />
    <style>
      body {
        font-family: "Roboto", sans-serif;
      }
    </style>
  </head>
  <body class="bg-white text-gray-800">
    <nav class="bg-white shadow-md">
      <div
        class="container mx-auto px-4 py-4 flex justify-between items-center"
      >
        <div class="text-2xl font-bold text-blue-600">
          Dream<span class="text-gray-800">Stay.</span>
        </div>
        <div class="space-x-8 text-gray-600">
          <a class="hover:text-blue-600" href="#">Home</a>
          <a class="hover:text-blue-600" href="#">Rooms</a>
          <a class="hover:text-blue-600" href="#">About</a>
          <a class="hover:text-blue-600" href="#">Contact</a>
        </div>
      </div>
    </nav>
    <main class="flex flex-col items-center mt-12 px-12">
      <div class="flex flex-col md:flex-row items-center md:space-x-12">
        <div class="text-center md:text-left md:w-1/2">
          <h1 class="text-4xl font-bold text-gray-800">
            Forget Busy Work, Start Next Vacation
          </h1>
          <p class="text-gray-500 mt-4">
            We provide what you need to enjoy your holiday with family. Time to
            make another memorable moments.
          </p>
          <button
            class="mt-6 px-6 py-3 bg-blue-600 text-white rounded-lg shadow-md hover:bg-blue-700"
          >
            Show More
          </button>
        </div>

        <div class="mt-12 md:mt-0 md:w-1/2">
          <img
            alt="A cozy room with a large window and a sofa"
            class="rounded-lg shadow-lg"
            height="400"
            src="https://storage.googleapis.com/a1aa/image/ZE3edHr8AVXRcqz42U0WeMK59yXmobiHn4sFxXyOaBGgaaenA.jpg"
            width="600"
          />
        </div>
      </div>
      <div class="mt-12 flex space-x-12">
        <div class="text-center">
          <i class="fas fa-suitcase-rolling text-2xl text-pink-500"></i>
          <p class="text-xl font-bold text-gray-800 mt-2">2500</p>
          <p class="text-gray-500">Users</p>
        </div>
        <div class="text-center">
          <i class="fas fa-camera text-2xl text-pink-500"></i>
          <p class="text-xl font-bold text-gray-800 mt-2">200</p>
          <p class="text-gray-500">treasure</p>
        </div>
        <div class="text-center">
          <i class="fas fa-map-marker-alt text-2xl text-pink-500"></i>
          <p class="text-xl font-bold text-gray-800 mt-2">100</p>
          <p class="text-gray-500">cities</p>
        </div>
      </div>
      <div
        class="mt-12 bg-blue-50 p-6 rounded-lg shadow-md flex flex-col sm:flex-row items-center space-y-4 sm:space-y-0 sm:space-x-4"
      >
        <div class="relative">
          <button
            class="flex items-center px-4 py-2 bg-white text-gray-700 rounded-lg shadow-md hover:bg-gray-100"
            id="check-available-btn"
          >
            <i class="fas fa-calendar-alt mr-2"> </i>
            <span id="check-available-text"> Check Available </span>
          </button>
          <input
            class="hidden absolute top-12 left-0 bg-white border border-gray-300 rounded-lg shadow-md p-2"
            id="date-picker"
            placeholder="Select Date"
            type="text"
          />
        </div>
        <div class="relative">
          <div
            id="person-dropdown-btn"
            class="flex items-center px-4 py-2 bg-white text-gray-700 rounded-lg shadow-md hover:bg-gray-100 cursor-pointer"
          >
            <i class="fas fa-user mr-2"></i>
            Person
            <span class="ml-2">2</span>
            <i class="fas fa-caret-down ml-2"></i>
          </div>
          <div
            id="person-dropdown"
            class="hidden absolute top-12 left-0 bg-white border border-gray-300 rounded-lg shadow-md p-2"
          >
            <ul>
              <li class="px-4 py-2 hover:bg-gray-100 cursor-pointer">1</li>
              <li class="px-4 py-2 hover:bg-gray-100 cursor-pointer">2</li>
              <li class="px-4 py-2 hover:bg-gray-100 cursor-pointer">3</li>
              <li class="px-4 py-2 hover:bg-gray-100 cursor-pointer">4</li>
              <li class="px-4 py-2 hover:bg-gray-100 cursor-pointer">5</li>
              <li class="px-4 py-2 hover:bg-gray-100 cursor-pointer">6</li>
              <li class="px-4 py-2 hover:bg-gray-100 cursor-pointer">7</li>
            </ul>
          </div>
        </div>
        <button
          class="flex items-center px-4 py-2 bg-white text-gray-700 rounded-lg shadow-md hover:bg-gray-100"
        >
          <i class="fas fa-bed mr-2"></i>
          Room Type
        </button>
        <form action="{{ route('rooms.available') }}" method="POST">
          @csrf
          <button
          class="px-6 py-2 bg-blue-600 text-white rounded-lg shadow-md hover:bg-blue-700"
        >
          Search
        </button>
      </form>
      
      </div>

      <div class="container mx-auto p-4">
        <h1 class="text-2xl font-semibold mb-4">Favorite Room</h1>
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
          @foreach($favoriteRooms as $room)
            <div class="relative lg:row-span-2">
              <a href="{{ route('room.show', $room->id) }}">
                @if($room->image1)
              <img
                alt="{{ $room->name }}"
                class="w-full h-full object-cover rounded-lg"
                src="{{ asset('images/' . $room->image1->file_name) }}" 
              />
              @else
              <img
              alt="{{ $room->name }}"
              class="w-full h-full object-cover rounded-lg"
              src="" alt="Image"
              />
              @endif
              </a>
              <div
                class="absolute top-2 left-2 bg-blue-600 text-white px-2 py-1 rounded"
              >
                Rp.{{ number_format($room->price, 0, ',', '.') }} per night
              </div>
              <div class="absolute bottom-2 left-2 text-white">
                <p class="font-semibold">{{ $room->name }}</p>
                @if($room->type)
                  <p class="text-sm">{{ $room->type }}</p> 
                @endif
              </div>
            </div>
          @endforeach
        </div>
      </div>
      <div class="container mx-auto px-4 py-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
          <div class="relative">
            <img
              alt="Room with a beautiful view"
              class="rounded-lg w-full"
              height="200"
              src="https://storage.googleapis.com/a1aa/image/FsqOKM9shpKcAhJgjNzH11v3rpeRiEjUqwfkl2fYK9wc318nA.jpg"
              width="300"
            />
            <div
              class="absolute top-2 left-2 bg-blue-600 text-white text-sm px-2 py-1 rounded"
            >
              Popular Choice
            </div>
            <div class="mt-2">
              <h3 class="text-lg font-semibold">Shangri-La</h3>
              <p class="text-gray-500">Dieng, Wonosobo</p>
            </div>
          </div>
          <div>
            <img
              alt="Luxurious room with a large bed"
              class="rounded-lg w-full"
              height="200"
              src="https://storage.googleapis.com/a1aa/image/nc9tPvUjeYQ7HiErUls2mSeaqGhuyq4KOIORuE3Egfch318nA.jpg"
              width="300"
            />
            <div class="mt-2">
              <h3 class="text-lg font-semibold">Top View</h3>
              <p class="text-gray-500">Dieng, Wonosobo</p>
            </div>
          </div>
          <div>
            <img
              alt="Cozy room with a view of the mountains"
              class="rounded-lg w-full"
              height="200"
              src="https://storage.googleapis.com/a1aa/image/G7rAHMyvaSoaJht6cDoxvTZvkD6xO4HDBZUqnptN7eF7dNfTA.jpg"
              width="300"
            />
            <div class="mt-2">
              <h3 class="text-lg font-semibold">Green Villa</h3>
              <p class="text-gray-500">Dieng, Wonosobo</p>
            </div>
          </div>
          <div>
            <img
              alt="Wooden cabin in a scenic location"
              class="rounded-lg w-full"
              height="200"
              src="https://storage.googleapis.com/a1aa/image/gAaXgbGEyhotO1VJ2DDE4ajheRWED5fcbcsRPsGsKAKt7aenA.jpg"
              width="300"
            />
            <div class="mt-2">
              <h3 class="text-lg font-semibold">Wooden Pit</h3>
              <p class="text-gray-500">Dieng, Wonosobo</p>
            </div>
          </div>
          <div>
            <img
              alt="Room with a large window and scenic view"
              class="rounded-lg w-full"
              height="200"
              src="https://storage.googleapis.com/a1aa/image/xlPUVlhgIKKfQSVJiJJnIKgrHbfyMFvlW5HHEZqUlr5y7aenA.jpg"
              width="300"
            />
            <div class="mt-2">
              <h3 class="text-lg font-semibold">Boutique</h3>
              <p class="text-gray-500">Dieng, Wonosobo</p>
            </div>
          </div>
          <div>
            <img
              alt="Modern room with a view of the mountains"
              class="rounded-lg w-full"
              height="200"
              src="https://storage.googleapis.com/a1aa/image/AGtuQCtNAk44KJ6SXsreBBb7OBhSE7FCesqFNXcWKr337aenA.jpg"
              width="300"
            />
            <div class="mt-2">
              <h3 class="text-lg font-semibold">Modern</h3>
              <p class="text-gray-500">Dieng, Wonosobo</p>
            </div>
          </div>
          <div>
            <img
              alt="Room with two beds and a scenic view"
              class="rounded-lg w-full"
              height="200"
              src="https://storage.googleapis.com/a1aa/image/NgibZB7XLFKvGVLG2ToLAEIzar9fQ71fm1UmAoQ6Ae0p318nA.jpg"
              width="300"
            />
            <div class="mt-2">
              <h3 class="text-lg font-semibold">Silver Rain</h3>
              <p class="text-gray-500">Dieng, Wonosobo</p>
            </div>
          </div>
          <div class="relative">
            <img
              alt="Room with a view of the lake"
              class="rounded-lg w-full"
              height="200"
              src="https://storage.googleapis.com/a1aa/image/ptoViHaZufQrCSFPrajQjFf3ch6RmlnTyazf7kenlZ2tur5PB.jpg"
              width="300"
            />
            <div
              class="absolute top-2 left-2 bg-blue-600 text-white text-sm px-2 py-1 rounded"
            >
              Popular Choice
            </div>
            <div class="mt-2">
              <h3 class="text-lg font-semibold">Cashville</h3>
              <p class="text-gray-500">Dieng, Wonosobo</p>
            </div>
          </div>
        </div>
      </div>
    </main>
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

    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
      document.addEventListener("DOMContentLoaded", function () {
        flatpickr("#date-picker", {
    mode: "range",
    dateFormat: "Y-m-d",
    onChange: function (selectedDates) {
        if (selectedDates.length === 2) {
            document.getElementById("start_date").value = selectedDates[0].toISOString().split('T')[0];
            document.getElementById("end_date").value = selectedDates[1].toISOString().split('T')[0];
        }
    }, 
});

        document
          .getElementById("check-available-btn")
          .addEventListener("click", function () {
            var datePicker = document.getElementById("date-picker");
            datePicker.classList.toggle("hidden");
          });

        document
          .getElementById("person-dropdown-btn")
          .addEventListener("click", function () {
            var dropdown = document.getElementById("person-dropdown");
            dropdown.classList.toggle("hidden");
          });

        document
          .querySelectorAll("#person-dropdown li")
          .forEach(function (item) {
            item.addEventListener("click", function () {
              var selectedPerson = this.textContent;
              document.querySelector("#person-dropdown-btn span").textContent =
                selectedPerson;
              document
                .getElementById("person-dropdown")
                .classList.add("hidden");
            });
          });
      });
    </script>
  </body>
</html>
