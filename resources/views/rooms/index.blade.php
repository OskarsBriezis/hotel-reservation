<x-app-layout>
    <div class="flex justify-center items-center pt-[30px] flex-wrap">
        @if ($rooms->isEmpty())
        <p>No Rooms Avaialable</p>
        @else
            @foreach ($rooms as $room)
            <a href="{{ route('rooms.show', $room->id) }}">
                <div class="flex flex-col justify-center items-center w-fit h-fit bg-white p-[15px] rounded-lg sm:mx-[10px] my-[6px]">
                    <p>Number: {{ $room->name }}</p>
                    <p>About: {{ $room->description }}</p>
                    <img src="{{ $room->url }}" class="w-[200px] h-[150px]"/>
                    <p>Price: {{ $room->price }}</p>
                </div>
            </a>
            @endforeach
        @endif
    </div>
</x-app-layout>