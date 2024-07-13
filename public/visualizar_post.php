<?php 
require_once dirname(__DIR__) . "/config/session.php";
require_once dirname(__DIR__) . "/autoload.php";
autenticar();

if ($_POST) {
    $id_postagem = $_POST['id_postagem'];
    $postagemController = new PostagemController();
    $curtidasController = new CurtidaController();

    if ($_POST['acao'] && $_POST['acao'] == 'curtir') {
        $curtidasController->inserir($id_postagem, $_SESSION['id_usuario']);
    } elseif($_POST['acao'] && $_POST['acao'] == 'descurtir') {
        $curtidasController->remover($id_postagem, $_SESSION['id_usuario']);
    }

    $postagem = $postagemController->consultar($id_postagem);

    $total_curtidas = $curtidasController->totalCurtidas($id_postagem);

    $ja_curtiu = $curtidasController->consultar($id_postagem, $_SESSION['id_usuario']);
} else {
    header('Location: /public/feed.php');
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Exibir Postagem</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <nav class="bg-gradient-to-r from-cyan-500 to-blue-500 fixed w-full top-0 z-10">
        <div class="container mx-auto px-6 py-3 grid grid-cols-3 justify-between items-center">
            <div class="flex flex-row gap-4 items-center">
                <button class="bg-white text-blue-500 px-4 py-2 rounded-lg hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50" onclick="window.location.href='/public/feed.php'">Feed</button>
            </div>
            <div class="flex flex-row justify-center items-center">
                <h2 class="text-white text-2xl"><span class="font-bold italic text-4xl">PHP</span>eople</h2>
            </div>
            <div class="flex flex-row justify-end items-center">
                <button class="bg-red-500 text-white px-2 py-1 w-16 rounded-lg hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-opacity-50 mr-4" onclick="window.location.href='../config/logout.php'">Sair</button>
            </div>
        </div>
    </nav>
    <div class="container mt-16 mx-auto p-8" style="max-width: 70%;">
        <div class="bg-white rounded-lg shadow-lg p-8 flex">
            <!-- Coluna Esquerda: Postagem -->
            <div class="w-2/3 grid grid-col-1 pr-8">
                <div class="mb-4">
                    <h2 class="text-xl font-bold"><?=$postagem['nome_usuario']?></h2>
                    <p class="text-gray-700 mt-2"><?=$postagem['texto']?></p>
                </div>
                <div class="mb-4">
                    <?php if ($postagem['imagem_arquivo']) : ?>
                        <img src="..<?=$postagem['imagem_arquivo']?>" alt="postagem" class="w-full rounded-lg mb-4">
                    <?php endif ?>  
                </div>
                <div class="flex items-end justify-between">
                    <?php if (!$ja_curtiu) : ?>
                        <form method="post">
                            <input type="hidden" name="id_postagem" value="<?=$postagem['id']?>">
                            <input type="hidden" name="acao" value="curtir">
                            <button class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">Curtir</button>
                        </form>
                    <?php else : ?>
                        <form method="post">
                            <input type="hidden" name="id_postagem" value="<?=$postagem['id']?>">
                            <input type="hidden" name="acao" value="descurtir">
                            <button class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50">Descurtir</button>
                        </form>
                    <?php endif ?>
                    <span class="text-gray-600"><?=$total_curtidas?> curtidas</span>
                </div>
            </div>

            <!-- Coluna Direita: Comentários -->
            <div class="w-1/3 pl-8">
                <!-- Caixa de Texto para Novos Comentários -->
                <div class="mb-6">
                    <label for="new-comment" class="block text-gray-700 mb-2">Novo Comentário:</label>
                    <textarea id="new-comment" rows="3" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 mb-4"></textarea>
                    <button class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">Comentar</button>
                </div>
                <!-- Comentário -->
                <div class="bg-gray-100 rounded-lg p-4 mb-4">
                    <h3 class="font-semibold">Nome do Comentador</h3>
                    <p class="text-gray-700 mt-2">Este é um exemplo de texto do comentário. Pode ser uma resposta, uma observação ou qualquer outro conteúdo textual.</p>
                </div>
                <!-- Adicione mais blocos de comentários aqui -->
            </div>
        </div>
    </div>
</body>
</html>
