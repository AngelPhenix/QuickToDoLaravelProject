<x-layout>
    <h1 class="text-4xl py-10">-- Your boards --</h1>
    <div class="grid lg:grid-cols-4 gap-5">
        @foreach ($boards as $board)
            <a class="text-2xl flex justify-center items-center bg-slate-500 w-[350px] h-[350px] hover:bg-slate-600" href="/board/{{ $board->id }}">{{ $board->name }}</a>
        @endforeach
    </div>
</x-layout>