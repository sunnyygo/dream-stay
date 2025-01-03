<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration Form</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        function validateForm(event) {
            // Mengambil nilai dari input password dan konfirmasi password
            const password = document.getElementById('password_admin').value;
            const confirmPassword = document.getElementById('password_confirmation').value;

            // Memeriksa apakah password dan konfirmasi password sama
            if (password !== confirmPassword) {
                event.preventDefault(); // Mencegah form dari pengiriman
                alert('Password not Matc'); // Menampilkan pesan kesalahan
            }
        }
    </script>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="w-full max-w-md bg-white p-8 rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold text-center mb-6">Admin Registration</h2>
        <form action="register" method="POST" class="space-y-4" onsubmit="validateForm(event)">
            @csrf
            <!-- Nama Admin -->
            <div>
                <label for="nama_admin" class="block text-sm font-medium text-gray-700">Nama Admin</label>
                <input type="text" id="nama_admin" name="nama_admin" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Masukkan nama lengkap">
            </div>

            <!-- Email Admin -->
            <div>
                <label for="email_admin" class="block text-sm font-medium text-gray-700">Email Admin</label>
                <input type="email" id="email_admin" name="email_admin" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Masukkan email">
            </div>

            <!-- Password Admin -->
            <div>
                <label for="password_admin" class="block text-sm font-medium text-gray-700">Password Admin</label>
                <input type="password" id="password_admin" name="password_admin" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Masukkan password">
            </div>

            <!-- Konfirmasi Password Admin -->
            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Konfirmasi Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Konfirmasi password">
            </div>

            <!-- Button -->
            <div>
                <button type="submit" class="w-full bg-indigo-600 text-white py-2 px-4 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    Register
                </button>
            </div>
        </form>

        <!-- Create Account Link -->
      <p class="text-center text-sm text-gray-600 mt-4">
        <a href="{{ route('login') }}" class="underline hover:text-blue-500">Already have an account?</a>
      </p>
    </div>
</body>
</html>