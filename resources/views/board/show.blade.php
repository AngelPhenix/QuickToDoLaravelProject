<x-layout>
    <h1 class="text-4xl">{{ $board->name }}</h1>
    <p class="text-sm pb-10">Admin rights to : {{$board->owner->username}}</p>

    <form method="post" action="/post_task/{{$board->id}}" class="flex gap-x-3">
        @csrf

        <input class="text-black py-2 px-3" type="text" id="name" name="name"/>
        <button class="bg-slate-600 py-1 px-3">Add Task</button>
    </form>
</x-layout>