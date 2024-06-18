<x-app-layout>
<div class="container mx-auto flex justify-center items-center h-full">
    <div class="w-full max-w-md">
        <h1 class="text-3xl font-semibold mb-4">Reserve a Room</h1>

        <form action="{{ route('reservations.store') }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf
            <input type="hidden" name="room_id" value="{{ $room->id }}">

            <div class="mb-4">
                <label for="first_name" class="block text-gray-700 text-lg font-semibold mb-2">First Name</label>
                <input type="text" class="form-control rounded-lg w-full px-3 py-2 border border-gray-300" id="first_name" name="first_name" placeholder="First Name" required>
            </div>

            <div class="mb-4">
                <label for="last_name" class="block text-gray-700 text-lg font-semibold mb-2">Last Name</label>
                <input type="text" class="form-control rounded-lg w-full px-3 py-2 border border-gray-300" id="last_name" name="last_name" placeholder="Last Name" required>
            </div>

            <div class="mb-4">
                <label for="email" class="block text-gray-700 text-lg font-semibold mb-2">Email</label>
                <input type="email" class="form-control rounded-lg w-full px-3 py-2 border border-gray-300" id="email" name="email" placeholder="Email" required>
            </div>

            <div class="mb-4">
                <label for="phone_number" class="block text-gray-700 text-lg font-semibold mb-2">Phone Number</label>
                <input type="text" class="form-control rounded-lg w-full px-3 py-2 border border-gray-300" id="phone_number" name="phone_number" placeholder="Phone Number" required>
            </div>

            <div class="mb-4">
                <label for="from" class="block text-gray-700 text-lg font-semibold mb-2">From</label>
                <input type="date" class="form-control rounded-lg w-full px-3 py-2 border border-gray-300" id="from" name="from" min="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" required>
            </div>

            <div class="mb-6">
                <label for="till" class="block text-gray-700 text-lg font-semibold mb-2">Till</label>
                <input type="date" class="form-control rounded-lg w-full px-3 py-2 border border-gray-300" id="till" name="till" min="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" required>
            </div>

            <div class="flex justify-center">
                <button type="submit" class="reserve-button px-4 py-2 bg-blue-500 text-white font-semibold rounded-lg hover:bg-blue-700 transition duration-300">Reserve</button>
            </div>
        </form>
    </div>
</div>

    <script>
        // JavaScript to validate date inputs
        document.getElementById('from').addEventListener('input', function() {
            var today = new Date();
            var selectedDate = new Date(this.value);
            if (selectedDate <= today) {
                this.setCustomValidity('You cannot select a date before today.');
            }elseif (selectedDate = today){
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
