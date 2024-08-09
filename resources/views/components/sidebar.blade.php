@props(['board', 'boardList'])

<div class="w-64 h-screen bg-[#424246] text-white p-4">
    @guest
    <nav class="flex flex-col gap-y-2">
        <a href="/">Home</a>
        <a href="/register">Register</a>
        <a href="/login">Login</a>
    </nav>
    @endguest
    
    @auth
        <div class="flex flex-col justify-between gap-y-2 h-full">
            <div class="flex flex-col gap-y-2">
                <a class="px-2 py-1 rounded hover:bg-[#17171a]" href="/boards">My Boards</a>
                @if (isset($board))
                    <a class="px-2 py-1 rounded hover:bg-[#17171a]" href="/historic/board/{{$board->id}}">Logs</a>
                @endif
                @if (isset($boardList))
                    @foreach ($boardList as $board)
                        <a class="px-2 py-1 bg-[#202020] rounded hover:bg-[#17171a]" href="/board/{{$board->id}}"> {{$board->name}} </a>
                    @endforeach
                @endif
                <a class="px-2 py-1 rounded hover:bg-[#17171a]" href="/board_create">Create board</a>
            </div>
            <div class="flex flex-col gap-y-2">
                <a class="px-2 py-1 rounded hover:bg-[#17171a]" href="/logout">Logout</a>
            </div>
        </div>
    @endauth
</div>