<?php 
require_once dirname(__DIR__) . "/config/session.php";
require_once dirname(__DIR__) . "/autoload.php";
autenticar();

$postagemController = new PostagemController();

$total_posts = $postagemController->todasPostagens();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Feed</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <nav class="bg-gradient-to-r from-cyan-500 to-blue-500 fixed w-full top-0 z-10">
        <div class="container mx-auto px-6 py-3 flex justify-between items-center">
            <div class="flex flex-row gap-4 items-center">
                <img src="<?=isset($_SESSION['foto-perfil']) ? '..'.$_SESSION['foto-perfil'] :'https://via.placeholder.com/40'?>" alt="Foto de Perfil" class="w-12 h-12 rounded-full">
                <button class="bg-white text-blue-500 px-4 py-2 rounded-lg hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50" onclick="window.location.href='/public/perfil.php'">Perfil</button>
                <h2 class="text-lg text-white">Olá <?=$_SESSION['usuario']?>!</h2>
            </div>
            <button class="bg-red-500 text-white px-2 py-1 rounded-lg hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-opacity-50 mr-4" onclick="window.location.href='../config/logout.php'">Sair</button>
        </div>
    </nav>
    <div class="container xl:w-1/3 lg:w-3/5 sm:w-full mx-auto px-6 py-8 mt-16">
        <?php foreach ($total_posts as $post) : ?>
            <div class="bg-white rounded-lg shadow-lg mb-8">
                <div class="p-6 grid gap-4 grid-cols-1">
                    <form action="/public/perfil.php" method="post">
                        <input type="hidden" name="id_usuario_postagem" value="<?=$post['id_usuario']?>">
                        <button class="flex items-center text-blue-500 hover:text-blue-600 focus:outline-none"><?=$post['nome']?></button>
                    </form>
                    <p class="text-gray-700"><?=$post['texto']?></p>
                    <?php if ($post['imagem_arquivo']) : ?>
                        <img src="..<?=$post['imagem_arquivo']?>" alt="postagem" class="w-full rounded-lg ">
                    <?php endif ?>    
                    <div class="flex items-center justify-between">
                        <button class="flex items-center text-blue-500 hover:text-blue-600 focus:outline-none">Curtir</button>
                        <span class="text-gray-600">0 curtidas</span>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</body>
</html>
