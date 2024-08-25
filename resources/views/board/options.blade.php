<x-layout :boardList='$boardList ?? null'>
    <div class="flex flex-col items-center">
        <h1 class="text-2xl mb-10">Create a new board :</h1>
        <form class="flex flex-col" method="post" action="/board">
            @csrf
            <input class="text-black pl-2 py-1" type="text" name="name" id="name"/>
            <x-form-error fieldname='name'/>

            <button class="py-1 bg-slate-600" type="submit">Create</button>
        </form>
    </div>
</x-layout>