<x-layout :boardList='$boardList ?? null'>
    @guest
        <h1 class="flex justify-center text-2xl">You can access the application after logging-in. Try it out !</h1>
    @endguest
</x-layout>