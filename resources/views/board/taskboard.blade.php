<x-layout>
    @auth

    <h1 class="mb-8">Welcome <span class="text-xl font-bold">{{ $user->username }}</span> !</h1>

    <form method="post" action="/post_task" class="flex gap-x-3">
        @csrf

        <input class="text-black py-2 px-3" type="text" id="name" name="name"/>
        <button class="bg-slate-600 py-1 px-3">Add Task</button>
    </form>

    <div class="mt-10 w-[308px]">
        <p class="bg-cyan-950 text-center px-3 py-2 mb-3"> TASKS </p>
            <ul class="flex flex-col gap-y-1">
            @foreach ($tasks as $task)
                <li class="w-full flex">
                    <p class="flex-grow bg-slate-700 pl-4">{{ $task-> name }}</p>
                    <form class="bg-slate-700 text-center flex align-middle" method="post" action="/delete_task/{{ $task->id }}">
                        @csrf
                        @method('DELETE')
                        <button class="px-4 items-center hover:bg-red-600 [overflow-wrap:anywhere]">X</button>
                    </form>
                </li>
            @endforeach
            </ul> 
    </div>
    @endauth
</x-layout>