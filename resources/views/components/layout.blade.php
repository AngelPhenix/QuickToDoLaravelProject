<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.2.2/dist/cdn.min.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Todo App</title>
</head>
<body class="bg-[#232326] h-full text-white">
    <div id="main-content" class="flex w-full">

        <x-sidebar :boardList='$boardList ?? null' :board='$board ?? null' />

        <div class="flex-1 pt-10">
            {{ $slot }}
        </div>
    </div>
</body>
</html>