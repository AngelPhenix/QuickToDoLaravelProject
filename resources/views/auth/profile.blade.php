<x-layout :boardList='$boardList ?? null'>
    <div class="flex flex-col items-center">
        <div class="flex flex-col items-center">
            <p >Friendlist</p>
            <form method="post" action="/addfriend">
                @csrf
                <input class="text-black" type="text" name="email" id="email" />
                <button>Add</button>
            </form>
            <x-form-error fieldname="email"/>
            @if (session('error'))
                <div class="bg-red-500 text-white p-2 rounded">{{ session('error') }}</div>
            @endif
        </div>
    </div>
</x-layout>