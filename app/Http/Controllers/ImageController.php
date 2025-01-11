<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function create()
    {
        return view('image-up');  // Menampilkan form upload gambar
    }

    public function store(Request $request)
    {
        // Validasi bahwa field "images" adalah array, dan setiap file adalah gambar
        $request->validate([
            'images' => 'required|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Iterasi setiap gambar yang diunggah
        foreach ($request->file('images') as $image) {
            // Buat nama unik untuk setiap gambar
            $imageName = time() . rand(1000, 9999) . '.' . $image->extension();

            // Pindahkan gambar ke folder public/images
            $image->move(public_path('images'), $imageName);

            // Simpan informasi gambar ke database
            Image::create([
                'file_name' => $imageName,
            ]);
        }

        return back();
    }
}


