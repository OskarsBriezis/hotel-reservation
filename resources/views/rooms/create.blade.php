<x-app-layout>
    <div class="flex flex-col justify-center items-center pt-[35px]">
        <form action="{{ route('rooms.store') }}" method="POST" class="flex flex-col justify-center items-center w-fit bg-white py-[10px] px-[30px] rounded-lg">
            @csrf
            <label for="name" class="form-label text-lg font-semibold flex flex-col justify-center items-center">
                Name
                <input type="text" class="form-control mt-1" id="name" name="name" placeholder="101" required>
            </label>
            @error('name')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror

            <label for="description" class="form-label text-lg font-semibold mt-3 flex flex-col justify-center items-center">
                Description
                <textarea class="form-control mt-1" id="description" name="description" rows="3" placeholder="This is a room" required></textarea>
            </label>
            @error('description')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror

            <label for="url" class="form-label text-lg font-semibold mt-3 flex flex-col justify-center items-center">
                URL
                <input type="text" class="form-control mt-1" id="url" name="url" placeholder="Link to a picture">
            </label>
@error('url')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror

            <label for="price" class="form-label text-lg font-semibold mt-3 flex flex-col justify-center items-center">
                Price
                <input type="number" class="form-control mt-1" id="price" name="price" step="0.01" placeholder="0.00" required>
            </label>
            @error('price')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror

            <button type="submit" class="btn btn-primary mt-3 bg-green-500 hover:bg-green-600 duration-[0.5s] py-[4px] px-[12px] rounded-lg">Submit</button>
        </form>
    </div>
</x-app-layout>