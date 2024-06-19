<?php

namespace App\Http\Controllers;
use App\Models\Room;
use Carbon\Carbon;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    $reservations = Reservation::where('user_id', Auth::id())->get();
    return view('rooms.reservations', compact('reservations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Room $room)
    {
        return view('rooms.reservation', compact('room'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone_number' => 'required|string|max:20',
            'from' => 'required|date',
            'till' => 'required|date|after:from',
            'room_id' => 'required|integer|exists:rooms,id',
        ]);
    
        // Create a new reservation
        $reservation = new Reservation();
        $reservation->user_id = Auth::id();
        $reservation->room_id = $validatedData['room_id'];
        $reservation->first_name = $validatedData['first_name'];
        $reservation->last_name = $validatedData['last_name'];
        $reservation->email = $validatedData['email'];
        $reservation->phone_number = $validatedData['phone_number'];
        $reservation->from = $validatedData['from'];
        $reservation->till = $validatedData['till'];  // Example: Use the next day as 'till'
    
        // Save the reservation
        $reservation->save();
    
        // Redirect to the success page
        return redirect()->route('reservations.index')->with('success', 'Reservation created successfully!');
    }


    /**
     * Display the specified resource.
     */
    public function show(Reservation $reservation)
    {
        return view('rooms.show', compact('room'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->from = Carbon::parse($reservation->from); // Convert to Carbon instance
        $reservation->till = Carbon::parse($reservation->till); // Convert to Carbon instance
        return view('rooms.edit-reservation', compact('reservation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reservation $reservation)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'phone_number' => 'required|string|max:20',
            'from' => 'required|date',
            'till' => 'required|date|after:from',
        ]);

        // Update the reservation
        $reservation->first_name = $validatedData['first_name'];
        $reservation->last_name = $validatedData['last_name'];
        $reservation->email = $validatedData['email'];
        $reservation->phone_number = $validatedData['phone_number'];
        $reservation->from = $validatedData['from'];
        $reservation->till = $validatedData['till'];

        // Save the reservation
        $reservation->save();

        // Redirect back to the reservations list with success message
        return redirect()->route('reservations.index')->with('success', 'Reservation updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        $reservation->delete();
        return redirect()->route('reservations.index')->with('success', 'Reservation deleted successfully!');
    }
    
    public function accept($id)
    {
    $reservation = Reservation::find($id);
    $reservation->status = 'accepted';
    $reservation->save();

    return redirect()->route('reservations.index')->with('success', 'Reservation accepted.');
    }

public function reject($id)
    {
    $reservation = Reservation::find($id);
    $reservation->status = 'rejected';
    $reservation->save();

    return redirect()->route('reservations.index')->with('success', 'Reservation rejected.');
    }
}
