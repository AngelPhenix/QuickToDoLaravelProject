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
                <input type="text" id="name" name="name" class="p-2 border rounded mb-4">
                <input type="color" name="color" class="m-2 border rounded mb-4">

                <div class="flex justify-end">
                    <button type="button" @click="open = false" class="bg-red-500 text-white px-4 py-2 rounded mr-2">Cancel</button>
                    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Add</button>
                </div>
            </form>

            <h2 class="text-sm font-semibold mb-4">Labels not used :</h2>
            @foreach ($labels as $label)
                @if (!$task->labels->contains($label))
                    <form method="POST" action="/update_task/{{ $task->id }}/label/{{ $label->id }}" class="inline-block">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="bg-[{{$label->color}}]/25 text-white px-2 rounded ">{{ $label->name }}</button>
                    </form>
                @endif
            @endforeach
        </div>
    </div>
</div>
