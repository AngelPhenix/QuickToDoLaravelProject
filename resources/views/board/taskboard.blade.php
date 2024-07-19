<x-layout>
    @auth

    <h1 class="mb-8">Welcome <span class="text-xl font-bold">{{ $user->username }}</span> !</h1>

    <form method="post" action="/post_task" class="flex gap-x-3">
        @csrf

        <input class="text-black py-2 px-3" type="text" id="name" name="name"/>
        <button class="bg-slate-600 py-1 px-3">Add Task</button>
    </form>

    <div class="mt-10 max-w-64">
        <p class="bg-cyan-950 text-center px-3 py-2"> TASKS </p>
            <ul>
            @foreach ($tasks as $task)
                <li class="my-2">
                    - {{ $task-> name }}
                    <form class="inline" method="post" action="/delete_task/{{ $task->id }}">
                        @csrf
                        @method('DELETE')
                        <button class="text-red-500">[X]</button>
                    </form>
                </li>
            @endforeach
            </ul> 
    </div>
    @endauth
</x-layout>