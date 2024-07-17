<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Todo App</title>
</head>
<body class="bg-[#15141f] h-full text-white">

    <div class="mx-auto max-w-7xl px-4">

        <form class="flex flex-col mx-auto max-w-2xl pt-20" method="post" action="/todo">
            @csrf

            <input class="text-black pl-2 p-3 mb-3" type="text" name="task_name" id="task_name" placeholder="Enter a new task here" />
            <button class="bg-slate-600">Add the task</button>
        </form>

        <ul class="mt-10">
            @foreach ($tasks as $task)
                @if (!$task->done)
                    <li>
                        {{ $task->name }}
                        <form action="/task/{{$task->id}}" method="POST" style="display: inline;">
                            @csrf
                            @method('PUT')
                            <button type="submit">Mark as Done</button>
                        </form>
                        @auth
                            <form action="/delete_task/{{$task->id}}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                            </form>
                        @endauth
                        <form action="/delete_task/{{$task->id}}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </li>
                @endif
            @endforeach
        </ul>
        
        <ul class="mt-20">
            @foreach ($tasks as $task)
                @if ($task->done)
                    <li>
                        {{ $task->name }}
                        <form action="/task/{{$task->id}}" method="POST" style="display: inline;">
                            @csrf
                            @method('PUT')
                            <button type="submit">Mark as Undone</button>
                        </form>
                        <form action="/delete_task/{{$task->id}}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </li>
                @endif
            @endforeach
        </ul>
        

    </div>

</body>
</html>