@props(['task', 'labels'])

<div x-data="{ open: false }">
    <!-- Button to open the modal -->
    <button @click="open = true" class="bg-blue-500 text-white px-2 rounded">+</button>

    <!-- Modal background -->
    <div x-show="open" class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center">
        <!-- Modal content -->
        <div @click.away="open = false" class="bg-slate-500 text-black p-6 rounded shadow-lg max-w-md">
            <h2 class="text-lg font-semibold">Add Labels</h2>
            <!-- Your form or content here -->
            <form id="form_add_{{$task->id}}" method="POST" action="/add_label/{{$task->id}}" class="flex items-center gap-x-2">
                @csrf
                <input type="text" id="name" name="name" class="p-2 border border-gray-300 rounded-md h-10" placeholder="Label name">
                <input type="color" name="color" class="border border-gray-300 rounded-md h-10 w-12">
            </form>

            <h2 class="text-sm font-semibold mb-1 mt-4"><u>Select to add :</u></h2>
            @foreach ($labels as $label)
                @if (!$task->labels->contains($label))
                    <form method="POST" action="/update_task/{{ $task->id }}/label/{{ $label->id }}" class="mb-1 inline-block">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="bg-[{{$label->color}}]/75 text-white px-2 py-1 rounded truncate">{{ $label->name }}</button>
                    </form>
                @endif

                {{-- <form method="POST" action="/update_task/{{ $task->id }}/label/{{ $label->id }}" class="mb-1 inline-block">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="bg-[{{$label->color}}]/75 text-white px-2 py-1 rounded truncate">{{ $label->name }}</button>
                </form> --}}
            @endforeach

            <div class="flex justify-end mt-4">
                <button type="button" @click="open = false" class="bg-red-500 text-white px-4 py-2 rounded mr-2">Cancel</button>
                <button type="submit" form="form_add_{{$task->id}}" class="bg-green-500 text-white px-4 py-2 rounded">Add</button>
            </div>
        </div>
    </div>
</div>
