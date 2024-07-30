<x-layout :board="$board ?? null">
    <div class="flex gap-x-5 pb-2">
        @can('delete', $board)
            <form method="post" action="/delete_board/{{$board->id}}" class="flex gap-x-3">
                @csrf
                @method('DELETE')
                <button class="bg-red-500 px-4 rounded">Delete</button>
            </form>
        @endcan
        <h1 class="text-4xl">{{ $board->name }}</h1>
    </div>
    <p class="text-sm pb-10">Admin rights to : {{$board->owner->username}}</p>

    <form method="post" action="/post_task/{{$board->id}}" class="flex gap-x-3">
        @csrf

        <input class="text-black py-2 px-3" type="text" id="name" name="name"/>
        <button class="bg-slate-600 py-1 px-3">Add Task</button>
    </form>

    <div class="mt-10 w-[308px]">
        <p class="bg-cyan-950 text-center px-3 py-2 mb-3"> TASKS </p>
            <ul class="flex flex-col gap-y-1">
            @foreach ($board->tasks as $task)
                @if (!$task->is_completed)
                    <li class="w-full flex">

                        <form class="flex flex-grow" method="post" action="/task_completed/{{ $task->id }}">
                            @csrf
                            @method('PATCH')
                            <button class="pl-4 bg-slate-700 flex flex-grow text-left hover:bg-green-600 [overflow-wrap:anywhere]">{{ $task-> name }}</button>
                        </form>

                        <form class="bg-slate-700 text-center flex align-middle" method="post" action="/delete_task/{{ $task->id }}">
                            @csrf
                            @method('DELETE')
                            <button class="px-4 items-center hover:bg-red-600">X</button>
                        </form>

                    </li>
                @endif
            @endforeach
            </ul> 
    </div>
</x-layout>