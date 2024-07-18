<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Todo App</title>
</head>
<body class="bg-[#15141f] h-full text-white p-3">
        <form method="post" action="/post_task">
            @csrf

            <input class="text-black" type="text" id="name" name="name"/>
            <button class="bg-slate-600 py-1 px-3">Add Task</button>
        </form>

        <div class="mt-10">
            <p>----- TASKS -----</p>
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
        </div>
</body>
</html>