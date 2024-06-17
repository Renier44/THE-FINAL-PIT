<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

class BookingController extends Controller
{
    public function index()
    {
        return view('booking.index');
    }

    public function showBookingForm()
    {
        return view('booking.form');
    }
    public function delete(Booking $booking)
{
    $booking->delete();

    return redirect()->route('booking.index')->with('success', 'Booking deleted successfully.');
}


    public function submitBooking(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'checkin' => 'required|date',
            'checkout' => 'required|date|after:checkin',
            'room' => 'required|string',
            'adults' => 'required|integer|min:1',
            'children' => 'required|integer|min:0',
        ]);

        // Create a new booking instance
        $booking = new Booking();
        $booking->name = $request->input('name');
        $booking->email = $request->input('email');
        $booking->checkin = $request->input('checkin');
        $booking->checkout = $request->input('checkout');
        $booking->room = $request->input('room');
        $booking->adults = $request->input('adults');
        $booking->children = $request->input('children');
        $booking->save();

        // Redirect to the confirmation page with the booking ID
        return redirect()->route('booking.confirmation', ['booking' => $booking->id]);
    }

    public function showConfirmation(Booking $booking)
    {
        // Load the booking and pass it to the confirmation view
        return view('booking.confirmation', compact('booking'));
    }

    public function edit($id)
    {
        $booking = Booking::findOrFail($id); // Fetch the booking by ID
        return view('booking.edit', compact('booking'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'checkin' => 'required|date',
            'checkout' => 'required|date|after:checkin',
            'room' => 'required|string',
            'adults' => 'required|integer|min:1',
            'children' => 'required|integer|min:0',
        ]);

        $booking = Booking::findOrFail($id); // Fetch the booking by ID
        $booking->name = $request->input('name');
        $booking->email = $request->input('email');
        $booking->checkin = $request->input('checkin');
        $booking->checkout = $request->input('checkout');
        $booking->room = $request->input('room');
        $booking->adults = $request->input('adults');
        $booking->children = $request->input('children');
        $booking->save();

        // Redirect to the confirmation page with the updated booking ID
        return redirect()->route('booking.confirmation', ['booking' => $booking->id]);
    }
}
