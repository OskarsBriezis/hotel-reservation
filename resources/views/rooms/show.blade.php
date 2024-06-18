<x-app-layout>
    <div class="flex justify-center items-center pt-[30px] flex-wrap">
        <div class="flex flex-col justify-center items-center w-fit h-fit bg-white p-[15px] rounded-lg sm:mx-[10px] my-[6px]">
            <p>Number: {{ $room->name }}</p>
            <p>About: {{ $room->description }}</p>
            <img src="{{ $room->url }}" class="w-[200px] h-[150px]"/>
            <p>Price: {{ $room->price }}</p>    
        </div>
        @if (Auth::user()->is_admin == true)
            <form action="{{ route('rooms.destroy', $room->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this room?')" class="absolute right-5 top-20">
                @csrf
                @method('DELETE')
                <button type="submit" class="delete-button px-[15px] py-[5px] rounded-lg duration-[0.3s]">Delete</button>
            </form>
        @endif
        <form action="{{ route('reservations.create', ['room' => $room->id]) }}" method="GET" class="absolute left-5 top-20">
            @csrf
        <button type="submit" class="reserve-button px-[15px] py-[5px] rounded-lg duration-[0.3s]">Reserve</button>
    </form>

    </div>
</x-app-layout>r