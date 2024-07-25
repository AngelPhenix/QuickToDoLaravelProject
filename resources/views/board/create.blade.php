<x-layout>
    <h1 class="mb-20 text-2xl">Create a new board :</h1>
    <form class="flex flex-col" method="post" action="/board">
        @csrf
        <input class="text-black pl-2 py-1" type="text" name="name" id="name"/>

        <button class="py-2" type="submit">Create</button>
    </form>
</x-layout>