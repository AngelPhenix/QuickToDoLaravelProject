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

        <form class="flex flex-col mx-auto max-w-2xl" method="post" action="/todo">
            @csrf

            <label for="task_name">Task</label>
            <input class="text-black pl-2" type="text" name="task_name" id="task_name" />
            <button>Add the task</button>
        </form>

        <ul class="mt-10">
            @foreach ($tasks as $task)
                @if (!$task->done)
                    <li>{{ $task->name }}   <a href="/task/{{$task->id}}"">Done</a>  </li>
                @endif
            @endforeach
        </ul>

        <ul class="mt-20">
            @foreach ($tasks as $task)
                @if ($task->done)
                    <li>{{ $task->name }}   <a href="/task/{{$task->id}}"">Undone</a>  </li>
                @endif
            @endforeach
        </ul>

    </div>

</body>
</html>