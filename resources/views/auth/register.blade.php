<x-layout>
    <form class="flex flex-col items-center gap-5" method="post" action="/register">
        @csrf

        <div class="flex flex-col">
            <label for="username">Username</label>
            <input class="py-1 px-4 text-black" type="text" id="username" name="username" value="{{ old('username') }}" placeholder="Your Username"/>
        </div>

        <div class="flex flex-col">
            <label for="email">Email</label>
            <input class="py-1 px-4 text-black" type="text" id="email" name="email" value="{{ old('email') }}" placeholder="Your Email"/>
        </div>

        <div class="flex flex-col">
            <label for="password">Password</label>
            <input class="py-1 px-4 text-black" type="password" id="password" name="password" />
        </div>

        <button class="bg-slate-600 py-1 px-3">Create</button>
    </form>
</x-layout>