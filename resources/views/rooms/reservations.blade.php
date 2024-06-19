
<x-app-layout>
    <div class="container mx-auto">
        <h1 class="text-3xl font-semibold mb-4">Your Reservations</h1>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        @if ($reservations->isEmpty())
            <p>No reservations found.</p>
        @else
            <ul>
                @foreach ($reservations as $reservation)
                    <li class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex justify-between items-center">
                        <div>
                            <strong>Room:</strong> {{ $reservation->room->name }}<br>
                            <strong>Dates:</strong> {{ \Carbon\Carbon::parse($reservation->from)->format('Y-m-d') }} to {{ \Carbon\Carbon::parse($reservation->till)->format('Y-m-d') }}<br>
                            <strong>First Name:</strong> {{ $reservation->first_name }}<br>
                            <strong>Last Name:</strong> {{ $reservation->last_name }} <br>
                            <strong>Email:</strong> {{ $reservation->email }}<br>
                            <strong>Phone:</strong> {{ $reservation->phone_number }}<br>
                            <strong>Status:</strong> {{ $reservation->status }}
                        </div>
                        <div class="flex items-center">
                            @if($reservation->status == 'pending' && Auth::user()->is_admin == true)
                                <a href="{{ route('reservations.accept', $reservation->id) }}" class="bg-green-500 text-white font-semibold px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300 mr-2">Accept</a>
                                <a href="{{ route('reservations.reject', $reservation->id) }}" class="bg-red-500 text-white font-semibold px-4 py-2 rounded-lg hover:bg-red-700 transition duration-300">Reject</a>
                            @endif
                            <a href="{{ route('reservations.edit', $reservation->id) }}" class="bg-blue-500 text-white font-semibold px-4 py-2 rounded-lg hover:bg-blue-700 transition duration-300 ml-2">Edit</a>
                            <form action="{{ route('reservations.destroy', $reservation->id) }}" method="POST" class="ml-2">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white font-semibold px-4 py-2 rounded-lg hover:bg-red-700 transition duration-300">Delete</button>
                            </form>
                        </div>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
</x-app-layout>
