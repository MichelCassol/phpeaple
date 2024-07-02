<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Entrar</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-sm">
        <h2 class="text-2xl font-bold mb-6 text-center">Entrar</h2>
        <form>
            <div class="mb-4">
                <label for="email" class="block text-gray-700">Email:</label>
                <input type="email" id="email" name="email" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            <div class="mb-4">
                <label for="senha" class="block text-gray-700">Senha:</label>
                <input type="password" id="senha" name="senha" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            <div class="flex items-center justify-between mb-6 mt-8">
                <button type="submit" class="bg-blue-500 w-full text-white px-4 py-2 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">Logar</button>
            </div>
            <div class="flex items-center justify-between mb-2.5">
                <label for="cadastro" class="text-gray-700">Ainda não possui uma conta? </label>
                <button id="cadastro" type="button" onclick="window.location.href='public/cadastro.php'" class="text-blue-500 hover:underline">Cadastre-se</button>
            </div>
        </form>
    </div>
</body>
</html>
