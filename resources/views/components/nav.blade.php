<nav class="flex justify-center gap-10 mb-8">
    @guest
        <a href="/"><u>Home</u></a>
        <a href="/register"><u>Register</u></a>
        <a href="/login"><u>login</u></a>
    @endguest
    @auth
        <a href="/taskboard"><u>Task Board</u>
        <a href="/logout"><u>Logout</u></a>
    @endauth
</nav>