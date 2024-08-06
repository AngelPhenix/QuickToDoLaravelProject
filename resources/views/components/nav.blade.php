@props(['board'])

<nav class="flex justify-between my-4 mx-8">
    @guest
        <a href="/">Home</a>
        <a href="/register">Register</a>
        <a href="/login">Login</a>
    @endguest
    @auth
        <div class="flex gap-x-5">
            @if (isset($board))
            <a href="/historic/board/{{$board->id}}">Logs</a>
            @endif

            <a href="/boards">Boards</a>
            <a href="/logout">Logout</a>
        </div>
        <div>
            <a class="px-2 py-1 bg-slate-500 rounded hover:bg-slate-600" href="/board_create">Create board</a>
        </div>
    @endauth
</nav>