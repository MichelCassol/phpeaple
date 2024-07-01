<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de Cadastro</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .hidden {
            display: none;
        }
    </style>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-2xl flex">
        <div class="w-3/4 pr-8">
            <h2 class="text-2xl font-bold mb-6 text-center">Cadastro</h2>
            <form id="registration-form">
                <div class="mb-4">
                    <label for="name" class="block text-gray-700">Nome:</label>
                    <input type="text" id="name" name="name" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
                <div class="mb-4">
                    <label for="dob" class="block text-gray-700">Data de Nascimento:</label>
                    <input type="date" id="dob" name="dob" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
                <div class="mb-4">
                    <label for="profile-picture" class="block text-gray-700">Foto de Perfil:</label>
                    <input type="file" id="profile-picture" name="profile-picture" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" accept="image/*" onchange="previewImage(event)">
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-gray-700">Email:</label>
                    <input type="email" id="email" name="email" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
                <div class="flex items-center justify-between mb-6">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">Cadastrar</button>
                    <button type="button" class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-opacity-50">Cancelar</button>
                </div>
            </form>
        </div>
        <div class="w-1/4 flex items-center justify-center">
            <img id="profile-preview" src="" alt="Foto de Perfil" class="hidden rounded-full border border-gray-300 shadow-lg w-32 h-32 object-cover">
        </div>
    </div>
    <script>
        function previewImage(event) {
            const reader = new FileReader();
            reader.onload = function(){
                const preview = document.getElementById('profile-preview');
                preview.src = reader.result;
                preview.classList.remove('hidden');
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
</body>
</html>
