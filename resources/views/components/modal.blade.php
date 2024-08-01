@props(['task', 'labels'])

<div x-data="{ open: false }">
    <!-- Button to open the modal -->
    <button @click="open = true" class="bg-blue-500 text-white px-2 rounded">+</button>

    <!-- Modal background -->
    <div x-show="open" class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center">
        <!-- Modal content -->
        <div @click.away="open = false" class="bg-white text-black p-6 rounded shadow-lg">
            <h2 class="text-lg font-semibold mb-4">Add Labels</h2>
            <!-- Your form or content here -->
            <form method="POST" action="/add_label/{{$task->id}}">
                @csrf
                <input type="text" id="name" name="name" class="w-full p-2 border rounded mb-4">

                @foreach ($labels as $label)
                    <form method="post" action="/add_label/{{$task->id}}/{{$label->id}}">
                        @csrf
                        <button class="bg-blue-500 text-white px-2 rounded">{{ $label->name }}</button>
                    </form>
                @endforeach

                <div class="flex justify-end">
                    <button type="button" @click="open = false" class="bg-red-500 text-white px-4 py-2 rounded mr-2">Cancel</button>
                    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>
