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
        <form method="post" action="/post_task">
            @csrf

            <input class="text-black" type="text" id="name" name="name"/>
            <button>Add Task</button>
        </form>
</body>
</html>