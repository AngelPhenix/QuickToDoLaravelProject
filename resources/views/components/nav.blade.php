<nav class="flex justify-center gap-10 mb-8">
    @guest
        <a href="/">Home</a>
        <a href="/register">Register</a>
        <a href="/login">Login</a>
    @endguest
    @auth
        <a href="/historic">Logs</a>
        <a href="/taskboard">Task Board</a>
        <a href="/logout">Logout</a>
    @endauth
</nav>