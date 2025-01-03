<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DreamStay Login</title>
  @vite('resources/css/app.css')
</head>
<body class="h-screen bg-gray-100 flex items-center justify-center">
  <div class="w-full max-w-4xl flex bg-white rounded-lg shadow-lg overflow-hidden">
    
    <!-- Kiri: Logo / Gambar -->
    <div class="w-1/2 bg-cover bg-center relative" style="background-image: url('https://source.unsplash.com/600x600/?hotel,room');">
      <div class="absolute inset-0 bg-gray-300 bg-opacity-60 flex items-center justify-center">
        <h1 class="text-4xl font-bold text-blue-500">Dream<span class="text-gray-700">Stay.</span></h1>
      </div>
    </div>
    
    <!-- Kanan: Form Login -->
    <div class="w-1/2 p-8">
      <h2 class="text-2xl font-semibold text-gray-700 text-center mb-6">Login Account</h2>
      <form action="{{ route('submitLogin') }}" method="POST"> <!-- Update action -->
        @csrf
        <!-- Email -->
        <div class="mb-4">
            <label for="email" class="block text-gray-600 mb-2">Email</label>
            <input type="email" id="email" name="email" placeholder="Email" 
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" required>
        </div>
        <!-- Password -->
        <div class="mb-4">
            <label for="password" class="block text-gray-600 mb-2">Password</label>
            <input type="password" id="password" name="password" placeholder="6+ characters" 
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" required>
        </div>
        <!-- Agreement -->
        <p class="text-xs text-gray-500 mb-6 text-center">
            By signing up you agree to 
            <a href="#" class="text-blue-500 underline">terms and conditions</a>.
        </p>
        <!-- Login Button -->
        <button type="submit" 
            class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600 transition duration-200">
            Login
        </button>
    </form>

    @if(session('failed'))
        <p class="text-red-500 text-center mt-4">{{ session('failed') }}</p>
    @endif

      <!-- Create Account Link -->
      <p class="text-center text-sm text-gray-600 mt-4">
        <a href="{{ route('registration.show') }}" class="underline hover:text-blue-500">Create Account</a>
      </p>
    </div>
    
  </div>
</body>
</html>