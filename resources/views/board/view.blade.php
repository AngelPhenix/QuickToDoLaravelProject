<x-layout>
    <div class="flex flex-col items-center">
        <h1 class="text-4xl pb-5">-- Your boards --</h1>
        @if ($boards->isEmpty())
            <p>No board to display yet !</p>
        @endif
        <div class="grid lg:grid-cols-4 gap-5">
            @foreach ($boards as $board)
                <a class="text-2xl flex justify-center items-center px-5 bg-slate-500 w-[350px] h-[350px] hover:bg-slate-600" href="/board/{{ $board->id }}">{{ $board->name }}</a>
            @endforeach
        </div>
    </div>
</x-layout>