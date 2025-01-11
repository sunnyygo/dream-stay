<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Payment Page</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    function validateForm(event) {
    // Prevent form submission
    event.preventDefault();

    // Validate name field
    const name = document.getElementById('name').value;
    if (!name) {
        alert("Name is required");
        return false;
    }

    // Validate email field
    const email = document.getElementById('email').value;
    if (!email.includes("@")) {
        alert("Please enter a valid email");
        return false;
    }

    const phone = document.getElementById('phone').value;
    if (!phone) {
        alert("Please enter Phone Number");
        return false;
    }

    const qty = document.getElementById('qty').value;
    if (!qty) {
        alert("Please enter Days");
        return false;
    }

    event.target.submit();
    }

    
  </script>
  <script type="text/javascript"
  src="https://app.stg.midtrans.com/snap/snap.js"
    data-client-key="{{ config('midtrans.client_key') }}"></script>
</head>
<body class="bg-gray-50 font-sans">
  <div class="max-w-3xl mx-auto mt-10 p-6 bg-white shadow-md rounded-md">
    <!-- Header -->
    <div class="text-center">
      <h1 class="text-2xl font-bold text-blue-600">DreamStay.</h1>
    </div>

    <!-- Menampilkan pesan flash jika ada -->
    @if(session('message'))
    <p>{{ session('message') }}</p>
    @elseif(session('error'))
    <p style="color: red;">{{ session('error') }}</p>
    @endif


    <!-- Payment Section -->
    <div class="mt-10">
      <h2 class="text-xl font-semibold text-center">Payment Detail</h2>
      <p class="text-sm text-gray-500 text-center mt-2">Kindly follow the instructions below</p>
    </div>

    <div class="mt-8 grid grid-cols-2 gap-8 w w-full align-middle">
      <!-- Right Section -->
      <div>
        <form onsubmit="validateForm(event)"  id="payment-form" action="{{ route('payment.submit') }}" method="POST" >
        @csrf
          <div class="mb-4">
            <label for="name" class="block text-sm text-gray-700">Full Name</label>
            <input type="text" id="name" name="name" placeholder="Full Name" class="mt-1 w-full p-2 border border-gray-300 rounded-md">
          </div>

          <div class="mb-4">
            <label for="email" class="block text-sm text-gray-700">Email</label>
            <input type="email" id="email" name="email" placeholder="Email Address" class="mt-1 w-full p-2 border border-gray-300 rounded-md">
          </div>

          <div class="mb-4">
            <label for="phone" class="block text-sm text-gray-700">Phone</label>
            <input type="text" id="phone" name="phone" placeholder="Phone Number" class="mt-1 w-full p-2 border border-gray-300 rounded-md">
          </div>

          <div class="mb-4">
            <label for="qty" class="block text-sm text-gray-700">Days</label>
            <input type="number" id="qty" name="qty" placeholder="How long you will stay?" class="mt-1 w-full p-2 border border-gray-300 rounded-md" oninput="updateDays()">
          </div>
        </div>
        <!-- Left Section -->   
        <div class="align-middle my-auto">
            <p class="text-sm text-gray-700">Transfer:</p>
            <p class="font-medium mt-2"><span id="days-display">0</span> Days at Dream Stay, Dieng Wonosobo</p>
            <p class="mt-2 text-gray-700">Initial Payment: <span class="font-semibold text-black">{{ number_format($room->price, 2) }}</span></p>
            <p>Total Harga: <span id="total_price">Rp{{ number_format($room->price, 2) }}</span></p>
        </div>
        <!-- Input tersembunyi untuk total harga -->
        <input type="hidden" id="hidden_total_price" name="total_price" value="{{ $room->price }}">
        <input type="hidden" name="room_id" value="{{ $room->id }}">
      </div>
      <!-- Buttons -->
      <div class="flex justify-center items-center space-x-4 mt-2">
        <button id="pay-button" class="bg-blue-600 text-white py-2 px-6 rounded-md hover:bg-blue-700">Next Step</button>
    </form>
        <button class="bg-gray-300 text-gray-700 py-2 px-6 rounded-md hover:bg-gray-400">Cancel</button>
    </div>
  </div>
  <script>
    // Fungsi untuk update jumlah hari dan total harga
    function updateDays() {
        const qty = document.getElementById('qty').value; // Ambil jumlah hari
        const roomPrice = {{ $room->price }}; // Ambil harga kamar dari server-side

        // Pastikan qty valid
        if (qty && !isNaN(qty) && qty > 0) {
            // Update tampilan jumlah hari
            document.getElementById('days-display').textContent = qty;

            // Hitung total harga (harga kamar * jumlah hari)
            const totalPrice = roomPrice * qty;

            // Update tampilan harga total
            document.getElementById('total_price').innerText = 'Rp' + totalPrice.toLocaleString();

            // Update nilai input hidden untuk total harga
            document.getElementById('hidden_total_price').value = totalPrice;
        } else {
            // Jika qty tidak valid, reset tampilan dan input hidden
            document.getElementById('days-display').textContent = '0';
            document.getElementById('total_price').innerText = 'Rp' + roomPrice.toLocaleString();
            document.getElementById('hidden_total_price').value = roomPrice;
        }
    }
</script>

</body>
</html>
