<x-layout>
    <form class="flex flex-col items-center gap-5" method="post" action="/register">
        @csrf

        <div class="flex flex-col">
            <label for="username">Username</label>
            <input class="py-1 px-4 text-black w-[350px]" type="text" id="username" name="username" value="{{ old('username') }}" placeholder="Your Username"/>
            <x-form-error fieldname='username' />
        </div>

        <div class="flex flex-col">
            <label for="email">Email</label>
            <input class="py-1 px-4 text-black w-[350px]" type="text" id="email" name="email" value="{{ old('email') }}" placeholder="Your Email"/>
            <x-form-error fieldname='email' />
        </div>

        <div class="flex flex-col">
            <label for="password">Password</label>
            <input class="py-1 px-4 text-black w-[350px]" type="password" id="password" name="password" />
            <x-form-error fieldname='password' />
        </div>

        <button class="bg-slate-600 py-1 px-3">Create</button>
    </form>
</x-layout>