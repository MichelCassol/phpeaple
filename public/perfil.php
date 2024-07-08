<?php 
require_once dirname(__DIR__) . "/config/session.php";
require_once dirname(__DIR__) . "/autoload.php";
autenticar();

$controllerUsuario = new UsuarioController();

$dados_usuario =  $controllerUsuario->consultar($_SESSION['id_usuario']);

$nascimento = DateTime::createFromFormat('Y-m-d', $dados_usuario['nascimento']);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title><?=$dados_usuario['nome']?></title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <nav class="bg-gradient-to-r from-cyan-500 to-blue-500 fixed w-full top-0 z-10">
        <div class="container mx-auto px-6 py-3 flex justify-between items-center">
            <button class="bg-white text-blue-500 px-4 py-2 rounded-lg hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50" onclick="window.location.href='/public/feed.php'">Feed</button>
            <button class="bg-red-500 text-white px-2 py-1 rounded-lg hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-opacity-50 mr-4" onclick="window.location.href='../config/logout.php'">Sair</button>
        </div>
    </nav>
    <div class="mt-16 container mx-auto p-8">
        <div class="bg-white rounded-lg shadow-lg p-8 flex h-[90%]">
            <div class="w-2/5 pr-8 h-full">
                <div class="flex flex-col items-center">
                    <img src="<?=$dados_usuario['foto_arquivo']?>" alt="Foto de Perfil" class="w-40 h-40 rounded-full mb-4">
                    <h2 class="text-2xl font-bold mb-2"><?=$dados_usuario['nome']?></h2>
                    <p class="text-gray-700 mb-2">Data de Nascimento: <?=$nascimento->format('d/m/Y')?></p>
                    <p class="text-gray-700 mb-4 text-center"><?=$dados_usuario['descricao']?></p>
                    <button class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 mb-4" onclick="window.location.href='/public/postagem.php'">Criar Nova Postagem</button>
                    <button class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-opacity-50">Editar Perfil</button>
                </div>
            </div>
            <div class="w-3/5  pl-8 h-full overflow-y-auto">
                <!-- Postagem -->
                 <h2 class="border-b text-gray-700 text-2xl mb-8">Seus posts</h2>
                <div class="bg-white rounded-lg shadow-lg mb-8 p-6">
                    <p class="text-gray-700 mb-4">Este é um exemplo de texto da postagem. Pode ser uma descrição, um comentário ou qualquer outro conteúdo textual.</p>
                    <img src="https://via.placeholder.com/600x400" alt="Imagem da Postagem" class="w-full rounded-lg mb-4">
                    <div class="flex items-center justify-between">
                        <button class="flex items-center text-blue-500 hover:text-blue-600 focus:outline-none">
                            <svg class="w-6 h-6 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 9l-3 3m0 0l-3-3m3 3V4m0 6v10m-7 0h14"></path></svg>
                            Curtir
                        </button>
                        <span class="text-gray-600">0 curtidas</span>
                    </div>
                </div>
                <div class="bg-white rounded-lg shadow-lg mb-8 p-6">
                    <p class="text-gray-700 mb-4">Este é um exemplo de texto da postagem. Pode ser uma descrição, um comentário ou qualquer outro conteúdo textual.</p>
                    <!-- <img src="https://via.placeholder.com/600x400" alt="Imagem da Postagem" class="w-full rounded-lg mb-4"> -->
                    <div class="flex items-center justify-between">
                        <button class="flex items-center text-blue-500 hover:text-blue-600 focus:outline-none">
                            <svg class="w-6 h-6 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 9l-3 3m0 0l-3-3m3 3V4m0 6v10m-7 0h14"></path></svg>
                            Curtir
                        </button>
                        <span class="text-gray-600">0 curtidas</span>
                    </div>
                </div>
                <div class="bg-white rounded-lg shadow-lg mb-8 p-6">
                    <p class="text-gray-700 mb-4">Este é um exemplo de texto da postagem. Pode ser uma descrição, um comentário ou qualquer outro conteúdo textual.</p>
                    <img src="https://via.placeholder.com/600x400" alt="Imagem da Postagem" class="w-full rounded-lg mb-4">
                    <div class="flex items-center justify-between">
                        <button class="flex items-center text-blue-500 hover:text-blue-600 focus:outline-none">
                            <svg class="w-6 h-6 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 9l-3 3m0 0l-3-3m3 3V4m0 6v10m-7 0h14"></path></svg>
                            Curtir
                        </button>
                        <span class="text-gray-600">0 curtidas</span>
                    </div>
                </div>
                <!-- Você pode repetir o bloco de postagem acima para mais postagens -->
            </div>
        </div>
    </div>
</body>
</html>
