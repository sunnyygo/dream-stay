<!DOCTYPE html>
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
<body>
    <!-- Header Section -->
    <nav class="bg-white shadow-md">
        <div
          class="container mx-auto px-4 py-4 flex justify-between items-center"
        >
          <div class="text-2xl font-bold text-blue-600">
            Dream<span class="text-gray-800">Stay.</span>
          </div>
          <div class="space-x-8 text-gray-600">
            <a class="hover:text-blue-600" href="{{ route('home') }}">Home</a>
            <a class="hover:text-blue-600" href="#">Rooms</a>
            <a class="hover:text-blue-600" href="#">About</a>
            <a class="hover:text-blue-600" href="#">Contact</a>
          </div>
        </div>
      </nav>

    <!-- Main Content Section -->
    <main class="flex flex-col items-center mt-12 px-12">
        <div class="flex flex-col">
        @yield('content')
        </div>
    </main>

    
</body>
</html>
