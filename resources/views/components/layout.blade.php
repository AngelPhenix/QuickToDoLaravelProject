<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.2.2/dist/cdn.min.js" defer></script>
    <title>Todo App</title>
</head>
<body class="bg-[#232326] h-full text-white">
    <!-- Sidebar -->
    <div id="main-content" class="flex w-full">
    
        <x-sidebar :board='$board ?? null' />

        <div class="flex-1">
            {{ $slot }}
        </div>
    </div>
</body>
</html>