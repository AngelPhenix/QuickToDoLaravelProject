@props(['board'])

<div class="w-64 h-screen bg-[#424246] text-white p-4">
    @guest
    <nav class="flex flex-col">
        <a href="/">Home</a>
        <a href="/register">Register</a>
        <a href="/login">Login</a>
    </nav>
    @endguest
    
    @auth
        <div class="flex flex-col gap-y-2">
            <a class="px-2 py-1 bg-[#232326] rounded hover:bg-[#17171a]" href="/board_create">Create board</a>

            @if (isset($board))
            <a href="/historic/board/{{$board->id}}">Logs</a>
            @endif
            <a href="/boards">Boards</a>
            <a href="/logout">Logout</a>
        </div>
    @endauth
</div>