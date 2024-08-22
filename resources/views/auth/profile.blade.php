<x-layout class="justify-center" :boardList='$boardList ?? null'>
    <div class="flex flex-col justify-center items-center gap-x-5 bg-slate-500 w-[600px]">
        <div class="flex flex-col items-center">
            <p>Friendlist :</p>
            <ul>
                @if (!$friends->isEmpty())
                    @foreach ($friends as $friend)
                        <li>{{ $friend->username }}</li>
                    @endforeach
                @else
                    <li>Your friendlist is empty</li>
                @endif
                
            </ul>
            
        </div>
        <div class="flex flex-col items-center">
            <form method="post" action="/addfriend">
                @csrf
                <input class="text-black" type="text" name="email" id="email" />
                <button>Add</button>
            </form>
            <x-form-error fieldname="email"/>
            @if (session('error'))
                <div class="bg-red-500 text-white p-2 rounded">{{ session('error') }}</div>
            @elseif (session('success'))
                <div class="bg-green-500 text-white p-2 rounded">{{ session('success') }}</div>
            @endif
        </div>
    </div>
</x-layout>