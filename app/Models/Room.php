<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'name', 
        'price', 
        'description', 
        'available', 
        'favorite', 
        'image_id', 
        'image_id2', 
        'image_id3'
    ];

    public function availabilities()
    {
        return $this->hasMany(RoomAvailability::class);
    }

    public function image1()
    {
        return $this->belongsTo(Image::class, 'image_id');
    }

    public function image2()
    {
        return $this->belongsTo(Image::class, 'image_id2');
    }

    public function image3()
    {
        return $this->belongsTo(Image::class, 'image_id3');
    }
}

