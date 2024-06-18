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
                            <strong>Date:</strong> {{ $reservation->from }} to {{ $reservation->till }}<br>
                            <strong>First Name:</strong> {{ $reservation->first_name }}<br>
                            <strong>Last Name:</strong> {{ $reservation->last_name }} <br>
                            <strong>Email:</strong> {{ $reservation->email }}<br>
                            <strong>Phone:</strong> {{ $reservation->phone_number }}
                        </div>
                        <div class="flex items-center">
                            <form action="{{ route('reservations.destroy', $reservation->id) }}" method="POST" class="mr-2">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white font-semibold px-4 py-2 rounded-lg hover:bg-red-700 transition duration-300">Delete</button>
                            </form>
                            <a href="{{ route('reservations.edit', $reservation->id) }}" class="bg-blue-500 text-white font-semibold px-4 py-2 rounded-lg hover:bg-blue-700 transition duration-300">Edit</a>
                        </div>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
</x-app-layout>
