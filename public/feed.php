<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Feed</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <nav class="bg-gradient-to-r from-cyan-500 to-blue-500 fixed w-full top-0 z-10">
        <div class="container mx-auto px-6 py-3 flex justify-between items-center">
            <div class="grid grid-cols-2 items-center">
                <img src="https://via.placeholder.com/40" alt="Foto de Perfil" class="w-10 h-10 rounded-full">
                <button class="bg-white text-blue-500 px-4 py-2 rounded-lg hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">Perfil</button>
            </div>
            <button class="bg-red-500 text-white px-2 py-1 rounded-lg hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-opacity-50 mr-4">Sair</button>
        </div>
    </nav>

    <div class="mt-16"></div>

    <div class="container xl:w-1/3 lg:w-3/5 sm:w-full mx-auto px-6 py-8">
        <!-- Postagem -->
        <div class="bg-white rounded-lg shadow-lg mb-8">
            <div class="p-6 grid gap-4 grid-cols-1">
                <h2 class="text-lg font-semibold">User</h2>
                <p class="text-gray-700">Texto aqui</p>
                <img src="https://via.placeholder.com/600x400" alt="postagem" class="w-full rounded-lg ">
                <div class="flex items-center justify-between">
                    <button class="flex items-center text-blue-500 hover:text-blue-600 focus:outline-none">Curtir</button>
                    <span class="text-gray-600">0 curtidas</span>
                </div>
            </div>
        </div>
        <!-- Postagem -->
    </div>
</body>
</html>
