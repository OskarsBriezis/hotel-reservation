<x-app-layout>
<div class="container mx-auto flex justify-center items-center h-full">
    <div class="w-full max-w-md">
        <h1 class="text-3xl font-semibold mb-4">Edit Reservation</h1>

        <form action="{{ route('reservations.update', $reservation->id) }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf
            @method('PUT')
            <input type="hidden" name="room_id" value="{{ $reservation->room_id }}">

            <div class="mb-4">
                <label for="first_name" class="block text-gray-700 text-lg font-semibold mb-2">First Name</label>
                <input type="text" class="form-control rounded-lg w-full px-3 py-2 border border-gray-300" id="first_name" name="first_name" value="{{ $reservation->first_name }}" required>
            </div>

            <div class="mb-4">
                <label for="last_name" class="block text-gray-700 text-lg font-semibold mb-2">Last Name</label>
                <input type="text" class="form-control rounded-lg w-full px-3 py-2 border border-gray-300" id="last_name" name="last_name" value="{{ $reservation->last_name }}" required>
            </div>

            <div class="mb-4">
                <label for="email" class="block text-gray-700 text-lg font-semibold mb-2">Email</label>
                <input type="email" class="form-control rounded-lg w-full px-3 py-2 border border-gray-300" id="email" name="email" value="{{ $reservation->email }}" required>
            </div>

            <div class="mb-4">
                <label for="phone_number" class="block text-gray-700 text-lg font-semibold mb-2">Phone Number</label>
                <input type="text" class="form-control rounded-lg w-full px-3 py-2 border border-gray-300" id="phone_number" name="phone_number" value="{{ $reservation->phone_number }}" required>
            </div>

            <div class="mb-4">
                <label for="from" class="block text-gray-700 text-lg font-semibold mb-2">From</label>
                <input type="date" class="form-control rounded-lg w-full px-3 py-2 border border-gray-300" id="from" name="from" value="{{ \Carbon\Carbon::parse($reservation->from)->format('Y-m-d') }}" min="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" required>
            </div>

            <div class="mb-6">
                <label for="till" class="block text-gray-700 text-lg font-semibold mb-2">Till</label>
                <input type="date" class="form-control rounded-lg w-full px-3 py-2 border border-gray-300" id="till" name="till" value="{{ \Carbon\Carbon::parse($reservation->till)->format('Y-m-d') }}" min="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" required>
            </div>

            <div class="flex justify-center">
                <button type="submit" class="reserve-button px-4 py-2 bg-blue-500 text-white font-semibold rounded-lg hover:bg-blue-700 transition duration-300">Update Reservation</button>
            </div>
        </form>
    </div>
</div>


    <script>
        // JavaScript to validate date inputs
        document.getElementById('from').addEventListener('input', function() {
            var today = new Date();
            var selectedDate = new Date(this.value);
            if (selectedDate < today) {
                this.setCustomValidity('You cannot select a date before today.');
            } elseif (selectedDate = today){
                this.setCustomValidity('');
            } else {
                this.setCustomValidity('');
            }
        });

        document.getElementById('till').addEventListener('input', function() {
            var today = new Date();
            var selectedDate = new Date(this.value);
            if (selectedDate < today) {
                this.setCustomValidity('You cannot select a date before today.');
            } else {
                this.setCustomValidity('');
            }
        });
    </script>
</x-app-layout>
