<nav class="flex justify-center gap-10 mb-8">
        <a href="/"><u>Home</u></a>
    @guest
        <a href="/register"><u>Register</u></a>
        <a href="/login"><u>login</u></a>
    @endguest
    @auth
        <a href="/logout"><u>LogOut</u></a>
    @endauth
</nav>