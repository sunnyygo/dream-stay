<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoomAvailability extends Model
{
    public function room()
{
    return $this->belongsTo(Room::class);
}

}
