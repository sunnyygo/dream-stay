<?php

namespace App\Http\Controllers;
use App\Models\Room;
use App\Models\Booking;
use App\Models\Image;
use App\Models\RoomImage;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class RoomController extends Controller
{
    
        public function home(){
            $room = Room::all();
            $favoriteRooms = Room::where('favorite', true)->with('image1')->get();
            return view('home', compact('favoriteRooms','room'));  
        }


        public function showAvailableRooms(Request $request)
            {
            $startDate = Carbon::parse($request->start_date);
            $endDate = Carbon::parse($request->end_date);
            $image = Room::with('image1');

            // Get all rooms that are available
            $rooms = Room::whereNotIn('id', function($query) use ($startDate, $endDate) {
                $query->select('room_id')
                    ->from('bookings')
                    ->where(function($query) use ($startDate, $endDate) {
                        $query->whereBetween('start_date', [$startDate, $endDate])
                                ->orWhereBetween('end_date', [$startDate, $endDate]);
                    });
            })->get();

            return view('available_rooms', compact('rooms','image'));
            }
        public function search(Request $request)
            {
                $query = $request->input('query'); // Assuming you're sending a search query

                // Search for rooms by name or description (or any other criteria)
                $rooms = Room::where('name', 'like', '%' . $query . '%')
                            ->orWhere('description', 'like', '%' . $query . '%')
                            ->get();

                return view('rooms.search_results', compact('rooms'));
            }
        
            public function show($id)
            {
                // Mengambil data kamar berdasarkan ID
                $room = Room::with(['image1', 'image2', 'image3'])->findOrFail($id);
                // Mengirim data kamar ke view
                return view('detailpage', compact('room'));
            }

            public function index()
{
    $rooms = Room::with(['image1', 'image2', 'image3'])->get();
    return view('rooms.index', compact('rooms'));
}


public function create()
{
    return view('rooms.create');
}


public function store(Request $request)
{
    
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'price' => 'required|numeric',
        'description' => 'nullable|string',
    ]);

    $validated['available'] = $request->has('available');
    $validated['favorite'] = $request->has('favorite');
    Room::create($validated);

    return redirect()->route('rooms.index')->with('success', 'Room created successfully.');
}


public function edit(Room $room)
{
    return view('rooms.edit', compact('room'));
}


public function update(Request $request, Room $room)
{
    
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'price' => 'required|numeric',
        'description' => 'nullable|string',
        'available' => 'boolean',
        'favorite' => 'boolean',
        'image_id' => 'nullable|exists:images,id',
        'image_id2' => 'nullable|exists:images,id',
        'image_id3' => 'nullable|exists:images,id',
    ]);

    $room->update($validated);

    return redirect()->route('rooms.index')->with('success', 'Room updated successfully.');
}


public function destroy(Room $room)
{
    $room->delete();
    return redirect()->route('rooms.index')->with('success', 'Room deleted successfully.');
}

}
