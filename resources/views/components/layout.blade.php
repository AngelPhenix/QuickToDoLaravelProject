<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Todo App</title>
</head>
<body class="bg-[#232326] h-full text-white p-3">
    <x-nav />
    <div class="flex flex-col items-center justify-center py-20">
        {{ $slot }}
    </div>
</body>
</html>