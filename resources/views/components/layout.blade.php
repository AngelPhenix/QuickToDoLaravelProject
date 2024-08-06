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
<body class="bg-[#232326] h-full text-white p-3">
    <x-nav :board='$board ?? null'/>

    <!-- Sidebar -->
    <div class="w-64 h-screen bg-blue-900 text-white p-4">
        <h2 class="text-xl font-semibold mb-4">Sidebar</h2>
        <ul>
            <li class="mb-2"><a href="#" class="hover:underline">Link 1</a></li>
            <li class="mb-2"><a href="#" class="hover:underline">Link 2</a></li>
            <li class="mb-2"><a href="#" class="hover:underline">Link 3</a></li>
            <li class="mb-2"><a href="#" class="hover:underline">Link 4</a></li>
        </ul>
        <h2 class="text-xl font-semibold mt-4 mb-2">Information</h2>
        <p class="text-sm">Some information here.</p>
    </div>

    <div class="flex flex-col items-center justify-center">
        {{ $slot }}
    </div>
</body>
</html>