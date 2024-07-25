<x-layout>
    @foreach ($boards as $board)
        <div>
            <a href="/board/">{{ $board->name }}</a>
        </div>
    @endforeach
</x-layout>