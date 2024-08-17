<x-layout :boardList='$boardList ?? null'>
    <div class="flex flex-col items-center">
        <div class="flex flex-col items-center">
            <p>Friendlist</p>
            <form method="post" action="/addfriend">
                @csrf
                <input type="text" name="email" id="email" />
                <button>Add</button>
            </form>
        </div>
    </div>
</x-layout>