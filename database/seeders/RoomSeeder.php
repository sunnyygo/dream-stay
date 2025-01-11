<?php

namespace Database\Seeders;

use App\Models\Room;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Room data to be seeded
        $roomData = [
            ['name' => 'Room 1', 'description' => 'A cozy room with a king-size bed.', 'price' => 150, 'available' => true],
            ['name' => 'Room 2', 'description' => 'A spacious room with a beautiful view.', 'price' => 200, 'available' => true],
            ['name' => 'Room 3', 'description' => 'A modern room with all amenities.', 'price' => 250, 'available' => true],
        ];

        // Insert data into the database
        foreach ($roomData as $room) {
            Room::create($room);
        }
    }
}

