<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Order;
use App\Models\Booking;
use Carbon\Carbon;
use Midtrans\Snap;

class OrderController extends Controller {
    public function payment($id) {
        $room = Room::findOrFail($id);
        return view('payment', compact('room'));
    }

    public function submitPayment(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'qty' => 'required|integer|min:1',
            'total_price' => 'required|numeric|min:1',
        ]);

        $order = Order::create($validatedData);
        

        /*Install Midtrans PHP Library (https://github.com/Midtrans/midtrans-php)
        composer require midtrans/midtrans-php
                                    
        Alternatively, if you are not using **Composer**, you can download midtrans-php library 
        (https://github.com/Midtrans/midtrans-php/archive/master.zip), and then require 
        the file manually.   

        require_once dirname(__FILE__) . '/pathofproject/Midtrans.php'; */

        //SAMPLE REQUEST START HERE

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => $order->id,
                'gross_amount' => $order->total_price,
            ),
            'customer_details' => array(
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
            ),
        );

        try {
            // Dapatkan Snap Token dari Midtrans
            $snapToken = \Midtrans\Snap::getSnapToken($params);
    
            // Tampilkan halaman dengan Snap Token
            return view('midtrans', compact('snapToken', 'order'));
        } catch (\Exception $e) {
            // Jika ada kesalahan, tampilkan pesan error
            return back()->with('error', 'Terjadi kesalahan saat memproses pembayaran: ' . $e->getMessage());
        }
    }

    public function callback(Request $request)
{
    // Ambil server_key dari konfigurasi
    $serverKey = config('midtrans.server_key');

    // Verifikasi signature_key untuk keamanan
    $hashed = hash("SHA512", $request->order_id . $request->status_code . $request->gross_amount . $serverKey);
    
    if ($hashed == $request->signature_key) {
        // Cek status transaksi
        if ($request->transaction_status == 'settlement') {
            // Jika statusnya 'capture', berarti pembayaran berhasil
            $order = Order::find($request->order_id);
            if ($order) {
                // Update status di database menjadi 'Paid'
                $order->update(['status' => 'Paid']);
            }
        } 
    }
}

    public function invoice($id){
        $order =Order::find($id);
        return view('invoice',compact('order'));
    }

    public function cancelOrder($id) {
        // Cari order berdasarkan ID
        $order = Order::find($id);
    
        if ($order) {
            // Hapus order
            $order->delete();
    
            // Redirect ke halaman sebelumnya dengan pesan sukses
            return redirect()->back()->with('success', 'Order berhasil dibatalkan.');
        } else {
            // Jika order tidak ditemukan, kembali dengan pesan error
            return redirect()->back()->with('error', 'Order tidak ditemukan.');
        }
    }
    

}