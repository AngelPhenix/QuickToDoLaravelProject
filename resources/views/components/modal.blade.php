@props(['task', 'labels'])

<div x-data="{ open: false }">
    <!-- Button to open the modal -->
    <button @click="open = true" class="bg-blue-500 text-white px-2 rounded">+</button>

    <!-- Modal background -->
    <div x-show="open" class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center">
        <!-- Modal content -->
        <div @click.away="open = false" class="bg-slate-500 text-black p-6 rounded shadow-lg">
            <h2 class="text-lg font-semibold">Add Labels</h2>
            <!-- Your form or content here -->
            <form id="form_add" method="POST" action="/add_label/{{$task->id}}">
                @csrf
                <input type="text" id="name" name="name" class="p-1 border rounded">
                <input type="color" name="color" class="border rounded">

            </form>

            <h2 class="text-sm font-semibold mb-1 mt-4"><u>Labels not used :</u></h2>
            @foreach ($labels as $label)
                @if (!$task->labels->contains($label))
                    <form method="POST" action="/update_task/{{ $task->id }}/label/{{ $label->id }}" class="inline-block">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="bg-[{{$label->color}}]/75 text-white px-2 rounded ">{{ $label->name }}</button>
                    </form>
                @endif
            @endforeach

            <div class="flex justify-start mt-4">
                <button type="button" @click="open = false" class="bg-red-500 text-white px-4 py-2 rounded mr-2">Cancel</button>
                <button type="submit" form="form_add" class="bg-green-500 text-white px-4 py-2 rounded">Add</button>
            </div>
        </div>
    </div>
</div>
