<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;

class RoomController extends Controller
{
    // Display a listing of rooms
    public function index()
    {
        $rooms = Room::all();
        return view('room.index', ['rooms' => $rooms]); // Pass data to the view
    }

    // Show the form for creating a new room
    public function create()
    {
        return view('room.create'); // Return the create room view
    }

    // Store a newly created room in storage
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0'
        ]);

        Room::create($data);

        return redirect()->route('room.index')->with('success', 'Room created successfully');
    }

    // Display the specified room
    public function show(Room $room)
    {
        return view('room.show', ['room' => $room]);
    }

    // Show the form for editing the specified room
    public function edit(Room $room)
    {
        return view('room.edit', ['room' => $room]);
    }

    // Update the specified room in storage
    public function update(Request $request, Room $room)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0'
        ]);

        $room->update($data);

        return redirect()->route('room.index')->with('success', 'Room updated successfully');
    }

    // Remove the specified room from storage
    public function destroy(Room $room)
    {
        $room->delete();
        return redirect()->route('room.index')->with('success', 'Room deleted successfully');
    }
}
