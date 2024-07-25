<nav class="flex justify-between mb-8 mx-20">
    @guest
        <a href="/">Home</a>
        <a href="/register">Register</a>
        <a href="/login">Login</a>
    @endguest
    @auth
        <div class="flex gap-x-5">
            <a href="/historic">Logs</a>
            <a href="/boards">Boards</a>
            <a href="/logout">Logout</a>
        </div>
        <div>
            <a class="px-2 py-1 bg-slate-500 rounded hover:bg-slate-600" href="/board_create">Create board</a>
        </div>
    @endauth
</nav>