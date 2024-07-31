<div x-data="{ open: false }">
    <!-- Button to open the modal -->
    <button @click="open = true" class="bg-blue-500 text-white px-4 rounded">label
    </button>

    <!-- Modal background -->
    <div x-show="open" class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center">
        <!-- Modal content -->
        <div @click.away="open = false" class="bg-white text-black p-6 rounded shadow-lg">
            <h2 class="text-lg font-semibold mb-4">Edit Task</h2>
            <!-- Your form or content here -->
            <form method="POST" action="/edit-task">
                @csrf
                <label for="label" class="block mb-2">Label</label>
                <input type="text" id="label" name="label" class="w-full p-2 border rounded mb-4">

                <div class="flex justify-end">
                    <button type="button" @click="open = false" class="bg-red-500 text-white px-4 py-2 rounded mr-2">Cancel</button>
                    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
