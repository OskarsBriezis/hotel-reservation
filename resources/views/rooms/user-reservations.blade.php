<x-app-layout>
    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation Success</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md text-center">
        <h1 class="text-2xl font-semibold mb-4">Reserved Successfully!</h1>
        <p class="mb-4">Your reservation has been successfully created.</p>
        <a href="{{ route('reservations.index') }}" class="bg-blue-500 text-white font-semibold px-4 py-2 rounded-lg hover:bg-blue-700 transition duration-300">Your Reservations</a>
    </div>
</body>
</html>


</x-app-layout>