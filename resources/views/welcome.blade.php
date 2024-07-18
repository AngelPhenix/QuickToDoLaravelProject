<x-layout>
    <nav>
        <a href="/register">Register</a>
        <a href="/login">login</a>
    </nav>

    <form method="post" action="/post_task">
        @csrf

        <input class="text-black" type="text" id="name" name="name"/>
        <button class="bg-slate-600 py-1 px-3">Add Task</button>
    </form>

    <div class="mt-10">
        <p>----- TASKS -----</p>
        
        @auth
            <ul>
            @foreach ($tasks as $task)
                <li>
                    {{ $task-> name }}
                    <form class="inline" method="post" action="/delete_task/{{ $task->id }}">
                        @csrf
                        @method('DELETE')
                        <button>[X]</button>
                    </form>
                </li>
            @endforeach
            </ul> 
        @endauth
    </div>
</x-layout>