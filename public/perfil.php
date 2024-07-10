<?php 
require_once dirname(__DIR__) . "/config/session.php";
require_once dirname(__DIR__) . "/autoload.php";
autenticar();

$controllerUsuario = new UsuarioController();
$postagemController = new PostagemController();
$seguidorController = new SeguidorController();

if ($_POST['id_usuario_postagem']) {
    $dados_usuario =  $controllerUsuario->consultar($_POST['id_usuario_postagem']);
    $postagens = $postagemController->postsUsuario($_POST['id_usuario_postagem']);
} elseif ($_POST['id_usuario_seguir']) {
    $seguidorController->seguir($_SESSION['id_usuario'],$_POST['id_usuario_seguir']);
} else {
    $dados_usuario =  $controllerUsuario->consultar($_SESSION['id_usuario']);
    $postagens = $postagemController->postsUsuario($_SESSION['id_usuario']);
}

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
            <div class="w-2/5 pr-8 h-full flex flex-col items-center mt-8">
                    <img src="<?=$dados_usuario['foto_arquivo']?>" alt="Foto de Perfil" class="w-40 h-40 rounded-full mb-4">
                    <h2 class="text-2xl font-bold mb-2"><?=$dados_usuario['nome']?></h2>
                    <p class="text-gray-700 mb-2">Data de Nascimento: <?=$nascimento->format('d/m/Y')?></p>
                    <p class="text-gray-700 mb-4 text-center"><?=$dados_usuario['descricao']?></p>
                    <?php if ($_POST['id_usuario_postagem'] && $_POST['id_usuario_postagem'] != $_SESSION['id_usuario']) : ?>
                        <form action="/public/perfil.php" method="post">
                            <input type="hidden" name="id_usuario_seguir" value="<?=$_POST['id_usuario_postagem']?>">
                            <button class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 mb-4">Seguir</button>
                        </form>
                    <?php else : ?>
                        <button class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 mb-4" onclick="window.location.href='/public/postagem.php'">Criar Nova Postagem</button>
                        <button class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-opacity-50">Editar Perfil</button>
                    <?php endif ?>
            </div>
            <div class="w-3/5  pl-8 h-full overflow-y-auto flex flex-col items-center ">
                <h2 class="border-b text-gray-700 text-2xl mb-8">Seus posts</h2>
                <?php foreach ($postagens as $postagem) : ?>
                    <div class="bg-white rounded-lg shadow-lg mb-8 p-6 w-3/4">
                        <p class="text-gray-700 mb-4"><?=$postagem['texto']?></p>
                        <?php if ($postagem['imagem_arquivo']) : ?>
                            <img src="..<?=$postagem['imagem_arquivo']?>" alt="Imagem da Postagem" class="w-full rounded-lg mb-4">
                        <?php endif ?>
                        <div class="flex items-center justify-between">
                            <button class="flex items-center text-blue-500 hover:text-blue-600 focus:outline-none">Curtir</button>
                            <span class="text-gray-600">0 curtidas</span>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>
</body>
</html>
