<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

    <div class="flex">
        <!-- Sidebar -->
        <div class="w-64 bg-white shadow-md h-screen">
            <div class="p-4">
                <h1 class="text-2xl font-bold">Dashboard Super Admin</h1>
            </div>
            <ul class="mt-6">
                <li class="hover:bg-gray-200">
                    <a href="#" class="block py-2 px-4 text-gray-700">Home</a>
                </li>
                <li class="hover:bg-gray-200">
                    <a href="#" class="block py-2 px-4 text-gray-700">Profil</a>
                </li>
                <li class="hover:bg-gray-200">
                    <a href="#" class="block py-2 px-4 text-gray-700">Pengaturan</a>
                </li>
                <li class="hover:bg-gray-200">
                    <a href='logout' class="block py-2 px-4 text-gray-700">Logout</a>
                </li>
            </ul>
        </div>

        <!-- Konten Utama -->
        <div class="flex-1 p-6">
            <h2 class="text-3xl font-semibold">Selamat Datang di Dashboard</h2>
            <p class="mt-4 text-gray-600">Ini adalah halaman dashboard Anda. Anda dapat mengelola semua informasi di sini.</p>

            <div class="mt-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="bg-white p-4 rounded-lg shadow">
                    <h3 class="text-xl font-semibold">Statistik Pengguna</h3>
                    <p class="mt-2 text-gray-600">Jumlah pengguna terdaftar: 150</p>
                </div>
                <div class="bg-white p-4 rounded-lg shadow">
                    <h3 class="text-xl font-semibold">Pesan Baru</h3>
                    <p class="mt-2 text-gray-600">Anda memiliki 5 pesan baru.</p>
                </div>
                <div class="bg-white p-4 rounded-lg shadow">
                    <h3 class="text-xl font-semibold">Aktivitas Terakhir</h3>
                    <p class="mt-2 text-gray-600">Anda terakhir aktif pada 10:30 AM.</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>