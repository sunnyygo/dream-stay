<!DOCTYPE html>
<html lang="en">
<head>
    <title>Midtrans Payment</title>
    <script type="text/javascript" 
        src="https://app.sandbox.midtrans.com/snap/snap.js" 
        data-client-key="{{ config('midtrans.client_key') }}"></script>
        <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="min-h-screen flex items-center justify-center">
        <div class="bg-white shadow-lg rounded-lg p-8 max-w-md w-full">
            <h1 class="text-2xl font-bold text-gray-800 text-center mb-4">Payment Details</h1>
            <div class="border-t-2 border-gray-100 my-4"></div>

            <div class="mb-4">
                <p class="text-gray-600 text-sm">Order ID:</p>
                <p class="text-lg font-semibold text-gray-800">{{ $order->id }}</p>
            </div>

            <div class="mb-4">
                <p class="text-gray-600 text-sm">Name:</p>
                <p class="text-lg font-semibold text-gray-800">{{ $order->name }}</p>
            </div>

            <div class="mb-4">
                <p class="text-gray-600 text-sm">Email:</p>
                <p class="text-lg font-semibold text-gray-800">{{ $order->email }}</p>
            </div>

            <div class="mb-4">
                <p class="text-gray-600 text-sm">Phone:</p>
                <p class="text-lg font-semibold text-gray-800">{{ $order->phone }}</p>
            </div>

            <div class="mb-4">
                <p class="text-gray-600 text-sm">Days:</p>
                <p class="text-lg font-semibold text-gray-800">{{ $order->qty }}</p>
            </div>

            <div class="mb-4">
                <p class="text-gray-600 text-sm">Total Payment:</p>
                <p class="text-lg font-semibold text-gray-800">Rp{{ number_format($order->total_price, 0, ',', '.') }}</p>
            </div>

            <div class="border-t-2 border-gray-100 my-4"></div>

            <div class="flex">
            <div class="w-1/2 gap-2 flex">
                <form action="{{ route('order.cancel', ['id' => $order->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" 
                        class="w-full bg-red-600 hover:bg-red-700 text-white py-2 px-4 rounded-lg font-semibold transition duration-300">
                        Cancel
                    </button>
                </form>            
            </div>
            <div class="w-1/2">
            <button id="pay-button" 
                class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-lg font-semibold transition duration-300">
                Proceed to Payment
            </button>
            </div>
            </div>
        </div>
    </div>

    <script>
        // Ambil tombol dengan ID 'pay-button'
var payButton = document.getElementById('pay-button');

// Tambahkan event listener ke tombol
payButton.addEventListener('click', function () {
    // Pastikan Snap token sudah ada sebelum memanggil Snap
    var snapToken = '{{ $snapToken }}';

    if (snapToken) {
        // Panggil metode pembayaran Snap
        window.snap.pay(snapToken, {
            onSuccess: function(result) {
                //console.log('Payment successful:', result);
                // Anda dapat menambahkan logika untuk mengirim data ke server
                window.location.href = '/invoice/{{$order->id}}'
                console.log(result);
            },
            onPending: function(result) {
                console.log('Payment pending:', result);
                // Tampilkan notifikasi atau simpan data jika pembayaran menunggu
            },
            onError: function(result) {
                console.error('Payment failed:', result);
                // Tampilkan pesan kesalahan kepada pengguna
            },
            onClose: function() {
                console.log('Payment popup closed without completing payment');
                // Anda dapat menambahkan logika untuk menangani penutupan popup
            }
        });
    } else {
        console.error('Snap token is not available!');
        alert('Error: Snap token is missing.');
    }
});


    </script>
</body>
</html>
